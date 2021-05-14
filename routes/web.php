<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\RattingsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FooterLinksController;
use App\Http\Controllers\OrderController;
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

Auth::routes(['verify' => true]);

//fontend
Route::view('/', 'frontend.index');
Route::view('/home', 'frontend.index')->name('home');
Route::view('/about', 'frontend.about')->name('about');
Route::view('/gallery', 'frontend.gallery')->name('gallery');
Route::view('/contact', 'frontend.contact')->name('contact');
Route::view('/games', 'frontend.games')->name('games');
Route::view('/price', 'frontend.pricing')->name('price');
Route::view('/elements', 'frontend.elements')->name('elements');
Route::get('/blog', [BlogsController::class, 'listpost'])->name('blog');
Route::get('/about/{id}/show', [ShowSinglesController::class, 'showAbout'])->name('about.show');
Route::get('/post/{id}/show', [ShowSinglesController::class, 'showPost'])->name('post.show');

//form seed mail 
Route::post('/sendmessage', [ContactController::class, 'sendEmailContact'])->name('contact.send');
Route::post('/sendemail', [CustomersController::class, 'storeCustomer'])->name('sendemail');

//comment
Route::post('/comment/store', [CommentsController::class, 'store'])->name('comment.store')->middleware('auth');
Route::post('/comment/{id}/update', [CommentsController::class, 'update'])->name('comment.update')->middleware('auth');

//admin 
Route::middleware('auth')->prefix('/admin')->group(function(){


    //user
    Route::name('user.')->group(function(){
        Route::get('/users', [UserController::class, 'index'])->name('index');
        Route::prefix('/user')->group(function(){
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [UserController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [UserController::class, 'update'])->name('update');
            Route::post('/{id}/updatepw', [UserController::class, 'updatepw'])->name('updatepw');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::get('/{id}/editpw', [UserController::class, 'editpw'])->name('editpw');
            Route::get('/{id}/show', [UserController::class, 'show'])->name('show');
        });
    });

    //game
    Route::name('game.')->group(function(){
        Route::get('/games', [GameController::class, 'index'])->name('index');
        Route::prefix('/game')->group(function(){
            Route::get('/create', [GameController::class, 'create'])->name('create');
            Route::post('/store', [GameController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [GameController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [GameController::class, 'update'])->name('update');
            Route::get('/{id}/edit', [GameController::class, 'edit'])->name('edit');
        });
    });

    //order
    Route::name('order.')->group(function(){
        Route::get('/orders', [OrderController::class, 'index'])->name('index');
        Route::prefix('/order')->group(function(){
            Route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/{id}/show', [OrderController::class, 'show'])->name('show');
            Route::post('/{id}/destroy', [OrderController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [OrderController::class, 'update'])->name('update');
        });
    });

    //about_us
    Route::name('about_us.')->group(function(){
        Route::get('/about-us', [AboutUsController::class, 'index'])->name('index');
        Route::prefix('/about-us')->group(function(){
            Route::get('/create', [AboutUsController::class, 'create'])->name('create');
            Route::post('/store', [AboutUsController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [AboutUsController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [AboutUsController::class, 'update'])->name('update');
            Route::post('/{id}/updateStatus', [AboutUsController::class, 'updateStatus'])->name('updateStatus');
            Route::get('/{id}/edit', [AboutUsController::class, 'edit'])->name('edit');
        });
    });
    
    //gallery
    Route::name('gallery.')->group(function(){
        Route::get('/galleries', [GalleryController::class, 'index'])->name('index');
        Route::prefix('/gallery')->group(function(){
            Route::post('/store', [GalleryController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [GalleryController::class, 'destroy'])->name('destroy');
        });
    });
    
    //category
    Route::name('category.')->group(function(){
        Route::get('/categories', [CategoryController::class, 'index'])->name('index');
        Route::prefix('/category')->group(function(){
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [CategoryController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [CategoryController::class, 'update'])->name('update');
            Route::post('/{id}/updateStatus', [CategoryController::class, 'updateStatus'])->name('updateStatus');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        });
    });

    //contact infor
    Route::name('contact_infor.')->group(function(){
        Route::get('/contact_infor', [ContactController::class, 'index'])->name('index');
        Route::post('/contact_infor/update', [ContactController::class, 'update'])->name('update');
    });

    //faq
    Route::name('faq.')->group(function(){
        Route::get('faqs', [FaqsController::class, 'index'])->name('index');
        Route::prefix('/faq')->group(function(){
            Route::get('create', [FaqsController::class, 'create'])->name('create');
            Route::post('store', [FaqsController::class, 'store'])->name('store');
            Route::post('{id}/destroy', [FaqsController::class, 'destroy'])->name('destroy');
            Route::post('{id}/update', [FaqsController::class, 'update'])->name('update');
            Route::post('{id}/updateStatus', [FaqsController::class, 'updateStatus'])->name('updateStatus');
            Route::get('{id}/edit', [FaqsController::class, 'edit'])->name('edit');
        });
    });

    //footer_link
    Route::name('footer_link.')->group(function(){
        Route::get('/footer_links', [FooterLinksController::class, 'index'])->name('index');
        Route::prefix('footer_link')->group(function(){
            Route::get('/create', [FooterLinksController::class, 'create'])->name('create');
            Route::post('/store', [FooterLinksController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [FooterLinksController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [FooterLinksController::class, 'update'])->name('update');
            Route::get('/{id}/edit', [FooterLinksController::class, 'edit'])->name('edit');
        });
    });

    //customer
    Route::name('customer.')->group(function(){
        Route::get('/customers', [CustomersController::class, 'index'])->name('index');
        Route::prefix('/customer')->group(function(){
            Route::get('/create', [CustomersController::class, 'create'])->name('create');
            Route::post('/store', [CustomersController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [CustomersController::class, 'destroy'])->name('destroy');
        });
        
    });

    //ratting
    Route::name('ratting.')->group(function(){
        Route::get('/rattings', [RattingsController::class, 'index'])->name('index');
        Route::prefix('/ratting')->group(function(){
            Route::get('/create', [RattingsController::class, 'create'])->name('create');
            Route::post('/store', [RattingsController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [RattingsController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [RattingsController::class, 'update'])->name('update');
            Route::get('/{id}/edit', [RattingsController::class, 'edit'])->name('edit');
        });
    });

    //package
    Route::name('package.')->group(function(){
        Route::get('/packages', [PackagesController::class, 'index'])->name('index');
        Route::prefix('/package')->group(function(){
            Route::get('/create', [PackagesController::class, 'create'])->name('create');
            Route::post('/store', [PackagesController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [PackagesController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [PackagesController::class, 'update'])->name('update');
            Route::post('/{id}/updateStatus', [PackagesController::class, 'updateStatus'])->name('updateStatus');
            Route::get('/{id}/edit', [PackagesController::class, 'edit'])->name('edit');
        });
    });

    //banner
    Route::name('banner.')->group(function(){
        Route::get('/banners', [BannerController::class, 'index'])->name('index');
        Route::post('/banner/{id}/update', [BannerController::class, 'update'])->name('update');
        Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('edit');

    });

    //post
    Route::name('post.')->group(function(){
        Route::get('/posts', [PostController::class, 'index'])->name('index');
        Route::prefix('/post')->group(function(){
            Route::get('/create', [PostController::class, 'create'])->name('create');
            Route::post('/store', [PostController::class, 'store'])->name('store');
            Route::post('/{id}/destroy', [PostController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/update', [PostController::class, 'update'])->name('update');
            Route::get('/{id}/edit', [PostController::class, 'edit'])->name('edit');
        });
    });
});