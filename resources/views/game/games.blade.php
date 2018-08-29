<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Games</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
            @auth
                <a href="{{ url('') }}">{{ Auth::user()->name }}</a>
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
            <div class="top-left links">
                <a href="{{ url('/') }}">< Back</a>
            </div>
            <div class="content">
                
                <div class="title m-b-md">
                Games
                </div>
                <table style="width:100%">
                    
                    @foreach ($games as $game)
                     <tr>
                        <th>Date</th>
                        <th>Team 1</th>
                        <th>Team 2</th>
                        <th>Score Board</th>
                        <th>Winner</th>
                     </tr>
                        <td>{{$game->date}}</td>
                        <td>{{$game->team1}}</td>
                        <td>{{$game->team2}}</td>
                        <td>{{$game->scoreboard}}</td>
                        <td>{{$game->winner}}</td>
                     </tr>
                    @endforeach
                </table> <br />
            </div>
        </div>
    </body>
</html>
