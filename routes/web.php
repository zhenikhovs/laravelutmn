<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
    return redirect('/vacancies');
});

Route::get('/resumes', [IndexController::class, 'GetResumes']);
Route::get('/resume/{id}', [IndexController::class, 'GetResume']);

Route::get('/task2', [IndexController::class, 'Task2']);
Route::get('/task2/peoplestage/', [IndexController::class, 'GetPeopleWithStage']);
Route::get('/task2/programmers/', [IndexController::class, 'GetProgrammers']);
Route::get('/task2/count/', [IndexController::class, 'GetResumeCount']);
Route::get('/task2/resumestaff/', [IndexController::class, 'GetResumeStaff']);

Route::get('/vacancies', [IndexController::class, 'GetVacancies']);

Route::get('/staff/', [IndexController::class, 'GetStaff']);
Route::get('/staff/{staffname}', [IndexController::class, 'GetStaffResumes']);



