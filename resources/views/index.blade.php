@extends('layouts')
@section('title', 'ggScore')
@section('menu')
    @parent
@endsection
@section('content')
    <section class="content">
        <div class="matches-rating-teams">
            <div class="matches">
                <h3 class="matches_title"><i class="fa fa-home"></i>Матчи</h3>
                @for ($i = 0; $i < count($matches); $i++)
                    <div class="match">
                        <a href="" class="teams">
                            <span>{{ $matches[$i]->shortName }}<img src="{{ asset('assets/'.$matches[$i]->countryFlag) }}" alt=""></span>
                            <span class="vs">vs</span>
                            <span><img src="{{ asset("assets/".$matches1[$i]->countryFlag) }}" alt="">{{ $matches1[$i]->shortName }}</span>
                        </a>
                        <span class="date-time">
                            @php
                                $date = new \DateTime($matches[$i]->date);
                                $month = $date->format('n');
                                $day = $date->format('j'); 
                                $time = $date->format('H:s');
                                $date = $day." ".$months[$month].", ".$time;
                                echo $date;
                            @endphp    
                        </span>
                        <a href="" class="tournament-logo"><img src="{{ asset('assets/'.$matches[$i]->miniTournamentLogo) }}" alt="{{ $matches[$i]->event }}"></a>
                    </div>
                @endfor
                <nav class="matches_pagination">
                    <ul class="matches_pagination_list" data-limit="{{ $limit }}" data-activepage=""> 
                        <li class="previos"><a href=""><i class="fas fa-angle-double-left"></i></a></li>
                        @for ($i = 0; $i < $countTournaments / $limit; $i++)
                            <li class="matches_pagination_item">
                                <a href="" class="matches_pagination_link" data-page="{{ $i }}">{{ $i+1 }}</a>
                            </li> 
                        @endfor
                        <li class="next"><a href=""><i class="fas fa-angle-double-right"></a></i></li>
                    </ul>
                </nav>
            </div>
            <div class="rating-teams">
                <h3 class="rating-teams_title">Рейтинг команд дота 2. DPC {{ $year-1}}/{{ $year }} </h3>
            </div>
        </div>
        <div class="tournaments-prize-tournaments">
            <div class="tournaments">
                <h3 class="tournaments_title"><i class="fa fa-trophy">Турниры</i></h3>
                @for ($i = 0; $i < count($tournaments); $i++)
                    <div class="tournament">
                        <a href="" class="tournament_img">
                            <img src="{{ asset('assets/'.$tournaments[$i]->miniTournamentLogo) }}" alt="">
                        </a>
                        <a href="" class="tournament_title">{{ $tournaments[$i]->event }}</a>
                        <span class="tournament_date">
                            @php
                                $date = new \DateTime($tournaments[$i]->dateBegin);
                                $month = $date->format('n');
                                $day = $date->format('j'); 
                                $date = $day." ".$months[$month];
                                echo $date;
                            @endphp        
                        </span>
                        <span class="tournament_prize"><i class="fas fa-dollar-sign"></i>{{ $tournaments[$i]->prize }}</span>
                    </div>
                @endfor
                <nav class="tournaments_pagination">
                    <ul class="tournaments_pagination_list" data-limit="{{ $limit }}" data-activepage=""> 
                        <li class="previos"><a href=""><i class="fas fa-angle-double-left"></i></a></li>
                        @for ($i = 0; $i < $countTournaments / $limit; $i++)
                            <li class="tournaments_pagination_item">
                                <a href="" class="tournaments_pagination_link" data-page="{{ $i }}">{{ $i+1 }}</a>
                            </li> 
                        @endfor
                        <li class="next"><a href=""><i class="fas fa-angle-double-right"></a></i></li>
                    </ul>
                </nav>
            </div>
            <div class="prize-tournaments">
                <h3 class="prize-tournaments_title"><i class="fas fa-coins">Призовой фонд текущих турниров</i></h3>
            </div>
        </div>
    </section>
@endsection
