<?php
//***************  OUT profile ***************//
      //_________Popular__________//
Route::get('/', 'Index\OutProfile@Popular');
Route::get('/page/{page?}', 'Index\OutProfile@Popular')->name('out');
Route::get('/page/{page}/category/{category}', 'Index\OutProfile@Popular')->name('category_out');

//________________new_______________//
Route::get('/new_', 'Index\OutProfile@New');
Route::get('/new_page/{page?}', 'Index\OutProfile@New')->name('out_new');
Route::get('/new_page/{page}/category/{category}',
    'Index\OutProfile@New')->name('category_out_new');

Route::get('regist', 'Registration@Showreg');
Route::post('regist', 'Registration@Makereg')->name('registration');
Route::get('verification/{_token}', 'Registration@secure')->name('regsecFrom');

Route::get('authent', 'Entry@Showsec')->name('entry');
Route::post('authent', 'Entry@Makesec')->name('entry_secure');



Route::get('articles/{article}', 'ArticleContr@showOut')->name('showarticle');

// restore password:
Route::get('restore_password/{user?}', 'UserController@restore_show')->name('restore');
Route::post('send_post', 'UserController@restore_send');
Route::put('change_password/{user}', 'UserController@change_password')->name('change_pw');


Route::prefix('your_profile/{user}')->middleware('secure')->group(function (){

    // *************   For in profile users***************

    Route::get('/', 'Index\InProfile@Popular')->name('InProfile');
    Route::get('/page/{page?}', 'Index\InProfile@Popular')->name('InProfile_all');
    Route::get('/page/{page?}/category/{category}', 'Index\InProfile@Popular')->name('InProfile_categ');
      //____________________________New____________________//
    Route::get('/new_', 'Index\InProfile@New')->name('InProf_new');
    Route::get('/new_page/{page?}', 'Index\InProfile@New')->name('InProf_all_new');
    Route::get('/new_page/{page?}/category/{category}', 'Index\InProfile@New')->name('InProf_categ_new');


    //***********  For admin*******************//
    Route::get('Admin_panel/', 'Index\AdminProfile@show')->name('AdminProfile');
    Route::resource('categories', 'CategoryCont');
    Route::get('articles/list', 'ArticleContr@list')->name('articles.list');
    Route::get('users/list', 'UserController@list')->name('users.list');
    Route::resource('users', 'UserController',
        ['parameters' => ['users' => 'user_del']]);
    Route::post('articles/list/only', 'Search@articles')->name('art_search');
    Route::post('users/list/only', 'Search@users')->name('user_search');



    //********* For admin and in profile users********
    Route::resource('articles', 'ArticleContr');
    Route::prefix('/articles/{article}')->group(function (){
        Route::resource('comments', 'CommentCont', ['only' => [
          'store', 'destroy', 'update'
      ]]);
    });


});



















