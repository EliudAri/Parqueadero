<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    Route::match(['get'], 'propietarios', [propietarios::class, 'index'])->name('propietarios.consultar');
        Route::get('propietarios/registrar', [propietarios::class, 'create'])->name('propietarios.registrar');
        Route::post('propietarios', [propietarios::class, 'store']);
        Route::get('propietarios/editar/{ficha}', [propietarios::class, 'edit'])->name('propietarios.editar');
        Route::put('propietarios/{ficha}', [propietarios::class, 'update'])->name('propietarios.update');
        Route::delete('propietarios/{ficha}', [propietarios::class, 'destroy'])->name('propietarios.destroy');
        Route::get('propietarios/{ficha}', [propietarios::class, 'show'])->name('propietarios.show');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
