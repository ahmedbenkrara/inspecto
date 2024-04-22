<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\GenerationController;
use App\Http\Controllers\MotorisationController;
use App\Http\Controllers\PriceRangeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\SearchBudgetController;
use App\Http\Controllers\ProblemTypeController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\DataController;

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
    return view('client.home');
});

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'sendMail']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/search', [SearchBudgetController::class, 'index']);
Route::get('/diagnostics', function(){
    return view('client.diagnostic');
});
Route::post('/newsletter', [NewsLetterController::class, 'store']);
Route::get('/data', [DataController::class, 'uploadForm']);
Route::post('/data', [DataController::class, 'processExcel'])->name('process.excel');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/newsletter', [NewsLetterController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //clients
    Route::get('/clients', [ClientController::class, 'index']);
    //brands
    Route::get('/brands', [MarkController::class, 'index']);
    Route::get('/brands/create', [MarkController::class, 'create']);
    Route::post('/brands/create', [MarkController::class, 'store']);
    Route::get('/brands/edit/{id}', [MarkController::class, 'edit']);
    Route::put('/brands/edit/{id}', [MarkController::class, 'update'])->name('brands.update');
    Route::delete('/brands/delete/{id}', [MarkController::class, 'destroy'])->name('brands.delete');
    //modele
    Route::get('/modeles', [ModeleController::class, 'index']);
    Route::get('/modeles/create', [ModeleController::class, 'create']);
    Route::post('/modeles/create', [ModeleController::class, 'store']);
    Route::get('/modeles/edit/{id}', [ModeleController::class, 'edit']);
    Route::put('/modeles/edit/{id}', [ModeleController::class, 'update'])->name('modeles.update');
    Route::delete('/modeles/delete/{id}', [ModeleController::class, 'destroy'])->name('modeles.delete');
    //generations
    Route::get('/generations', [GenerationController::class, 'index']);
    Route::get('/generations/create', [GenerationController::class, 'create']);
    Route::post('/generations/create', [GenerationController::class, 'store']);
    Route::get('/generations/edit/{id}', [GenerationController::class, 'edit']);
    Route::put('/generations/edit/{id}', [GenerationController::class, 'update'])->name('generations.update');
    Route::delete('/generations/delete/{id}', [GenerationController::class, 'destroy'])->name('generations.delete');
    //motorisation
    Route::get('/motorisations', [MotorisationController::class, 'index']);
    Route::get('/motorisations/create', [MotorisationController::class, 'create']);
    Route::post('/motorisations/create', [MotorisationController::class, 'store']);
    Route::get('/motorisations/edit/{id}', [MotorisationController::class, 'edit']);
    Route::put('/motorisations/edit/{id}', [MotorisationController::class, 'update'])->name('motorisations.update');
    Route::delete('/motorisations/delete/{id}', [MotorisationController::class, 'destroy'])->name('motorisations.delete');
    //pricerange
    Route::get('/pricerange', [PriceRangeController::class, 'index']);
    Route::get('/pricerange/create', [PriceRangeController::class, 'create']);
    Route::post('/pricerange/create', [PriceRangeController::class, 'store']);
    Route::get('/pricerange/edit/{id}', [PriceRangeController::class, 'edit']);
    Route::put('/pricerange/edit/{id}', [PriceRangeController::class, 'update'])->name('pricerange.update');
    Route::delete('/pricerange/delete/{id}', [PriceRangeController::class, 'destroy'])->name('pricerange.delete');
    //Cars
    Route::get('/cars', [CarController::class, 'index']);
    Route::get('/cars/create', [CarController::class, 'create']);
    Route::post('/cars/create', [CarController::class, 'store']);
    Route::get('/cars/edit/{id}', [CarController::class, 'edit']);
    Route::put('/cars/edit/{id}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/delete/{id}', [CarController::class, 'destroy'])->name('cars.delete');
    //custom
    Route::get('/custom', [CustomController::class, 'index']);
    Route::post('/custom', [CustomController::class, 'update'])->name('custom.update');
    Route::post('/social', [CustomController::class, 'social'])->name('custom.social');
    //Problem type
    Route::get('/types', [ProblemTypeController::class, 'index']);
    Route::get('/types/create', [ProblemTypeController::class, 'create']);
    Route::post('/types/create', [ProblemTypeController::class, 'store']);
    Route::get('/types/edit/{id}', [ProblemTypeController::class, 'edit']);
    Route::put('/types/edit/{id}', [ProblemTypeController::class, 'update'])->name('types.update');
    Route::delete('/types/delete/{id}', [ProblemTypeController::class, 'destroy'])->name('types.delete');
    //Problem type
    Route::get('/problems', [ProblemController::class, 'index']);
    Route::get('/problems/create', [ProblemController::class, 'create']);
    Route::post('/problems/create', [ProblemController::class, 'store']);
    Route::get('/problems/edit/{id}', [ProblemController::class, 'edit']);
    Route::put('/problems/edit/{id}', [ProblemController::class, 'update'])->name('problems.update');
    Route::delete('/problems/delete/{id}', [ProblemController::class, 'destroy'])->name('problems.delete');
    //Solution
    Route::get('/solutions', [SolutionController::class, 'index']);
    Route::get('/solutions/create', [SolutionController::class, 'create']);
    Route::post('/solutions/create', [SolutionController::class, 'store']);
    Route::get('/solutions/edit/{id}', [SolutionController::class, 'edit']);
    Route::put('/solutions/edit/{id}', [SolutionController::class, 'update'])->name('solutions.update');
    Route::delete('/solutions/delete/{id}', [SolutionController::class, 'destroy'])->name('solutions.delete');
    //Requests
    Route::get('/requests', [RequestController::class, 'index']);
    Route::get('/requests/export', [RequestController::class, 'downloadExcel']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::group(['middleware' => ['auth']], function(){
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

require __DIR__.'/auth.php';
