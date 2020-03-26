<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //
    public function index(Request $request){
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

        $limit_records = 3;  // count records to page 

        //=====================================
        //-BUILDING MATCHES-RAITING-TEAMS-BLOCK
        //=====================================
        $db = DB::table('matches')
                ->join('tournaments', 'matches.idTournament', '=', 'tournaments.idTournament')
                ->join('teams', 'matches.idFirstTeam', '=', 'teams.idTeam')
                ->select('teams.shortName', 'event', 'miniTournamentLogo', 'date', 'logo', 'countryFlag')
                ->where('matches.status', '=', '-1')
                ->paginate(3);

        $db1 = DB::table('matches')
                ->join('tournaments', 'matches.idTournament', '=', 'tournaments.idTournament')
                ->join('teams', 'matches.idSecondTeam', '=', 'teams.idTeam')
                ->select('teams.shortName', 'countryFlag')
                ->where('matches.status', '=', '-1')
                ->paginate(3);
       

        //=============================================
        //-BUILDING TOURNAMENTS-PRIZE-TOURNAMENTS-BLOCK
        //=============================================
        $tournaments = DB::table('tournaments')
                    ->select('event', 'miniTournamentLogo', 'prize', 'dateBegin')
                    ->where('status', '=', '-1', 'or', 'status', '=', '0')
                    ->orderBy('dateBegin')
                    ->paginate(2);

        $countTournaments = DB::table('tournaments')
                            ->select('event', 'miniTournamentLogo', 'prize', 'dateBegin')
                            ->where('status', '=', 0)
                            ->orWhere('status' ,'=', -1)
                            ->orderBy('dateBegin')
                            ->count();

        $data = [
            'matches' => $db,
            'matches1' => $db1,
            'test' => 'test',
            'year' => date("Y"),
            'months' => $months,
            'tournaments' => $tournaments,
            'countTournaments' => $countTournaments,
            'limit' => $limit_records
        ];

        return view('index', $data);
    }

    public function edit($id){
        return view('pages.main');
    }

}
