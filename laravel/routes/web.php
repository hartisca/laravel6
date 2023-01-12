<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PlaceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\LanguageController;




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

Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    $request->session()->flash('info', $message);
    return view('welcome');
});

Auth::routes();
require __DIR__.'/email-verify.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('mail/test', [MailController::class, 'test']);

Route::resource('files', FileController::class)
   ->middleware(['auth', 'can:files.*']);
    

Route::resource('posts', PostController::class)
    ->middleware(['auth','can:posts.*']); 
    

Route::resource('places', PlaceController::class)
    ->middleware(['auth','can:places.*']);

Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'language']);

Route::post('/posts/{post}/likes',[App\Http\Controllers\PostController::class,'like'])->name('posts.like');

Route::delete('/posts/{post}/likes',[App\Http\Controllers\PostController::class,'unlike'])->name('posts.unlike');

Route::post('/places/{place}/fav', [App\Http\Controllers\PlaceController::class, 'fav'])->name('places.fav');

Route::delete('/places/{place}/fav', [App\Http\Controllers\PlaceController::class, 'unfav'])->name('places.unfav');

Route::get('/aboutus', [App\Http\Controllers\AboutusController::class, 'aboutus']);