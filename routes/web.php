<?php

use App\Http\Controllers\OnlineUserController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Route::get('/exit/{code}', [OnlineUserController::class, 'newExitUser']);

Route::get('/', [OnlineUserController::class, 'index']);

Route::get('/page1', [OnlineUserController::class, 'page1'])->name('page-1');

Route::get('/page2', [OnlineUserController::class, 'page2'])->name('page-2');

Route::get('/page3', [OnlineUserController::class, 'page3'])->name('page-3');

Route::get('/page4', [OnlineUserController::class, 'page4'])->name('page-4');

Route::get('/page5', [OnlineUserController::class, 'page5'])->name('page-5');

Route::get('/page6', [OnlineUserController::class, 'page6'])->name('page-6');

Route::get('/page7', [OnlineUserController::class, 'page7'])->name('page-7');

Route::get('/page8', [OnlineUserController::class, 'page8'])->name('page-8');

Route::get('/page9', [OnlineUserController::class, 'page9'])->name('page-9');

Route::get('/page10', [OnlineUserController::class, 'page10'])->name('page-10');

Route::get('/page11', [OnlineUserController::class, 'page11'])->name('page-11');

// full page --------------------------------------------------------------------------
Route::get('/fpage1', function () {
    return view('zoom.page1')->with(['page' => 1, 'prevPageNum' => null, 'nextPageNum' => 2]);
})->name('f-page-1');

Route::get('/fpage2', function () {
    return view('zoom.page2')->with(['page' => 2, 'prevPageNum' => 1, 'nextPageNum' => 3]);
})->name('f-page-2');

Route::get('/fpage3', function () {
    return view('zoom.page3')->with(['page' => 3, 'prevPageNum' => 2, 'nextPageNum' => 4]);
})->name('f-page-3');

Route::get('/fpage4', function () {
    return view('zoom.page4')->with(['page' => 4, 'prevPageNum' => 3, 'nextPageNum' => 5]);
})->name('f-page-4');

Route::get('/fpage5', function () {
    return view('zoom.page5')->with(['page' => 5, 'prevPageNum' => 4, 'nextPageNum' => 6]);
})->name('f-page-5');

Route::get('/fpage6', function () {
    return view('zoom.page6')->with(['page' => 6, 'prevPageNum' => 5, 'nextPageNum' => 7]);
})->name('f-page-6');

Route::get('/fpage7', function () {
    return view('zoom.page7')->with(['page' => 7, 'prevPageNum' => 6, 'nextPageNum' => 8]);
})->name('f-page-7');

Route::get('/fpage8', function () {
    return view('zoom.page8')->with(['page' => 8, 'prevPageNum' => 7, 'nextPageNum' => 9]);
})->name('f-page-8');

Route::get('/fpage9', function () {
    return view('zoom.page9')->with(['page' => 9, 'prevPageNum' => 8, 'nextPageNum' => 10]);
})->name('f-page-9');

Route::get('/fpage10', function () {
    return view('zoom.page10')->with(['page' => 10, 'prevPageNum' => 9, 'nextPageNum' => 11]);
})->name('f-page-10');

Route::get('/fpage11', function () {
    return view('zoom.page11')->with(['page' => 11, 'prevPageNum' => 10, 'nextPageNum' => null]);
})->name('f-page-11');