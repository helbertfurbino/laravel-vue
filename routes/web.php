<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdutosController::class, 'index'])->name('home');
Route::resource('produtos', ProdutosController::class);
