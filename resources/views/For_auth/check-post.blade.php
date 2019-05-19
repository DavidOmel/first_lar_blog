<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .alert-success{
            border-radius: 20px;
            margin-top: 130px;
        }
    </style>
    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="/img/site.png">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-9 col-md-6">
            <p class="alert-success p-3">
                Пожалуйста, зайдите на вашу почту {{$user->email}} и подтвердите
                @if(isset($_SESSION['name']))регистрацию@endif
                @if(!(isset($_SESSION['name']))) изменение пароля @endif
            </p>
        </div>
    </div>
</div>

</body>
</html>