<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        header{
            background-color: #6764FF;
            color:#FFFF05;
            font-size: ;
            height: 110px;
            border-radius: 0px 0px 20px 20px;
        }
        #td-view{
            width: 15% !important;
        }
        #search{
            position: fixed;
            left: 73%;
            top: 10px;
            z-index: 10;
        }
        b{
            font-size: 1.02em;
        }
        .back{
            position: relative;
            top: 30px;
            left: 50%;
            font-size: 1.5rem;
            color: #FF699B;
        }
        .back:hover{
            text-decoration: none;
            color: #D94375;
        }


    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>

<header class="container">
    <div class="row justify-content-center">
        <div class="col-4 mt-3">
            <h1>Ваши статьи</h1>
        </div><!-- col -->
    </div><!-- row -->
</header>

<main>
    <div class="container">
        <div class="row">

            <form id="search" class="form-inline" method="post"
              action="{{route('art_search', ['user' => $user])}}">
                @csrf
                <input value="" name="title" class="form-control" placeholder="Название...">
                <button type="submit" class="btn btn-success ">поиск</button>
            </form>

            <div class="col-10">

                <table class="table table-hover table-bordered">
                    <tr><td><b>Название</b></td><td><b>Категория</b></td><td id="td-view"><b>Кол-во просмотров</b></td><td><b>Действия</b></td></tr>

                  @foreach($articles as $line)
                    <tr><td><a href="{{route('articles.show',
                     ['user' => $user->id,'article' => $line->id])}}">{{$line->title}}</a></td>
                        <td>{{$line->category_name}}</td><td id="td-view">{{$line->views}}</td>
                        <td>
                          <div class="d-flex flex-row">
                            <a href="{{route('articles.edit', ['user' => $user->id,
                               'article' => $line->id])}}"><button class="btn btn-primary btn-sm mr-3">Изменить</button></a>
                              <form method="post" action="{{route('articles.destroy', ['user' => $user->id,
                               'article' => $line->id])}}">
                                  @csrf
                                  @method("DELETE")
                                  <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                              </form>
                          </div>
                        </td>
                    </tr><!-- строка для цикла -->
                    @endforeach

                </table>

            </div><!-- col -->
            <div class="col-1">
                <a class="back" href="{{route('AdminProfile', ['user' => $user])}}" >Назад</a>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>