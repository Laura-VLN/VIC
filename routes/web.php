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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    Route::group(['middleware' => 'firstlogin'],function(){
        Route::get('/logout', 'LogoutController@logout');
        Route::get('/profile','UserController@index');
        Route::get('/job/{page}','JobController@index');
        Route::get('/job/show/{id}','JobController@show');
        Route::get('/logement/{page}','HousingController@index');
        Route::get('/logement/show/{id}','HousingController@show');
        Route::get('/parrain','SponsorController@index');
        Route::get('/coach','CoachController@index');
        Route::get('/formations/{page}','FormationController@index');
        Route::get('/formations/show/{id}','FormationController@show');
        Route::get('/young','CoachController@showyoung');
        Route::get('/profile/upload/{id}','DocumentController@index');
        Route::get('/young/create_agenda/{id}','CoachController@storeAgendaView');
        
        Route::post('/job/{page}','JobController@filter');
        Route::post('/logement/{page}','HousingController@filter');
        Route::post('/formations/{page}','FormationController@filter');
        Route::post('/young','CoachController@addAgenda');
        Route::post('/profile/upload/{id}','DocumentController@store');
        Route::post('/profile/download','DocumentController@get');


        
        Route::group(['middleware' => 'admin'],function(){
            Route::get('/admin','AdminController@index');
            Route::get('/admin/user/create','AdminController@userCreateView');
            Route::get('/admin/user/edit/{id}','AdminController@userEditView');
            Route::get('/admin/user/delete/{id}','AdminController@userDeleteView');
            Route::get('/admin/user/list/{page}','AdminController@user');

            Route::get('/admin/formation/list/{page}','AdminController@formation');
            Route::get('/admin/formation/create','AdminController@formationCreateView');
            Route::get('/admin/formation/edit/{id}','AdminController@formationEditView');
            Route::get('/admin/formation/delete/{id}','AdminController@formationDeleteView');

            Route::get('/admin/job/list/{page}','AdminController@job');
            Route::get('/admin/job/create','AdminController@jobCreateView');
            Route::get('/admin/job/edit/{id}','AdminController@jobEditView');
            Route::get('/admin/job/delete/{id}','AdminController@jobDeleteView');

            Route::get('/admin/logement/list/{page}','AdminController@logement');
            Route::get('/admin/logement/create','AdminController@logementCreateView');
            Route::get('/admin/logement/edit/{id}','AdminController@logementEditView');
            Route::get('/admin/logement/delete/{id}','AdminController@logementDeleteView');

            Route::get('/admin/agenda/list/{page}','AdminController@agenda');
            Route::get('/admin/agenda/create','AdminController@agendaCreateView');

            
            Route::post('/admin/user/create','AdminController@userCreate');
            Route::post('/admin/user/edit/{id}','AdminController@userEdit');
            Route::post('/admin/user/delete/{id}','AdminController@userDelete');

            Route::post('/admin/formation/delete/{id}','AdminController@formationDelete');
            Route::post('/admin/formation/create','AdminController@formationCreate');
            Route::post('/admin/formation/edit/{id}','AdminController@formationEdit');

            Route::post('/admin/job/delete/{id}','AdminController@jobDelete');
            Route::post('/admin/job/create','AdminController@jobCreate');
            Route::post('/admin/job/edit/{id}','AdminController@jobEdit');

            Route::post('/admin/logement/delete/{id}','AdminController@logementDelete');
            Route::post('/admin/logement/create','AdminController@logementCreate');
            Route::post('/admin/logement/edit/{id}','AdminController@logementEdit');
            Route::post('/admin/logement/delimg/{id}','AdminController@logementImage');
        });
    });
});




