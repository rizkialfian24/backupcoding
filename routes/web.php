<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VidioController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubjudulController;
use App\Http\Controllers\DeskripsiController;


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
    return view('home');
});


// route::get('/login', function () {
//     return view('login.index');
// });

// route::get('/register', function () {
//     return view('register.index');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'aktif' => 'dashboard'
    ]);
})->middleware('auth');

// Route::get('/class', function(){
//     return view('kelas');
// });

Route::get('/subquery', [DeskripsiController::class,'subquery'])->name('subquery');

Route::get('/dashboard/posts/course/{subjudul:sub}', [SubjudulController::class,'show'])->middleware('auth');
Route::resource('/dashboard/posts/sub', SubjudulController::class)->middleware('auth');
Route::get('/dashboard/posts/{deskripsi:slug}', [DeskripsiController::class,'show'])->middleware('auth');
Route::resource('/dashboard/posts', DeskripsiController::class)->middleware('auth');
Route::get('/class', [ClassController::class,'index']);
Route::get('/class/{deskripsi:slug}', [ClassController::class,'show']);
Route::resource('/dashboard/posts/course/vidio', VidioController::class)->middleware('auth');
Route::post('/payment', [PaymentController::class,'payment']);
