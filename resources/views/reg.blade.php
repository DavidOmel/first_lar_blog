<!doctype html>
<?php session_start() ;
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" >


    <?php // логика отображения:

        //переменные по умолчанию:
        //$error1 = null;
        $err1 = null;
        $err2 = null;
        $err3 = null;
        $err4 = null;
        $err5 = null;
        $RN = null;
        $RE = null;
        $RP = null;
        $lab1 = null;
        $lab2 = null;
        $lab3 = null;
        $lab4 = null;

    // передача значений:
        if(isset($_SESSION['name'])) $RN = $_SESSION['name'];
        if(isset($_SESSION['email'])) $RE = $_SESSION['email'];
        if(isset($_SESSION['password'])) $RP = $_SESSION['password'];


        //validation:
        if(count($errors) > 0){
            foreach ($errors->all() as $error){

                if($error == 'The email has already been taken.'){
                    $err1 = ' * Почта уже используется!';
                    $lab2 = 2;
                }
                if($error == 'The name may only contain letters, numbers, dashes and underscores.'){
                    $err2 = ' * Только буквы, цифры, тире и подчеркивания!';
                    $lab1 = 1;
                }
                if($error == 'The password and confirm must match.'){
                    $err3 = ' * Вы не подтвердили пароль!';
                    $lab4 = 4;
                }
                if($error == 'The password must be between 5 and 16 digits.'){
                    //css:
                    $err4 = 'lengpass';
                    $lab3 = 3;
                }
                if($error == 'The name may not be greater than 50 characters.'){
                    $err5 = 'Допустимо не более 50 символов';
                    $lab1 = 1;
                }
            }
        }

    ?>

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
            width:600px;
            hieght:350px;
            position: relative;

            border: 0px dashed black;
        }

        #lab{
            position: relative;
            right: 100px;
            white-space: pre;
        }

        #lab1{
            position: relative;
            left: 65px;
        }
        #lab2{
            position: relative;
            right: 5px;
        }
        #lab3{
            position: relative;
            right: 70px;
        }
        #lab4{
            position: relative;
            right: -45px;
        }

        #error{
            color: red;
        }

        #input{
            width: 250px;
            position: relative;
            left: 150px;
        }

        #reg{
            width: 250px;
            position: relative;
            left:150px;
        }

        #span{color: #FFC400; font-size: 14px}
        #spanlengpass{color: red; font-size: 14px;
        position: relative;
            right: -35px;
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

<div id="form">
    <form class="form-signin" method="post" action="{{route('postreg')}}">
        {{ csrf_field() }}

        <h1 class="h3 mb-3 font-weight-normal">Пожалуйста, зарегистрируйтесь:</h1><br/>
        <label id="lab{{$lab1}}">Ваше имя<span id="error">{{$err2}}</span><br/><span id="error">{{$err5}}</span></label>
        <input name="name" value="{{$RN}}" type="text" id="input" class="form-control"  placeholder="" required autofocus>
        <br/>

        <label id="lab{{$lab2}}">Email адрес<span id="error">{{$err1}}</span></label>
        <input name="email" value="{{$RE}}" id="input" type="email" class="form-control" placeholder="Email" required >
        <br/>

        <label id="lab{{$lab3}}">              Придумайте пароль<br/><span id="span{{$err4}}" >                                  (введите от 5 до 16 символов)</span></label>
        <input name="password" value="{{$RP}}" type="password" id="input" class="form-control" placeholder="Пароль"  required>
        <br/>

        <label id="lab{{$lab4}}">               Подтвердите пароль<span id="error">{{$err3}}</span></label>
        <input name="confirm" value="" type="password" id="input" class="form-control" placeholder="Пароль" required>
        <br/><br/>
        <br/>
        <button name="reg" id="reg" class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form><br/><br/><br/><br/>
    <br/><br/><br/>
</div>

</body>
</html>
