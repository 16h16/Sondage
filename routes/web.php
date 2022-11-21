<?php

use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\SurveysController;
use App\Http\Controllers\HomeController;
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

// HOME
route::get('/home', [HomeController::class, 'index'])->name('home');
route::get('/', [HomeController::class, 'index'])->name('home');
route::get('/vote/{message?}/{color?}', [HomeController::class, 'index'])->name('vote');
route::get('/reset-passwords', [HomeController::class, 'passwordReset'])->name('reset.passwords');
route::get('/surveys-search', [HomeController::class, 'search'])->name('home.search');

// SURVEYS
route::get('/surveys/{message?}/{color?}', [SurveysController::class, 'index'])->name('survey.index');
route::post('/survey-store', [SurveysController::class, 'store'])->name('survey.store');
route::get('/survey-delete/{survey}', [SurveysController::class,'destroy'])->name('survey.delete');

// RESPONSES
route::post('/responses-new', [ResponsesController::class, 'store'])->name('response.store');
route::post('/responses-vote', [ResponsesController::class, 'vote'])->name('response.vote');







