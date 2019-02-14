<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" >

    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/60FAD68C-65B5-C84F-BF0D-B1C27C37E293/main.js" charset="UTF-8"></script><style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        #form{
            width:500px;
            hieght:350px;
            position: relative;
            left:250px;
        }

        #lab{
            position: relative;
            right: 200px;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

<div id="form">
    <form class="form-signin" method="post" action="{{route('postsec')}}">
        {{ csrf_field() }}

        <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, войдите в аккаунт:</h1><br/>
        <label id="lab">Email адрес</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>

        <br/>
        <label id="lab">Ваш пароль</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>

        <br/><br/>
        <div class="checkbox mb-3">
            <label>
                <input name="remeber" type="checkbox" value="remember-me"> запомнить меня
            </label>
        </div>
        <button name="entry" class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>
</div>

</body>
</html>
