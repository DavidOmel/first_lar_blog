<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">

      .title{
        font-size: 2.2em;
      }
      .img-fluid{
        width: 60%;
        border-radius: 20px;
      }

     .lead{
      margin-left: -3%;
       white-space: pre-line;
     }

      .date{
        font-size: 0.9rem;
        color: #B8B8B8;
      }

      #icon-user{
        width: 10%;
      }


      @media (max-width: 768px) {
          .title{
              font-size: 1.3rem;
              position: relative;
              bottom: 3px;
              left: 5%;
          }
          .img-fluid{
              width: 90%;
              border-radius: 20px;
          }
          .lead{
            font-size: 16px;
            margin-top: -10%;
            white-space: pre-line;
          }
          .title-comment{
            font-size: 2rem;
          }
          .comment{
            font-size: 12px;
            margin-bottom: 0px !important;
            margin-top: 10px;
          }

          #icon-user{
            width: 15%;
          }

          .date{
            font-size: 0.6rem;
          }
          footer{
            font-size: 12px !important;
          }
          h3{
            font-size: 1.2rem;
          }

      }/* media.. */
    </style>

    <title> BlogForYou</title>
    <link rel="icon" type="image\png" href="/img/site.png">
  </head>
  <body>

    
    
    <section>
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12 mt-3">
            <a href="/" class="btn btn-warning btn-lg">Главная</a>
          </div>


          <div class="col-11 d-flex flex-column align-items-center">
            <h1 class="display-4 mt-3 mb-3 title text-center">{{$article->title}}</h1>
            <img src="/storage/{{$article->img}}" class="img-fluid mb-5 "></img>
            <p class="lead">
              {{$article->full_text}}
            </p>
          </div><!--col-11-->
        </div><!--row-->
      </div>
    </section>
<hr class="mb-5" style="width: 90%">
    <section class="comments">
      <div class="container">
        <div class="row justify-content-center">

          <h1 class="display-4 mb-5 title-comment">Комментарии:</h1>

           <div class="col-12 pt-md-5 pr-md-5">
             <div class="row justify-content-center">
               


            @if(isset($comments))<hr style="width: 90%">
              @foreach($comments as $comment)
               <div class="col-md-10 mb-md-3">
                 <img class="d-inline" src="{{$comment->icon}}" id="icon-user">
                 <h3 class="d-inline">{{$comment->author}}<span class="date ml-3">{{$comment->created_at}}</span></h3>
                 <p class="pl-4 comment">{{ $comment->text }}</p>
               </div><!--col-10-->
               <hr style="width: 90%">
              @endforeach
            @endif



             </div><!--row-->
           </div><!--col-12-->

        </div><!--row-->
      </div><!--container-->
    </section>

     <footer class="bg-dark mt-5 py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-10 col-md-4 text-light">
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