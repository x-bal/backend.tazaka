<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [ApiController::class, 'home'])->name('api.home');
Route::get('/about', [ApiController::class, 'about'])->name('api.about');
Route::get('/count', [ApiController::class, 'count'])->name('api.count');
Route::get('/service', [ApiController::class, 'service'])->name('api.service');
Route::get('/client', [ApiController::class, 'client'])->name('api.service');
Route::get('/category', [ApiController::class, 'category'])->name('api.category');
Route::get('/portfolio', [ApiController::class, 'portfolio'])->name('api.portfolio');
Route::get('/team', [ApiController::class, 'team'])->name('api.team');
Route::get('/product', [ApiController::class, 'product'])->name('api.product');
Route::get('/testimonial', [ApiController::class, 'testimonial'])->name('api.testimonial');
Route::get('/contact', [ApiController::class, 'contact'])->name('api.contact');
