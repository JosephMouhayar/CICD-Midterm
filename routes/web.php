<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

Route::get('/', [Controller::class, 'Welcome']);

Route::post('/Login', [Controller::class, 'signup']);

Route::post('/welcome', [Controller::class, 'WelcomeWithUser']);

Route::post('/Foods', [Controller::class, 'GoToFoods']);

Route::post('/OrderHistory', [Controller::class, 'GoToHistory']);

Route::post('/Food', [Controller::class, 'SingleFood']);

Route::post('/AddReview', [Controller::class, 'AddReview']);

Route::post('/Search', [Controller::class, 'Search']);

Route::post('/MyMenu', [Controller::class, 'MyMenu']);

Route::post('/Create', [Controller::class, 'GoToCreate']);

Route::post('/createfood', [Controller::class, 'create']);

Route::post('/Edit', [Controller::class, 'GoToEdit']);

Route::post('/Orders', [Controller::class, 'OrdersList']);

Route::post('/MyCart', [Controller::class, 'GoToBasket']);


