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
            height: 110px;
            font-size: 3rem;
            border-radius: 0px 0px 20px 20px;
        }
        textarea{
            width:90% !important;
            height:150px !important;
        }
        input{
            width: 50% !important;
        }
        select{
            width: 50% !important;
        }
        label{
            font-size: 1.2rem;
        }
        .btn{
            margin-left: 80%;
            margin-top: 4%;
        }
        .createcategory{
            border: 2px dashed #52A5EA;
            width: 20%;
            height: 50px;
            font-size: 1.1rem;
            position: relative;
            left: 60%;
            top: 120px;
        }

        form{
            position: relative;
            bottom: 30px;
        }
    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="{{asset('icons\site.png')}}">
</head>
<body>

<header class="container bg-warning">
    <div class="row justify-content-center">
        <div class="col-10  text-center">Создайте статью</div>
    </div>
</header>

<main class="container">
    <div class="row justify-content-center">
        <div class="col-11 ml-5">
            <form method="post" action="{{route('articles.store', ['user' => $user->id])}}"
                  enctype="multipart/form-data">
                 @csrf
                <div class="createcategory py-2 pl-2">
                    <a href="{{route('categories.create', ['user' => $user->id])}}">Создать категории</a>
                </div>

                <div class="form-group">
                    <label for="title">Название:
                        @if($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                <span style="color: red">{{$error}}</span><br>
                            @endforeach
                        @endif
                    </label>
                    <input id="title" type="text" name="title" placeholder="Введите данные..." required
                           class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="category">Категория:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="text">Статья:
                        @if($errors->has('full_text'))
                            @foreach($errors->get('full_text') as $error)
                                <span style="color: red">{{$error}}</span>
                            @endforeach
                        @endif
                    </label>
                    <textarea name="full_text" id="text" class="form-control" required
                              placeholder=" Напишите статью...">{{old('full_text')}}</textarea>
                </div>

                <div class="form-group">
                    <label>Главное фото:
                        @if($errors->has('photo'))
                            @foreach($errors->get('photo') as $error)
                                <span style="color: red">{{$error}}</span>
                            @endforeach
                        @endif</label>
                    <input type="file" name="photo" required class="ml-5">
                </div>

                <button class="btn btn-lg btn-primary" type="submit">Создать</button>
            </form>
        </div>
    </div>
</main>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>