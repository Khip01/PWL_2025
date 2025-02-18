<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return 'Selamat Datang';
// });

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/world', function () {
    return 'World';
});

// Route::get('/about', function () {
//     return "NIM: 2341720071<br>Nama: Akhmad Aakhif Athallah";
// });

// Route::get('/user/{name?}', function ($name=null) {
//     return 'Nama saya '.$name;
// });

Route::get('/posts/{post}/comments/{comment}', function 
($postId, $commentId) {
 return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

// Route::get('articles/{id}', function ($id) {
//     return "Halaman Artikel dengan ID $id";
// });

Route::get('/user/profile', function () {
    return "Route Naming";
})->name('profile');

Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

Route::redirect('/beranda', 'about');

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Aakhif']);

Route::get('/hello', [WelcomeController::class, 'hello']);

// Menggunakan Konsep Controller

// Route::get('/', [PageController::class, 'index']);
// Route::get('/about', [PageController::class, 'about']);
// Route::get('/articles/{id}', [PageController::class, 'articles']);

// Menggunakan Konsep Single Action Controller

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);