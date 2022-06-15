<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ItemsController::class, 'index']);
Route::get('basket', [ItemsController::class, 'basket']);
Route::get('add-to-basket/{id}', [ItemsController::class, 'addToCart']);

Route::patch('update-basket', 'ItemsController@update');
Route::delete('remove-from-basket', 'ItemsController@remove');