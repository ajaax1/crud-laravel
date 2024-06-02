<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
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
    return view('index');
})->name('home');
Route::post('/produto', [ProdutoController::class, 'store']);
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');
Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

Route::post('/fornecedor', [FornecedorController::class, 'store']);
Route::get('/fornecedor/{id}', [FornecedorController::class, 'show'])->name('fornecedor.show');
Route::put('/fornecedor/{id}', [FornecedorController::class, 'update'])->name('fornecedor.update');
Route::delete('/fornecedor/{id}', [FornecedorController::class, 'destroy'])->name('fornecedor.destroy');
