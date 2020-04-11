<?php

namespace App\Http\Controllers;
namespace Symfony\Component\HttpFoundation\Cookie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AjaxController extends Controller
{
    /**
     * Ajax пагинация. Возвращает html блок с пагинацией
     * @return $response 
     */
    public function pagination(){
        $months = array(
            1 => 'Января',
            2 => 'Февраля',
            3 => 'Марта',
            4 => 'Апреля',
            5 => 'Мая',
            6 => 'Июня',
            7 => 'Июля',
            8 => 'Августа',
            9 => 'Сентября',
            10 => 'Октября',
            11 => 'Ноября',
            12 => 'Декабря'
        );

        //===================================
        //-BUILDING AJAX PAGINATION MAIN PAGE
        //===================================
        $tournaments = DB::table('tournaments')
                    ->select('event', 'miniTournamentLogo', 'prize', 'dateBegin')
                    ->where('status', '=', '-1')
                    ->orWhere('status', '=', 0)
                    ->limit($_GET['limit'])
                    ->offset($_GET['offset'])
                    ->get();

        $response="";
        for($i=0; $i<count($tournaments); $i++){
            $date = new \DateTime($tournaments[$i]->dateBegin);
            $month = $date->format('n');
            $day = $date->format('j'); 
            $date = $day." ".$months[$month];
            $response.='<div class="tournament"> 
                            <a href="" class="tournament_img">
                                <img src="assets'.$tournaments[$i]->miniTournamentLogo.'">
                            </a>
                            <a href="" class="tournament-title">'.$tournaments[$i]->event.'</a>
                            <span class="tournament-date" style="text-align: center">'.$date.'</span>
                            <span class="tournament-prize" style="text-align: end"><i class="fas fa-dollar-sign"></i>'.$tournaments[$i]->prize.'</span>
                        </div>' ;
        }
       
        return $response;
    }

    /**
     * Обработка авторизации пользователя
     */
    public function auth(){
        $response = [];
        return "asdasd";
        $hashedValue = DB::table('users')
                                ->select('password')
                                ->where('email', '=', $_POST['email'])
                                ->get();
        // Проверка пароля и логина пользователя
        if(isset($hashedValue[0])){
            if(Hash::check($_POST['password'], $hashedValue[0]->password)){
                $response['enter'] = 'success';
                $response['message'] = 'Вы успешно авторизовались';
                if(isset($_POST['token'])){
                    DB::table('users')
                            ->update(['remember_token' => $_POST['token']])
                            ->where('email', $_POST['email']);
                    cookie('token', $_POST['token']);
                }
            }else{
                $response['enter'] = 'error';
                $response['message'] = 'Неверный логин или пароль';
            }
        }else{
            $response['enter'] = 'error';
            $response['message']= 'Неверный логин или пароль';
        }
        return $response;
    }

    /**
     * Обработка регистрации пользователя
     */
    public function registr(){
        return $_POST;
    }
}
