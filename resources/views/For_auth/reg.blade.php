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
        #div-4{
            margin-top: -25px;
        }
        .text-danger{

        }

    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="/img/site.png">
</head>
<body>


<head class="container">
    <h1 class="text-center mb-5 mt-3">Регистрация:</h1>
</head>

<main class="container">
    <div class="row justify-content-center">
        <div class="col-8 col-md-5">
            <form method="post" action="{{route('registration')}}">
                @csrf
                <div class="form-group">
                    <label for="inp-1" >Ваше имя</label><br>
                    @if($errors->has('name'))
                        @foreach($errors->get('name') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    @endif
                    <input  value="{{old('name')}}" name="name" class="form-control" id="inp-1">
                </div>

                <div class="form-group">
                    <label for="inp-2" >Email адрес</label><br>
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    @endif
                    <input value="{{old('email')}}" type="email" name="email" class="form-control" id="inp-2">
                </div>

                <div class="form-group">
                    <label for="inp-3" >Придумайте пароль</label><br>
                    @if($errors->has('pw'))
                        @foreach($errors->get('pw') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    @endif
                    <input value="{{old('pw')}}" type="password" name="pw" class="form-control" id="inp-3">
                    <img id="show-password" src="/img/notshow.png">
                </div>

                <div class="form-group mb-5" id="div-4">
                    <label for="inp-4" >Подтвердите пароль</label><br>
                    @if($errors->has('confirm'))
                        @foreach($errors->get('confirm') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    @endif
                    <input value="{{old('confirm')}}" type="password" name="confirm" class="form-control" id="inp-4">
                </div>

                <button class="btn btn-primary btn-block btn-lg" type="submit">Зарегистрироваться</button>

            </form>
        </div><!-- col -->
    </div><!-- row -->
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
            if (src == '/img/notshow.png'){
                src = '/img/show.png';
                $('#show-password').attr('src', src);

                $('#inp-3').attr('type', 'text');
                $('#inp-4').attr('type', 'text');
            }
            else {
                src = '/img/notshow.png';
                $('#show-password').attr('src', src);

                $('#inp-3').attr('type', 'password');
                $('#inp-4').attr('type', 'password');
            }
        });
    });
</script>

</body>
</html>