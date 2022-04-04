<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\MemberController;
use App\Models\Member;
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

Route::get('/', function () {
    $membres = Member::all();
    return view('welcome', compact('membres'));
});

Route::resource('genders', GenderController::class);
Route::resource('members', MemberController::class);
Route::get('/member/download/{id}', [MemberController::class, 'download']);
