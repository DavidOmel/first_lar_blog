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
        a{
            font-size: large;
            margin-left: 100px;
        }
    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>

            <h3>Подтвердите изменение пароля, нажав на ссылку ниже:</h3><br>

            <a href="{{route('restore', ['user' => $user->id])}}">ПОДТВЕРЖДАЮ</a>

            <br><br><br>


            <p class="text-danger">
                * Если вы не проходили регистрацию на сайте BlogForYou,
                то проигнорируйте и удалите это письмо.
            </p>
</body>
</html>