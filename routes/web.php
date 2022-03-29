<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('home', HomeController::class);
    Route::resource('about', AboutController::class);
    Route::resource('count', CountsController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('client', ClientController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('portfolio', PortfolioController::class);
    Route::resource('team', TeamController::class);
    Route::resource('product', ProductController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('section', SectionController::class);
    Route::resource('sosmed', SosmedController::class);
});

Route::get('/install', function () {
    shell_exec('composer install');
    Artisan::call('key:generate');
    Artisan::call('migrate');
    Artisan::call('db:seed');
    Artisan::call('storage:link');
});
