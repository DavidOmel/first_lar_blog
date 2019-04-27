<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style type="text/css">
        .text-danger{
            color: #F00B5B;
        }
        button{
            background-color: lightpink;
            font-size: large;
            margin-left: 35px;
        }
    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>
<h3>{{$user->name}}, для подтверждения регистрации нажмите на кнопку ниже:</h3><br>

<form method="get" action="{{route('regsecFrom', ['_token' => $user->_token])}}">
    <button type="submit">ПОДТВЕРЖДАЮ</button>
</form>

<br><br><br>


<p class="text-danger">
    * Если вы не проходили регистрацию на сайте BlogForYou,
    то проигнорируйте и удалите это письмо.
</p>
</body>
</html>