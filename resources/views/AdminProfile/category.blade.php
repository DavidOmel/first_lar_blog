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
        .inp-category{
            width: 60% !important;
        }
        .btn-danger{
            position: relative;
            bottom: 31px;
            left: 108px;
        }
        table{
            font-size: 1.2rem;
        }

        .none{
            display: none;
        }
        #button-back{
            border: 2px dashed #05BCEA;
            border-radius: 20px;
            position: relative;
            left: 71%;
            top:30px;
            width: 30%;
        }
        .back{
            position: relative;
            bottom: 50px;
            right: 4%;
            font-size: 1.5rem;
            color: #FF699B;
        }
        .back:hover{
            text-decoration: none;
            color: #D94375;
        }

    </style>
    <?php
    $none1 = '';
    $none2 = 'd-none';
    if($errors->has('category_update')){
        $none1 = 'd-none';
        $none2 = '';
    }
    ?>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>

<header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 header">
                <h1 class="display-5 text-center">Категории</h1>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <a class="back" href="{{route('AdminProfile', ['user' => $user])}}">Назад</a>
        <div class="row">

            <div class="col-6 mt-5">

                <div id="button-back" class="{{$none2}} pl-2"><a href="#" class="text-center">Создать новую</a></div>

                <form id="create" class="{{$none1}}" method="post"
                      action="{{route('categories.store', ['user' => $user])}}">
                    <h2 id="title-input">Новая категория:</h2>
                    <div class="form-group">
                        @csrf
                        <input value="{{old('category')}}" name="category" class=" inp-category">
                        <button type="submit" class="btn btn-warning">+</button>
                    </div>
                </form>

                <!-- form of change    -->
                <form class="{{$none2}}" action="/your_profile/{{$user->id}}/categories/"
                      id="change" method="post" class="none">
                    @csrf
                    @method('PUT')

                    <input id="input-id" name="id" hidden value="{{old('id')}}">

                    <h2 id="title-input">Изменить категрию:</h2>
                    <input value="{{old('category_update')}}" id="inp-cat" name="category_update" class=" inp-category">
                    <button type="submit" class="btn btn-warning">+</button>
                </form>
                @if($errors->has('category'))
                    <div class="row ml-5 mb-md-3">
                        @foreach($errors->get('category') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    </div>
                @endif

                @if($errors->has('category_update'))
                    <div class="row ml-5 mb-md-3">
                        @foreach($errors->get('category_update') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-6">
                <table class="table mt-3">

                    <tr><td><b>Категория</b></td> <td><b>Действие</b></td></tr>

                   @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <button id="{{$category->id}}" class="btn btn-primary btn-sm btn-change">Изменить</button>
                            <form action="{{route('categories.destroy',
                             ['user' => $user, 'category' => $category->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr><!-- строка для цикла -->
                    @endforeach

                </table>
            </div><!-- col -->
        </div><!-- row -->
    </div>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- code of jquery -->
<script type="text/javascript">

    $(function() {

        $('.btn-change').click(function() {
            var category = $(this).parent().siblings().text();
            var id = $(this).attr('id');
            var action  = $('#change').attr('action');

            $('#change').attr('class', '');
            $('#create').attr('class', 'none');
            $('#button-back').attr('class', 'pl-2');

            action = action + id;
            $('#input-id').val(id);
            $('#change').attr('action', action);
            $('#change').children('#inp-cat').val(category);

            $('#button-back').click(function() {
                $('#change').attr('class', 'none');
                $('#button-back').attr('class', 'none');
                $('#create').attr('class', '');
            });
        });

    });

</script>

    @if($errors->has('category_update'))
        <script>
            var action = $('#change').attr('action');
            var id = $('#input-id').val();
            var action = action + id;
            $('#change').attr('action', action);
        </script>
    @endif
</body>
</html>