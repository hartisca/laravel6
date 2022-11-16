<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PlaceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
require __DIR__.'/auth.php';
Auth::routes();
 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    $request->session()->flash('info', $message);
    return view('welcome');
 });
 
Auth::routes();

Route::get('mail/test', [MailController::class, 'test']);

<<<<<<< HEAD
Route::get('mail/test', [MailController::class, 'test']);

Route::resource('files', FileController::class);
=======
Route::get('/email/verify', function () {

    return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    
 Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');
  
 Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::resource('files', FileController::class); 
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59

//Route::resource('files', FileController::class)->middleware(['auth', 'role.any:1,2,3']);

Route::resource('posts',PostsController::class);
<<<<<<< HEAD
=======

Route::resource('places',PlaceController::class);

>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
