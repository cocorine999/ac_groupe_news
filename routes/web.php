<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Auth::routes();

// enfold routes
Route::group(['namespace' => 'App'], function () {
    Route::group(['namespace' => 'Frontend'], function () {

        Route::get('', 'App@home')->name('home');
        Route::get('articles', 'App@show_posts')->name('show.all.posts');
        Route::get('contacter-nous', 'App@show_contact_form')->name('show.contact_form');
        Route::get('à-propos-de-nous', 'App@about_me')->name('show.about_me');
        Route::get('profil', 'App@profil')->name('show.profil');
        Route::get('breaking', function(){
            return view('enfold.componants.breaking');
        });
        Route::get('articles/{url}', 'App@show_single_post')->name('show.post')->where('url', '.*');
        Route::get('tags/{url}', 'App@show_tag_posts')->name('show.tag.posts')->where('url', '.*');
        Route::get('/recherche/{url}', 'App@search_posts')->name('search.posts');
        Route::get('categories/{url}', 'App@show_category_posts')->name('show.category.posts')->where('url', '.*');
        Route::post('contact', 'MessageController@store')->name('contact');
        Route::post('add_comment', 'App@add_comment')->name('add_comment');
        Route::post('response_comment', 'App@response_comment')->name('response_comment');
        Route::delete('delete_comment/{comment}', 'App@delete_comment')->name('delete_comment');

        // auth routes

        Route::group(['namespace' => 'Auth'], function () {
            Route::get('authentification', 'LoginController@showLoginForm')->name('login');
            Route::post('authentification', 'LoginController@login')->name('login');

            Route::get('creation-de-compte', 'RegisterController@showRegisterForm')->name('register');
            Route::post('creation-de-compte', 'RegisterController@register')->name('register');

            Route::get('identification', 'ForgotPasswordController@showLinkRequestForm')->name('show.email.form');
            Route::post('identification', 'ForgotPasswordController@sendResetLinkEmail')->name('send.email.link');

            Route::get('verification/{email}', 'VerificationController@verif')->name('verification.email.message');
            Route::post('verification', 'VerificationController@resend')->name('resend.email.link');

            Route::get('reinitialisation={url}', 'ResetPasswordController@showResetForm')->name('change.password');
            Route::get('changer-de-mot-de-passe', 'ResetPasswordController@show_reset_form')->name('show_reset_form');
            //Route::get('{email}', 'ResetPasswordController@email')->name('email');
            /* Route::get('{email}', function ($email) {
               
                Route::get('changer-de-mot-de-passe', function($email){
                    return view('enfold.page.auth.passwords.reset')->with([
                        'email' => $email
                    ]);
                });
                
            })->name('email'); */

            Route::post('updatePassword', 'ResetPasswordController@reset')->name('updated.password');

            Route::group(['middleware' => ['auth']], function () {

                Route::post('logout', 'LoginController@logout')->name('logout');
            });
        });
    });

    Route::group(['namespace' => 'Admin'], function () {

        Route::post('newsletter', 'SubscriberController@store')->name('newsletter');
    });
});

Route::group(['prefix' => 'administration'], function () {

    Route::group(['namespace' => 'App\Common'], function () {

        Route::group(['namespace' => 'Auth', 'middleware' => ['auth']], function () {

            Route::put('update-password', 'SettingsController@updatePassword')->name('update.password');
            Route::post('favorite/{post}/add', 'FavoriteController@add')->name('post.favorite');
            Route::put('parametre/{parametre}', 'SettingsController@update')->name('parametre.update');


            Route::group(['prefix' => 'administrateur',], function () {

                Route::group(['as' => 'admin.',  'middleware' => ['admin']], function () {
                    Route::resource('favorite', 'FavoriteController');
                    Route::get('parametre', 'SettingsController@index')->name('parametre.index');
                });
            });

            Route::group(['prefix' => 'blogueur',], function () {

                Route::group(['as' => 'blogger.', 'middleware' => ['blogger']], function () {
                    Route::resource('favorite', 'FavoriteController');
                    Route::get('parametre', 'SettingsController@index')->name('parametre.index');
                });
            });
        });
    });

    Route::group(['as' => 'admin.', 'prefix' => 'administrateur', 'namespace' => 'App', 'middleware' => ['auth', 'admin']], function () {

        Route::group(['namespace' => 'Admin'], function () {

            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('tags', 'TagController');
            Route::resource('categories', 'CategoryController');
            Route::resource('posts', 'PostController');
            Route::get('posts/{post}/authorized', 'PostController@authorized')->name('posts.authorized');
            Route::get('pending/posts', 'PostController@pending')->name('posts.pending');
            Route::get('unpublished/posts', 'PostController@unpublished')->name('posts.unpublished');
            Route::get('posts/{post}/published', 'PostController@published')->name('posts.published');
            Route::resource('abonnements', 'SubscriberController');
            Route::get('blogueurs', 'DashboardController@list_bloggeurs')->name('show.blogueurs');
            Route::delete('blogueurs/{blogueur}', 'DashboardController@destroyBlogueur')->name('delete.blogueur');
        });

        Route::group(['namespace' => 'Frontend'], function () {

            Route::get('messages', 'MessageController@index')->name('messages.index');
            Route::delete('messages/{message}', 'MessageController@destroy')->name('messages.delete');

            Route::get('commentaires', 'CommentaireController@index')->name('commentaires.index');
            Route::delete('commentaires/{commentaire}', 'CommentaireController@destroy')->name('commentaires.delete');
        });
    });

    Route::group(['as' => 'blogger.', 'prefix' => 'blogueur', 'namespace' => 'App', 'middleware' => ['auth', 'blogger']], function () {

        Route::group(['namespace' => 'Blogger'], function () {

            Route::get('dashboard', 'DashboardController@index')->name('dashboard');
            Route::resource('posts', 'PostController');
            Route::get('pending/posts', 'PostController@pending')->name('posts.pending');
            Route::get('unpublished/posts', 'PostController@unpublished')->name('posts.unpublished');
            Route::get('posts/{post}/published', 'PostController@published')->name('posts.published');
            Route::get('posts/{post}/notified', 'PostController@notified')->name('posts.notified');
        });

        Route::group(['namespace' => 'Frontend'], function () {

            Route::get('messages', 'MessageController@index')->name('messages.index');
            Route::delete('messages/{message}', 'MessageController@destroy')->name('messages.delete');

            Route::get('commentaires', 'CommentaireController@index')->name('commentaires.index');
            Route::delete('commentaires/{commentaire}', 'CommentaireController@destroy')->name('commentaires.delete');
        });
    });
});


