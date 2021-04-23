<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {return view('welcome');});
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

//fontend
Route::get('/', function () {return view('frontend.index');});
Route::get('/home', function () {return view('frontend.index');})->name('home');
Route::get('/about', function () {return view('frontend.about');})->name('about');
Route::get('/gallery', function () {return view('frontend.gallery');})->name('gallery');
Route::get('/contact', function () {return view('frontend.contact');})->name('contact');
Route::get('/blog', function () {return view('frontend.blog');})->name('blog');
Route::get('/single-blog', function () {return view('frontend.single_blog');})->name('single-blog');
Route::get('/games', function () {return view('frontend.games');})->name('games');
Route::get('/price', function () {return view('frontend.pricing');})->name('price');
Route::get('/elements', function () {return view('frontend.elements');})->name('elements');

//user
Route::get('/admin/users', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/admin/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/admin/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

//game
Route::get('/admin/games', [GameController::class, 'index'])->name('game.index');
Route::get('/admin/game/create', [GameController::class, 'create'])->name('game.create');
Route::post('/admin/game/store', [GameController::class, 'store'])->name('game.store');
Route::post('/admin/game/{id}/destroy', [GameController::class, 'destroy'])->name('game.destroy');
Route::post('/admin/game/{id}/update', [GameController::class, 'update'])->name('game.update');
Route::get('/admin/game/{id}/edit', [GameController::class, 'edit'])->name('game.edit');

//about_us
Route::get('/admin/about-us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/admin/about-us/create', [AboutUsController::class, 'create'])->name('about_us.create');
Route::post('/admin/about-us/store', [AboutUsController::class, 'store'])->name('about_us.store');
Route::post('/admin/about-us/{id}/destroy', [AboutUsController::class, 'destroy'])->name('about_us.destroy');
Route::post('/admin/about-us/{id}/update', [AboutUsController::class, 'update'])->name('about_us.update');
Route::get('/admin/about-us/{id}/edit', [AboutUsController::class, 'edit'])->name('about_us.edit');

//gallery
Route::get('/admin/galleries', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
Route::post('/admin/gallery/{id}/destroy', [GalleryController::class, 'destroy'])->name('gallery.destroy');

//category
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/admin/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/admin/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');

//post
Route::get('/admin/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/admin/post/store', [PostController::class, 'store'])->name('post.store');
Route::post('/admin/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('/admin/post/{id}/update', [PostController::class, 'update'])->name('post.update');
Route::get('/admin/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');