<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Equipment;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentReportController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('equipments', EquipmentController::class);

Route::get('reports', [EquipmentReportController::class, 'index'])
    -> name('reports.index');

Route::get('reports/pdf', [EquipmentReportController::class, 'exportPdf'])
    -> name('reports.pdf');



// BREEZE LOGIN
Route::get('/dashboard', function () {
    $equipments = Equipment::latest() -> get();

    return view('dashboard', compact('equipments'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
