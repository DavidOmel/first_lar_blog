<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
        .header{
            background-color: #05BCEA;
            color: white;
            border-radius: 0px 0px 20px 20px;

        }
        table{
            font-size: 1.2rem;
            width: 80%  !important;
            margin-top: 20px;
            margin-right: 100px !important;
        }

        .search{
            position: fixed;
            left: 71%
        }
        .back{
            position: relative;
            bottom: 60px;
            right: 1.4%;
            font-size: 1.5rem;
            color: #FF699B;
        }
        .back:hover{
            text-decoration: none;
            color: #D94375;
        }

    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="/img/site.png">
</head>
<body>

<header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 header">
                <h1 class="display-4 text-center">Зарегистрированные пользователи:</h1>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">

        <div class="back">
            <a class="back" href="{{route('AdminProfile', ['user' => $user])}}" style="font-size: 1.5rem;">Назад</a>
        </div>

        <div class="row justify-content-center">

            <div class="col-9">

                <div class="search mt-5">
                    <form class="form-inline" method="post"
                          action="{{route('user_search', ['user' => $user])}}">
                        @csrf
                        <div class="form-group">
                            <input value="" name="name" class="form-control" placeholder="Найти...">
                            <button class="btn btn-success">поиск</button>
                        </div>
                    </form>
                </div>

                <table class="table table-hover">
                    <tr> <td><b>Логин</b></td> <td><b>email</b></td> <td><b>Действие</b></td> </tr>

                   @foreach($users as $line)
                    <tr>
                        <td class="td-user">{{$line->name}}</td>
                        <td>{{$line->email}}</td>
                        <td><form action="{{route('users.destroy', ['user' => $user->id, 'user_del' => $line->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form></td>
                    </tr>
                   @endforeach

                </table>

            </div> <!-- col -->
        </div> <!-- row -->
    </div>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>