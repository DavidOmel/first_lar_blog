<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        #show-password{
            width: 25px;
            height: 25px;
            position: relative;
            left: 104%;
            bottom: 35px;
            display: inline;
        }
        label{
            font-size: 1.1rem;
            margin-left: 5%;
        }

    </style>
    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>


<head class="container">
    <h1 class="text-center mb-5 mt-3">Вход в аккаунт:</h1>
</head>

<main class="container">
    <div class="row justify-content-center">
        <div class="col-8 col-md-5">
            <form method="post" action="{{route('entry_secure')}}">
                @csrf
                <div class="form-group">
                    <label for="inp-1">Email адрес</label><br>
                    @if(isset($error['email']))
                        <span class="text-danger">{{$error['email']}}</span><br>
                    @endif
                    <input name="email" value="@if(isset($error['val_email'])){{$error['val_email']}}@endif" type="email" required class="form-control" id="inp-1">
                </div>

                <div class="form-group">
                    <label for="inp-2">Ваш пароль</label><br>
                    @if(isset($error['password']))
                        <span class="text-danger">{{$error['password']}}</span><br>
                    @endif
                    <input type="password" value="@if(isset($error['val_pw'])){{$error['val_pw']}}@endif"  name="password" class="form-control" id="inp-2">
                    <img id="show-password" src="icons\notshow.png">
                    <a href="{{route('restore')}}" class="">Забыли пароль?</a>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Войти</button>

            </form>
        </div>
    </div>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function () {
        $('#show-password').click(function () {
            var src = $('#show-password').attr('src');
            if (src == 'icons\\notshow.png'){
                src = 'icons\\show.png';
                $('#show-password').attr('src', src);

                $('#inp-2').attr('type', 'text');
            }
            else {
                src = 'icons\\notshow.png';
                $('#show-password').attr('src', src);

                $('#inp-2').attr('type', 'password');
            }
        });
    });
</script>

</body>
</html>