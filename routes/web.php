<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InspiringController;

use App\Models\Subject;      //////////////////

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
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('firstHome');

Route::get('/w_co', 'App\Http\Controllers\HomeController@index4')->name('wo_co');


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index3'])->name('new');
// Route::get('/admin', 'App\Http\Controllers\PostController@index')->name('new');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::resource('posts', 'App\Http\Controllers\PostController');   ////////要打全名
});


Route::get('/hello-world', function () {

    return view('Hello_world');

});


Route::get('/about_us', function () {

    return view('about_us', ['name' => 'Laravel 6.0 範例']);

});

Route::get('/inspire', 'App\Http\Controllers\InspiringController@inspire');

Route::get('/test', function(){

    return App\Models\Post::all();

});

Route::get('/edit', function(){
    $post = App\Models\Post::find(1);
    $post->content = 'Laravel demo';
    $post->save();
    return $post;

});

Route::get('/add1', function(){

    $post = new App\Models\Post;
     $post->content = 'ABCDEF';
     $post->subject_id = 1;
     $post->user_id = 1;      ///////////
     $post->save();
     return $post;
 });

Route::get('/add2', function(){

    $post = new App\Models\Post;
     $post->content = 'SSSSSS';
     $post->subject_id = 2;
     $post->user_id = 2;   //////////
     $post->save();
     return $post;
 });

 Route::get('/sub1', function(){

    $post = new App\Models\Subject;
     $post->name = 'computer';
     $post->save();
     return $post;

 });

 Route::get('/sub2', function(){

    $post = new App\Models\Subject;
     $post->name = 'network';
     $post->save();
     return $post;

 });

 Route::get('/get1', function(){

    $subject = Subject::find(1);
    $posts = $subject->posts;
    return $posts;

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home');

Route::get('/check', function(){

    var_dump(Auth::check());

});

Route::get('/user', function(){

    echo Auth::user();

});


Route::get('/frontend.men.w_co', [App\Http\Controllers\HomeController::class, 'index4'])->name('frontend.men.w_co');
Route::get('/frontend.women.w_co', [App\Http\Controllers\HomeController::class, 'index5'])->name('frontend.women.w_co');
