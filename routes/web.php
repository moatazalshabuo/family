<?php

use App\Http\Controllers\BloodMoneyController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ExcludedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UsersController;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("users",UsersController::class)->middleware("auth");
Route::get("move-users",[UsersController::class,'Move_users'])->name("users.move")->middleware('auth');
Route::controller(ExcludedController::class)->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('excluded','index')->name("excluded.index");
        Route::post('excluded/store','store')->name('excluded.store');
        Route::delete('excluded/delete/{id}',"delete")->name('excluded.delete');
    });
});

Route::resource('box',BoxController::class)->middleware('auth');
Route::get("user/box",[BoxController::class,'control_user'])->name('box.users')->middleware('auth');
Route::post('box/push/{id}',[BoxController::class,'push'])->name('box.push')->middleware('auth');

Route::resource('blood',BloodMoneyController::class)->middleware('auth');
Route::get("user/blood",[BloodMoneyController::class,'control_user'])->name('blood.users')->middleware('auth');
Route::post('blood/push/{id}',[BloodMoneyController::class,'push'])->name('blood.push')->middleware('auth');

Route::resource('meeting',MeetingController::class)->middleware('auth');


Route::get('my/box',[PublicController::class,'box'])->name("user.box")->middleware('auth');
Route::get('my/blood',[PublicController::class,'blood'])->name("user.blood")->middleware('auth');
Route::get('my/meeting',[PublicController::class,'meeting'])->name("user.meeting")->middleware('auth');

Route::get("change_password",[HomeController::class,'change_pass'])->name("change_password")->middleware('auth');
Route::post("save_password",[HomeController::class,'save_password'])->name("save_password")->middleware('auth');
