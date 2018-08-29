
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Bet'N'Go</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                font-size: 30px;
            }

            .title {
                font-size: 84px;
            }

            caption{
                font-size: 30px;
                padding: 20px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .flag{
                float: right;
                margin-left: 20px;
            }

            img{
                width:150px;
                height: 130px;
            }

            .btn {
                background-color: DodgerBlue;
                border: none;
                color: white;
                padding: 12px 16px;
                font-size: 16px;
                cursor: pointer;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('user') }}">{{ Auth::user()->name }}</a>
                        <a class="dropdown-item" href="{{ url('/') }}">
                            {{ __('Home') }}
                        </a>
                            @if (Auth::user()->isAdmin)
                            <a class="dropdown-item" href="{{ url('admin') }}">
                                {{ __('Admin') }}
                            </a>
                            @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                        @guest
                        <a class="dropdown-item" href="{{ url('/') }}">
                            {{ __('Home') }}
                        </a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        @endguest
                </div>
            @endif
                <div class="top-left links">
                    <a href="{{ url('teams') }}">< Back</a>
                </div>
            <div class="content">
                <div class="title m-b-md">
                {{$country}}
                    <div class="flag">
                        <img src = "{{$flag}}" alt="">
                    </div> <br /> <br />
                </div>
            </div> 
        </div>


        <table class="w3-table w3-striped" style="width:75%">
        <caption>{{$team->name}}</caption>
    <tr>
        <th align="left">Games Played</th> 
        <th align="left">Win</th>
        <th align="left">Draw</th> 
        <th align="left">Lost</th> 
        @auth
            @if (Auth::user()->isAdmin)
        <th align="left">Edit</th> 
            @endif
        @endauth
    </tr>
    <tr>
        <td>{{$team->gamesPlayed}}</td>
        <td>{{$team->win}}</td>
        <td>{{$team->draw}}</td>
        <td>{{$team->lost}}</td>
        @auth
        @if (Auth::user()->isAdmin)              
        <td>
        {!! Form::open(['action' => ['TeamController@sendIdToFormEditTeam', $team->id]]) !!}
            <button class="btn"><i class="fa fa-edit"></i></button>
            {!! Form::close() !!}
        </td>
        @endif
        @endauth
    </tr>
    </table> <br /><br /><br />

    <table class="w3-table w3-striped" style="width:100%">
    <caption>Players</caption>
    <tr>
        <th align="left">Firstname</th>
        <th align="left">Lastname</th> 
        <th align="left">Position</th> 
        <th align="left">Game(s) Played</th> 
        <th align="left">Goal(s)</th> 
        <th align="left">Assist(s)</th> 
        <th align="left">Card(s)</th> 
        @auth
            @if (Auth::user()->isAdmin)
        <th align="left">Edit</th> 
        <th align="left">Remove</th> 
            @endif
        @endauth
    </tr>
    @foreach ($players as $player)
    <tr>
        <td>{{$player->firstName}}</td>
        <td>{{$player->lastName}}</td>
        <td>{{$player->position}}</td>
        <td>{{$player->gamesPlayed}}</td>
        <td>{{$player->goals}}</td>
        <td>{{$player->assists}}</td>
        <td>{{$player->cards}}</td>
        @auth
        @if (Auth::user()->isAdmin)              
        <td>
        {!! Form::open(['action' => ['PlayerController@sendIdToFormEdit', $player->id]]) !!}
            <button class="btn"><i class="fa fa-edit"></i></button>
            {!! Form::close() !!}
        </td>
        <td>
            {!! Form::open(['action' => ['PlayerController@delete', $player->id]]) !!}
            <button class="btn"><i class="fa fa-remove"></i></button>
            {!! Form::close() !!}
        </td>
        @endif  
        @endauth
    </tr>
    @endforeach
    </table> <br />
</body>
</html>