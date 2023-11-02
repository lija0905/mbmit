<?php

use Illuminate\Support\Facades\Auth;
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


Route::group(['prefix' => 'admin'], function(){
    Auth::routes();

    Route::post('/logout', [\App\Http\Controllers\UsersController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('publications', 'App\Http\Controllers\PublicationsController');
        Route::resource('projects', 'App\Http\Controllers\ProjectsController');
        Route::resource('researchers', 'App\Http\Controllers\ResearchersController');

        Route::post('/projects/destroyPhoto', [ App\Http\Controllers\ProjectsController::class, 'destroyPhoto'])->name('projects.destroyPhoto');
        Route::post('/student-activities/destroyPhoto', [ App\Http\Controllers\StudentActivitiesController::class, 'destroyPhoto'])->name('student-activities.destroyPhoto');
        Route::post('/disseminations/destroyPhoto', [ App\Http\Controllers\DisseminationsController::class, 'destroyPhoto'])->name('disseminations.destroyPhoto');
        Route::post('/news/destroyPhoto', [ App\Http\Controllers\NewsController::class, 'destroyPhoto'])->name('news.destroyPhoto');

        Route::group(['middleware' => 'is_admin'], function() {
            Route::resource('disseminations', 'App\Http\Controllers\DisseminationsController');
            Route::resource('news', 'App\Http\Controllers\NewsController');
            Route::resource('users', 'App\Http\Controllers\UsersController');
            Route::resource('galleries', 'App\Http\Controllers\GalleryController');
            Route::resource('student-activities', 'App\Http\Controllers\StudentActivitiesController');
            Route::resource('main-slider', 'App\Http\Controllers\MainSliderController');
            Route::resource('welcome-section', 'App\Http\Controllers\WelcomeSectionController');

            Route::delete('/galleryPhoto/destroy', [ App\Http\Controllers\GalleryPhotosController::class, 'destroy'])->name('gallery_photo.destroy');
        });

    });
});


Route::get('/', [ App\Http\Controllers\ContentController::class, 'index'])->name('client.index');
Route::get('/contact', [ App\Http\Controllers\ContentController::class, 'contact'])->name('client.contact');
Route::get('/researchers', [ App\Http\Controllers\ContentController::class, 'researchers'])->name('client.researchers');
Route::get('/publications/{type}', [ App\Http\Controllers\ContentController::class, 'publications'])->name('client.publications');
Route::get('/projects', [ App\Http\Controllers\ContentController::class, 'projects'])->name('client.projects');
Route::get('/disseminations', [ App\Http\Controllers\ContentController::class, 'disseminations'])->name('client.disseminations');
Route::get('/news',[ App\Http\Controllers\ContentController::class, 'news'])->name('client.news');
Route::get('/student-activities', [ App\Http\Controllers\ContentController::class, 'student_activities'])->name('client.student-activities');
Route::get('/gallery/{type}/{id}',  [ App\Http\Controllers\ContentController::class, 'getGallery'])->name('client.get_gallery');
Route::get('/galleries', [ App\Http\Controllers\ContentController::class, 'galleries'])->name('client.galleries');
Route::get('/alumni', [ App\Http\Controllers\ContentController::class, 'alumni'])->name('client.alumni');


Route::post('/locale', [ App\Http\Controllers\LocaleController::class, 'setLocale'])->name('locale');
