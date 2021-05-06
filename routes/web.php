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
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\RattingsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FooterLinksController;
use App\Http\Controllers\ShowSinglesController;

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
Route::get('/blog', [BlogsController::class, 'listpost'])->name('blog');
Route::get('/games', function () {return view('frontend.games');})->name('games');
Route::get('/price', function () {return view('frontend.pricing');})->name('price');
Route::get('/elements', function () {return view('frontend.elements');})->name('elements');

// Route::get('/home#');

//user
Route::get('/admin/users', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::post('/admin/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::post('/admin/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::post('/admin/user/{id}/updatepw', [UserController::class, 'updatepw'])->name('user.updatepw');
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/admin/user/{id}/editpw', [UserController::class, 'editpw'])->name('user.editpw');

//author
Route::get('/admin/authors', [AuthorsController::class, 'index'])->name('author.index');
Route::get('/admin/author/create', [AuthorsController::class, 'create'])->name('author.create');
Route::post('/admin/author/store', [AuthorsController::class, 'store'])->name('author.store');
Route::post('/admin/author/{id}/destroy', [AuthorsController::class, 'destroy'])->name('author.destroy');
Route::post('/admin/author/{id}/update', [AuthorsController::class, 'update'])->name('author.update');
Route::get('/admin/author/{id}/edit', [AuthorsController::class, 'edit'])->name('author.edit');

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
Route::get('/about/{id}/show', [ShowSinglesController::class, 'showAbout'])->name('about.show');

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

//contact infor
Route::get('/admin/contact_infor', [ContactController::class, 'index'])->name('contact_infor.index');
Route::post('/admin/contact_infor/update', [ContactController::class, 'update'])->name('contact_infor.update');

//faq
Route::get('/admin/faqs', [FaqsController::class, 'index'])->name('faq.index');
Route::get('/admin/faq/create', [FaqsController::class, 'create'])->name('faq.create');
Route::post('/admin/faq/store', [FaqsController::class, 'store'])->name('faq.store');
Route::post('/admin/faq/{id}/destroy', [FaqsController::class, 'destroy'])->name('faq.destroy');
Route::post('/admin/faq/{id}/update', [FaqsController::class, 'update'])->name('faq.update');
Route::get('/admin/faq/{id}/edit', [FaqsController::class, 'edit'])->name('faq.edit');

//footer_link
Route::get('/admin/footer_links', [FooterLinksController::class, 'index'])->name('footer_link.index');
Route::get('/admin/footer_link/create', [FooterLinksController::class, 'create'])->name('footer_link.create');
Route::post('/admin/footer_link/store', [FooterLinksController::class, 'store'])->name('footer_link.store');
Route::post('/admin/footer_link/{id}/destroy', [FooterLinksController::class, 'destroy'])->name('footer_link.destroy');
Route::post('/admin/footer_link/{id}/update', [FooterLinksController::class, 'update'])->name('footer_link.update');
Route::get('/admin/footer_link/{id}/edit', [FooterLinksController::class, 'edit'])->name('footer_link.edit');

//customer
Route::get('/admin/customers', [CustomersController::class, 'index'])->name('customer.index');
Route::get('/admin/customer/create', [CustomersController::class, 'create'])->name('customer.create');
Route::post('/admin/fcustomerstore', [CustomersController::class, 'store'])->name('customer.store');
Route::post('/admin/customer/{id}/destroy', [CustomersController::class, 'destroy'])->name('customer.destroy');
Route::post('/admin/customer/{id}/update', [CustomersController::class, 'update'])->name('customer.update');
Route::get('/admin/customer/{id}/edit', [CustomersController::class, 'edit'])->name('customer.edit');

//ratting
Route::get('/admin/rattings', [RattingsController::class, 'index'])->name('ratting.index');
Route::get('/admin/ratting/create', [RattingsController::class, 'create'])->name('ratting.create');
Route::post('/admin/ratting/store', [RattingsController::class, 'store'])->name('ratting.store');
Route::post('/admin/ratting/{id}/destroy', [RattingsController::class, 'destroy'])->name('ratting.destroy');
Route::post('/admin/ratting/{id}/update', [RattingsController::class, 'update'])->name('ratting.update');
Route::get('/admin/ratting/{id}/edit', [RattingsController::class, 'edit'])->name('ratting.edit');

//package
Route::get('/admin/packages', [PackagesController::class, 'index'])->name('package.index');
Route::get('/admin/package/create', [PackagesController::class, 'create'])->name('package.create');
Route::post('/admin/package/store', [PackagesController::class, 'store'])->name('package.store');
Route::post('/admin/package/{id}/destroy', [PackagesController::class, 'destroy'])->name('package.destroy');
Route::post('/admin/package/{id}/update', [PackagesController::class, 'update'])->name('package.update');
Route::get('/admin/package/{id}/edit', [PackagesController::class, 'edit'])->name('package.edit');

//banner
Route::get('/admin/banners', [BannerController::class, 'index'])->name('banner.index');
Route::get('/admin/banner/create', [BannerController::class, 'create'])->name('banner.create');
Route::post('/admin/banner/store', [BannerController::class, 'store'])->name('banner.store');
Route::post('/admin/banner/{id}/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
Route::post('/admin/banner/{id}/update', [BannerController::class, 'update'])->name('banner.update');
Route::get('/admin/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');

//post
Route::get('/admin/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/admin/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/admin/post/store', [PostController::class, 'store'])->name('post.store');
Route::post('/admin/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::post('/admin/post/{id}/update', [PostController::class, 'update'])->name('post.update');
Route::get('/admin/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::get('/post/{id}/show', [ShowSinglesController::class, 'showPost'])->name('post.show');

//search post
Route::get('/admin/post/search', [PostController::class, 'search'])->name('search');

//form seed mail 
Route::get('/form', function () {
    return view('form');
});
Route::post('/form/send', [FrontController::class, 'addFeedback'])->name('seendmail');

Route::get('formemail', [EmailController::class, 'sendEmail']);

Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::post('/sendmessage', [ContactController::class, 'sendEmailContact'])->name('contact.send');

Route::post('/sendemail', [CustomersController::class, 'storeCustomer'])->name('sendemail');


