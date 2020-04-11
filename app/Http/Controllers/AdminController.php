<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * main function
     */
    public function index(){
        return view('entrance');
    }

    /**
     *  Обработка авторизации пользователя
     * 
     * @param Request $request
     */
    /*public function auth(Request $request){
        $hashedValue = DB::table('users')
                                ->select('password')
                                ->where('email', '=', $request->email)
                                ->get();
        // Проверка пароля и логина пользователя
        if(isset($hashedValue[0])){
            if(Hash::check($request->password, $hashedValue[0]->password)){
                return view('admin');
            }else{
                return view('entrance', ['message' => 'Неверный пароль или логин']);
            }
        } return view('entrance', ['message' => 'Неверный пароль или логин']);
    }*/

    /**
     * Обработка регистрации пользователя
     * 
     * @param Request $request
     * @return Response
     */
    /*public function registr(Request $request){
        // Проверка дублирования email в системе
        try {
            DB::table('users')->insert([
                'email' => $request->email, 'password' => Hash::make($request->password), 'remember_token' => $request->_token, 'role' => 2
            ]);
            return view('entrance', ['message' => 'Вы успешно зарегистрировались']);
        } catch (\PDOException $e) {
            return view('entrance', ['message' => 'Такой email уже существует']);
        }
    }*/
}
