<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
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




Route::get('/', [CandidateController::class, 'index'])->name('form');
Route::post('/search', [CandidateController::class, 'search'])->name('search');
Route::post('/pay', [CandidateController::class, 'pay'])->name('pay');


Route::get('/payment/pdf/{id}', [CandidateController::class, 'generatePDF'])->name('payment.pdf');
Route::get('/allotment-letter/{id}', [CandidateController::class, 'generateAllotmentLetter'])->name('allotment.letter');
