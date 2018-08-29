<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delete Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<h1>Delete Player</h1>
    {!! Form::open(['action' => 'PlayerController@deletePlayer']) !!}
    <p>{!! Form::label('playerId', 'Player ID:') !!}</p>
    {!! Form::text('playerId') !!}
    <p>{!! Form::submit ('Delete Player')!!}</p>
    {!! Form::close() !!}
    <div><a href="{{ url('home') }}">
        <button>Back</button>
    </a></div>
</body>
</html>


 