<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        body{
            background-color: #f8f8f8;
        }
        header{
            height: 200px;
            border: 2px dashed black;
            border-radius: 40px;

        }
        #reg-ent{
            position: relative;
            left: 84%;
            top: 20px;
            font-size: 1.15em;
            width: 120px;
        }
        .btn-more{
            position: relative;
            left: 25%;
        }

        .platform{
            border-radius: 10px;
        }
        .card-text{
            margin-left: 4% !important;
        }
        #views{
            position: relative;
            left: 25%;
        }
        #icon{
            width: 25px !important;
            height: 25px !important;
        }


        @media (max-width: 768px) {
            .display-2{
                font-size: 2rem;
            }

            header{
                height: 120px;
            }
            #reg-ent{
                position: relative;
                left: 60%;
                top: 20px;
                font-size: 1.15em;
                width: 120px;
            }
            .card{
                width: 130%;
                margin-left: -14%;
            }

        }/* media */

    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="/img/site.png">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #65696B;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link @if(isset($active_pop)){{$active_pop}}@endif"
                       href="{{route('InProfile', ['user' => $user])}}">Популярное</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(isset($active_new)){{$active_new}}@endif"
                       href="{{route('InProf_new', ['user' => $user])}}">Новое</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Категории
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                           href="<?php if(isset($active_pop)) echo route('InProfile', ['user' => $user]);
                                        else echo route('InProf_new', ['user' => $user]); ?>">
                            <option>Всё</option>
                        </a>

                        @foreach($categories as $category1)
                            <a class="dropdown-item"
                               @if(isset($active_pop))
                               href="{{route('InProfile_categ', ['user' => $user, 'page' => 1,'category' => $category1->id])}}"
                               @endif

                               @if(isset($active_new))
                               href="{{route('InProf_categ_new', ['user' => $user, 'page' => 1,'category' => $category1->id])}}"
                                    @endif>
                                <option>{{$category1->name}}</option>
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">О нас</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<!-- регистрация + авторизация-->
    @if($user->isadmin != 1)
        <div id="reg-ent">
            <a href="/">Выйти из аккаунта</a>
        </div>
    @endif
    @if($user->isadmin == 1)
        <div id="reg-ent" style="width: 140px;">
            <a href="{{route('AdminProfile', ['user' => $user])}}">Админ панель</a>
        </div>
    @endif

<header class="bg-warning d-flex flex-column justify-content-center align-items-center mx-5 mt-5">
    <div class="container text-center">
        <h1 class="display-2">BLOG FOR YOU</h1>
    </div>
</header>

<main>
    <div class="container-fluid">
        <div class="row  justify-content-center align-items-center">

            <div class="col-11 bg-info my-5 mx-4 platform">

                <div class="row mx-4 my-5">



                    @foreach($articles as $article)
                        <div class="col-12 col-sm-6 col-md-4 mb-4">
                            <div class="card">
                                <img src="/storage/{{$article->img}}" class="card-img-top mt-3 px-3">
                                <div class="card-body">
                                    <h5 class="card-title text-center pr-4">{{$article->title}}</h5>
                                    <p class="card-text ml-3 ml-md-0">
                                        {{$article->short_text}}
                                    </p>
                                    <a href="{{route('articles.show', ['user' => $user,
                                     '$article' => $article])}}" class="btn btn-primary btn-more">
                                        Подробнее
                                    </a>
                                    <span id="views"><img id="icon" src="/img/show.png">{{$article->views}}</span>
                                </div>
                            </div>
                        </div> <!-- col-4 блок для цикла-->
                    @endforeach




                </div><!-- row 2 -->
            </div><!-- col-12 -->

            <div class="col-9 col-sm-7 col-md-6 d-flex flex-row justify-content-center">
                @for($num = 1; $num <= $pages; $num++)
                    <?php $active = null; if ($num == $page)$active = 'active'; ?>
                        <a href="<?php
                        if (isset($active_pop)){
                            if ($category != null){
                                echo route('InProfile_categ', ['user' => $user,'page' =>$num, 'category' => $category]);
                            }
                            else echo route('InProfile_all', ['user' => $user,'page' => $num]);
                        }
                        else {
                            if ($category != null){
                                echo route('InProf_categ_new', ['user' => $user,'page' =>$num, 'category' => $category]);
                            }
                            else echo route('InProf_all_new', ['user' => $user,'page' => $num]);
                        }
                        ?>"
                           class="btn btn-outline-primary btn-lg {{$active}}"
                        >{{$num}}
                        </a>
                @endfor
            </div><!-- переход между стр -->

        </div><!-- row -->
    </div><!-- container -->
</main>

<footer class="bg-dark mt-5 py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 col-md-5 text-light">
                <h3>Контактные данные:</h3>
                <address>
                    EMAIL:<b> david20010602@gmail.com</b><br>
                    ном.тел.<b> +380 67 88 11 602 </b>
                </address>
            </div>

            <div class="col-12 text-light d-flex justify-content-center"><span>&copy2019-2020</span></div>

        </div> <!-- row -->
    </div><!-- container -->
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>