<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


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

//Route::get('/', function () {
//   return view('welcome');
//});




Route::get('/', [ContactController::class , 'index'])->name('contact.index');
//Route::get('/session', [SessionController::class, 'getSes'])->name('session');
//Route::post('/session', [SessionController::class, 'postSes'])->name('contactsession');
Route::post('/confirm', [ContactController::class , 'confirm'])->name('contact.confirm');
Route::post('/create', [ContactController::class, 'store'])->name('contact.create');
Route::post('/thanks', [ContactController::class , 'thanks'])->name('contact.thanks');
Route::get('/search', [ContactController::class , 'management_system'])->name('contact.search');
Route::post('/delete', [ContactController::class, 'destroy'])->name('contact.delete');