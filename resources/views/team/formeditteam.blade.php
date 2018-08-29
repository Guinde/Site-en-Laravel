
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Edit team</title>

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
                height: 120vh;
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
                font-size: 25px;
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

                        button {
                width: 140px;
                height: 45px;
                font-family: 'Roboto', sans-serif;
                font-size: 11px;
                text-transform: uppercase;
                letter-spacing: 2.5px;
                font-weight: 500;
                color: #000;
                background-color: #fff;
                border: none;
                border-radius: 45px;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease 0s;
                cursor: pointer;
                outline: none;
                }

                .button:hover {
                background-color: grey;
                box-shadow: 0px 15px 20px grey;
                color: #fff;
                transform: translateY(-7px);
                }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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
            </div>
            <div class="top-left links">
                <a href="{{ url('teams') }}">< Back</a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                Edit Team
                </div>
                {!! Form::open(['action' => 'TeamController@editTeam']) !!}
                <p>{!! Form::label('name', 'Name:') !!}</p>
                {!! Form::text('name', $team->name) !!}
                {{ $errors->first('name') }}

                <p>{!! Form::label('gamesPlayed', 'Games Played:') !!}</p>
                {!! Form::text('gamesPlayed', $team->gamesPlayed) !!}
                {{ $errors->first('gamesPlayed') }}

                <p>{!! Form::label('win', 'Win:') !!}</p>
                {!! Form::text('win', $team->win) !!}
                {{ $errors->first('win') }}

                <p>{!! Form::label('draw', 'Draw:') !!}</p>
                {!! Form::text('draw', $team->draw) !!}
                {{ $errors->first('draw') }}

                <p>{!! Form::label('lost', 'Lost:') !!}</p>
                {!! Form::text('lost', $team->lost) !!}
                {{ $errors->first('lost') }}

                {!! Form::hidden('id', $team->id) !!}<br> <br>
                <button class="button">Edit team</button>
                {!! Form::close() !!}
            </div>
        </div>
</body>
</html>


