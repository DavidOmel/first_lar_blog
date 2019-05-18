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
      textarea{
        resize: none;
        width: 100% !important;
        height: 350px !important;
      }
      .send{
        position: relative;
        left: 80%;
        font-size: 1.2em;
        width: 140px;
        height: 50px;
      }
      
      .acts-but-com{
         position: relative;
         left: 80%;
         bottom: 30px;
         width: 40%;
      }
      .date{
          font-size: 0.9rem;
          color: #B8B8B8;
      }
      .date-article{
          font-size: 1.3rem;
          color: #B8B8B8;
      }

      #icon-user{
          width: 10%;
      }
      .comment{
          word-wrap: break-word;
      }

      #but-form-change{
        position: relative;
        left: 74%;
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
          }
          .title-comment{
            font-size: 2rem;
          }
          textarea{
            width: 100% !important;
            height: 150px !important;
            font-size: 14px !important;
             resize: none;
          }
           .send{
              position: relative;
              left: 71%;
              font-size: 0.8em;
              width: 80px;
              height: 40px;
          }

          .acts-but-com{
            display: flex;
            flex-direction: row;
            position: relative;
             left: 60%;
             bottom: 30px;
             margin-top: 10px;
             margin-bottom: 5px;

          }
          .comment{
            font-size: 12px;
            margin-bottom: 0px !important;
            margin-top: -30px;
          }
  
          #but-form-change{
            position: relative;
            left: 47%;
          }
           .em08 {
               font-size: 0.8em;
           }
           #comment_but{
               display: inline-flex;
               position: relative;
               top: 23px;
               right: 40px;
           }
          footer{
            font-size: 12px !important;
          }
          h3{
            font-size: 1.2rem;
          }
          .date{
              font-size: 0.6rem;
              color: #B8B8B8;
          }

          #icon-user{
              width: 15%;
          }

      }/* media.. */
    </style>
      <?php
         $none1 = '';
         $none2 = 'd-none';
         if($errors->has('text_update')){
             $none1 = 'd-none';
             $none2 = '';
         }
      ?>

      <title> BlogForYou</title>
      <link rel="icon" type="image\png" href="/img/site.png">
  </head>
  <body>

    
    
    <section>
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-12 mt-3">
            <a href="/your_profile/{{$user->id}}/" class="btn btn-warning btn-lg">Главная</a>
          </div>


          <div class="col-11 d-flex flex-column align-items-center">
            <h1 class="display-4 mt-3 mb-3 title text-center">{{$article->title}}</h1>
            <img src="/storage/{{$article->img}}" class="img-fluid mb-5 ">
            <p class="lead">
              {{$article->full_text}}
            </p>
              <span class="date-article mt-4">{{$article->created_at}}</span>
          </div><!--col-11-->
        </div><!--row-->
      </div>
    </section>
<hr class="mb-5" style="width: 90%">
    <section class="comments">
      <div class="container">
        <div class="row justify-content-center">

          <h1 class="display-4 mb-5 title-comment">Комментарии:</h1>
          
           <div class="col-10">
              @if($errors->has('text'))
                <div class="row ml-5 mb-md-3">
                @foreach($errors->get('text') as $error)
                    <span class="text-danger">{{$error}}</span><br>
                 @endforeach
                </div>
              @endif

              @if($errors->has('text_update'))
                  <div class="row ml-5 mb-md-3">
                      @foreach($errors->get('text_update') as $error)
                          <span class="text-danger">{{$error}}</span><br>
                      @endforeach
                  </div>
              @endif


             <form class="{{$none1}}" action="{{route('comments.store', ['user' => $user->id,
               'article' => $article->id])}}" method="post" id="create">
               @csrf
               <div class="form-group">
                 <textarea  name="text"  placeholder="Напишите комментарий..."  class="form-control">{{old('text')}}</textarea>
               </div>
               <button type="submit" class="btn btn-info btn-sm send">Добавить</button>
             </form>



                    <!-- for change comment / -->
             <form  class="{{$none2}}" action="/your_profile/{{$user->id}}/articles/{{$article->id}}/comments/"
                   method="post" id="change" class="d-none">
               @csrf
               @method('PUT')

                 <input id="input-id" name="id" hidden value="{{old('id')}}">

               <div class="form-group">
                 <textarea name="text_update" class="form-control">{{old('text_update')}}</textarea>
               </div>

               <div id="but-form-change">
               <button id="cancel" type="button" class="btn btn-sm em08" style="background-color: #D3D3D3;">Отмена</button>
               <button type="submit" class="btn btn-info btn-sm em08">Изменить</button>
               </div>

             </form>



           </div><!--col-10-->



           <div class="col-12 mt-5 pt-md-5 pr-md-5">
             <div class="row justify-content-center">



            @if(isset($comments))<hr style="width: 90%">
              @foreach($comments as $comment)
               <div class="col-md-10 mb-md-0">

                   <img class="d-inline" src="/img/user.png" id="icon-user">

                   <h3 class="d-inline">{{$comment->author}}
                       <span class="date ml-3">{{$comment->created_at}}</span>
                   </h3>
                 <div class="acts-but-com">
                   @if($user->id == $comment->author_id || $user->isadmin == 1)

                   <form id="comment_but" method="post" action="{{route('comments.destroy',
                    ['user' => $user->id, 'article' => $article->id, 'comment' => $comment->id])}}">
                      @method("DELETE")
                      @csrf
                     @if($user->id == $comment->author_id)
                     <button type="button" id="change-button"
                      class="btn btn-primary text-light btn-sm em08">Изменить</button>
                     @endif
                     <button type="submit" class="btn btn-danger text-light
                       btn-sm em08 ml-1">Удалить</button>
                   </form>
                   @endif
                 </div>
                 <p class="pl-4 pt-4 comment">{{ $comment->text }}</p>
                 <hr class="{{$comment->id}}" style="width: 100%">
               </div>
                 <!--col-10-->

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


   
    <!-- code of jquery -->
    <script type="text/javascript">

      $(function() {

          $('#change-button').click(function() {
            var text_comment = $(this).parent().parent().siblings('p').text();
            $('#change').attr('class', '');
            $('#create').attr('class', 'd-none');

            var id =  $(this).parent().parent().siblings('hr').attr('class');
            $('#input-id').val(id);
            var action = $('#change').attr('action');
            action = action + id;


            $('#change').attr('action', action);$('#change').attr('action', action);
            $('#change').children('div').children('textarea').val(text_comment);
            $('#change').children('div').children('textarea').focus();


            $('#cancel').click(function() {
              $('#change').attr('class', 'd-none');
              $('#create').attr('class', '');
            });
        });

      });

    </script>

  @if($errors->has('text_update'))
      <script>
          var action = $('#change').attr('action');
          var id = $('#input-id').val();
          var action = action + id;
          $('#change').attr('action', action);
      </script>
  @endif
  </body>
</html>