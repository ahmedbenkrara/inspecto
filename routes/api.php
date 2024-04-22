<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchBudgetController;
use App\Http\Controllers\DiagnosticController;

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

Route::get('/getbrands', [SearchBudgetController::class, 'brands']);
Route::get('/getprices', [SearchBudgetController::class, 'prices']);
Route::get('/getCars', [SearchBudgetController::class, 'cars']);

Route::get('/getModeles', [DiagnosticController::class, 'modeles']);
Route::get('/getMotorisations', [DiagnosticController::class, 'motorisations']);
Route::get('/getGenerations', [DiagnosticController::class, 'generations']);
Route::get('/getProblemTypes', [DiagnosticController::class, 'problemTypes']);
Route::get('/getProblems', [DiagnosticController::class, 'problems']);
Route::get('/getSolutions', [DiagnosticController::class, 'solutions']);
Route::post('/sendRequest', [DiagnosticController::class, 'submitDiagnostics']);