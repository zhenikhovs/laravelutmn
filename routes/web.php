<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\VacancyController;


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

Route::get('/resumes', [PersonController::class, 'GetResumes']);
Route::get('/resume/add', [PersonController::class, 'AddResumeForm']);
Route::post('/resume/add', [PersonController::class, 'AddResume']);
Route::get('/resume/{id}', [PersonController::class, 'GetResume']);
Route::delete('/resume/{person}', [PersonController::class, 'DeleteResume'])->name('DeleteResume');
Route::put('/resume/{person}', [PersonController::class, 'UpdateResume'])->name('UpdateResume');
Route::get('/resume/update/{id}', [PersonController::class, 'UpdateResumeForm'])->name('UpdateResumeForm');




Route::get('/resumes/{staffname}', [PersonController::class, 'GetStaffResumes']);


Route::get('/task2', [IndexController::class, 'Task2']);
Route::get('/task2/peoplestage/', [IndexController::class, 'GetPeopleWithStage']);
Route::get('/task2/programmers/', [IndexController::class, 'GetProgrammers']);
Route::get('/task2/count/', [IndexController::class, 'GetResumeCount']);
Route::get('/task2/resumestaff/', [IndexController::class, 'GetResumeStaff']);

Route::get('/vacancies', [VacancyController::class, 'GetVacancies']);

Route::get('/staff/', [StaffController::class, 'GetStaff']);



