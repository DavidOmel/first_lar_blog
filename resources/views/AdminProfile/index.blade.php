<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        a{
            display: block;
            text-decoration: none !important;
        }
        a.h3:hover{
            display: block;
            text-decoration: none !important;
            box-shadow: 7px 7px 13px gray;
            font-size: 1.9em !important;
        }
        a.h5:hover{
            display: block;
            text-decoration: none !important;
            box-shadow: 7px 4px 15px gray;
            font-size: 1.4em !important;
        }

        header{
            background-color: #3794FF;
            text-align: center;
            color: #FFFFFF;
            height: 130px;
            width: 45% !important;
            border-radius: 0px 0px 20px 20px;
        }
        #home{
            height: 90px;
            color: black;
            background-color: #FFC107;
            margin: 20px;
            position: relative;
            bottom: 100px;
            border-radius: 20px;
        }
        #number{
            background-color:  #D996FF;
            height: 50px;
            text-align: center;
            margin-top: 30px;
            margin-right: 4%;
            margin-left: 4%;
            border-radius: 20px;
        }
        #users{
            color: #FFFFFF !important;
            background-color: #007BFF;
            text-align: center;
            height: 180px;
            margin: 20px;
            position: relative;
            bottom: 100px;
            border-radius: 20px;
        }
        #categories{
            background-color: #FF6565;
            color: #FFE97D;
            text-align: center;
            height: 170px;
            margin: 20px 20px 20px 90px;
            border-radius: 20px;
        }
        #articles{
            background-color: #F77100;
            color: #fff;
            text-align: center;
            height: 170px;
            margin: 20px 20px 20px 20px;
            border-radius: 20px;
        }
        #create{
            background-color: #15C177;
            color: #CAFAFF;
            text-align: center;
            height: 170px;
            margin: 20px;
            border-radius: 20px;
        }
    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>


<header class="container">
    <div class="row justify-content-center pt-3">
        <h1>Добро пожаловать, Админ!</h1>
    </div>
</header>

<main>
    <div class="container-fluid">
        <div class="row">

            <a href="{{route('InProfile', ['user' => $user])}}" id="home" class="col-2 h3 d-flex flex-row justify-content-center align-items-center">
                <span>Главная</span>
            </a><!-- col -->

            <div id="number" class="col-6  d-flex flex-row justify-content-center align-items-center" style="color: #FFFFFF; font-size: 1.2rem;">
                <span>Ваш сайт посетило {{$visitors}} человек</span>
            </div><!-- col -->


            <a href="{{route('users.list', ['user' => $user->id])}}" id="users" class="col-2 h5 d-flex flex-row justify-content-center align-items-center">
                <span>Все пользователи</span>
            </a><!-- col -->

            <a href="{{route('categories.create', ['user' => $user->id])}}" id="categories" class="col-3 h3 d-flex flex-row justify-content-center align-items-center">
                <span>КАТЕГОРИИ СТАТЕЙ</span>
            </a><!-- col -->

            <a href="{{route('articles.list', ['user' => $user->id])}}"
               id="articles"  class="col-3 h3  d-flex flex-row justify-content-center align-items-center">
                <span>ВСЕ <br> СТАТЬИ</span>
            </a><!-- col -->

            <a href="{{route('articles.create', ['user' => $user->id])}}"
               id="create" class="col-3 h3 d-flex flex-row justify-content-center align-items-center">
                <span>СОЗДАТЬ СТАТЬЮ</span>
            </a><!-- col -->

        </div><!-- row -->
    </div>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>