<?php

use Illuminate\Support\Facades\Route;
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/books', [BookController::class, 'index']);
    Route::post('/rent-request/{book}', [RentRequestController::class, 'store']);
    Route::post('/return-book/{request}', [RentRequestController::class, 'returnBook']);

    Route::middleware(['admin'])->group(function () {
        Route::resource('admin/books', AdminBookController::class);
        Route::get('admin/rent-requests', [AdminRentController::class, 'index']);
        Route::post('admin/rent-requests/{id}/approve', [AdminRentController::class, 'approve']);
        Route::post('admin/rent-requests/{id}/reject', [AdminRentController::class, 'reject']);
        Route::get('admin/reports', [AdminReportController::class, 'generate']);
    });
});

Route::get('/', function () {
    return view('welcome');
});
