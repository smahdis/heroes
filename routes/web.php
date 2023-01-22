<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Voyager;

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
    return redirect('/heroes');
});

Route::get('/heroes', [\App\Http\Controllers\HeroController::class, 'index'])->name('heroes');
Route::get('/weapons', [\App\Http\Controllers\WeaponController::class, 'index'])->name('weapons-index');
Route::post('/hero/damage/{hero_id}/{weapon_id}', [\App\Http\Controllers\HeroController::class, 'getDamage'])->name('get-damage');


Route::group(['prefix' => 'admin'], function () {
    (new TCG\Voyager\Voyager)->routes();
});
