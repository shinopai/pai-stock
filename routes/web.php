<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

// root
Route::get('/', [StockController::class, 'index'])->name('stocks.index');

// create form
Route::get('/create', [StockController::class, 'create'])->name('stocks.create');

// add stock
Route::post('/add', [StockController::class, 'add'])->name('stocks.add');

// edit stock form
Route::get('/{stock}/edit', [StockController::class, 'edit'])->name('stocks.edit');

// update stock
Route::patch('/{stock}/update', [StockController::class, 'update'])->name('stocks.update');

// issue management
Route::get('/issue', [StockController::class, 'issueIndex'])->name('stocks.issue.index');

// issue stock
Route::post('/{stock}/issue', [StockController::class, 'issue'])->name('stocks.issue');
