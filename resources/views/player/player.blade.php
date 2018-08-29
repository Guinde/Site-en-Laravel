<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <p>{{$firstName}}</p>
     <p>{{$lastName}}</p>
     <p>{{$position}}</p>
     <p>{{$gamesPlayed}}</p>
     <p>{{$goals}}</p>
     <p>{{$assists}}</p>
     <p>{{$cards}}</p>
     <p>{{$teamId}}</p>
     <div><a href="{{ url('players') }}">
        <button>Back</button>
    </a></div>
</body>
</html>
