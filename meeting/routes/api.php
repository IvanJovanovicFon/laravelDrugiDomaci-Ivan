<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ProfessorMeetingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMeetingController;
use App\Http\Controllers\UserMeetingsController;
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

Route::resource('meetings', MeetingController::class);
Route::resource('users', UserController::class);
Route::resource('professors', ProfessorController::class);



// Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/meetings', [UserMeetingController::class, 'index'])
->name('users.meetings.index');
Route::get('/professors/{id}/meetings', [ProfessorMeetingController::class, 'index'])
->name('professors.meetings.index');
//Route::get('professors.meetings', ProfessorMeetingController::class)->only(['index']);
