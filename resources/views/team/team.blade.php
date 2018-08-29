<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Team</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <p>{{$name}}</p>
     <p>{{$country}}</p>
     <p>{{$flag}}</p>
     <div><a href="{{ url('home') }}">
        <button>Back</button>
    </a></div>
</body>
</html>