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
            font-size: 2.7rem;
        }
        label{
            font-size: 1.3rem;
            margin-left: 2%;
        }
        form{
            margin-top: 5%;
        }

        .btn{
            margin-left: 79%;
        }

        @media(max-width: 767px){
            header{
                font-size: 2rem !important;
            }
            .btn{
                margin-left: 65%;
            }
        }
    </style>
    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>


<header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9 col-md-7 text-center mt-4">
                <span>Восстановление пароля:</span>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</header>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <!-- Отправка письма -->
                @if(!(isset($user)))
                <form action="send_post" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Ваша почта:
                        @if($errors->has('email_restore'))
                            @foreach($errors->get('email_restore') as $error)
                                <span style="color: red">{{$error}}</span>
                            @endforeach
                        @endif
                        </label>
                        <input value="{{old('email_restore')}}" type="email" name="email_restore" class="form-control"required >
                    </div>

                    <div class="alert alert-primary" role="alert">
                        На эту почту прийдет ссылка для восстановления пароля. <br>
                        Пожалуйста укажите почту которую вы использовали для регистрации на сайте!
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
                @endif


                @if(isset($user))
                <form method="post" action="{{route('change_pw', ['user' => $user->id])}}" class="mt-5">
                     @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label>Введите новый пароль:</label>
                        <input class="form-control" type="text" name="new_password" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
                    @if($errors->has('new_password'))
                        @foreach($errors->get('new_password') as $error)
                        <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    @endif
                 @endif
            </div><!-- col -->
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