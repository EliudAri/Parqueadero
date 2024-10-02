<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropietariosController;
use App\Http\Controllers\HomeController;

// Ruta principal redirige a /home cuando el usuario está autenticado
Route::get('/', function () {
    return redirect()->route('home');
});

// Protege todas las rutas, incluida la principal y las de propietarios
Route::middleware(['auth'])->group(function () {
    
    // Ruta para mostrar la página de bienvenida solo a usuarios logueados
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    // Rutas relacionadas con propietarios
    Route::prefix('propietarios')->name('propietarios.')->group(function () {
        Route::get('/', [PropietariosController::class, 'index'])->name('consultar');
        Route::get('/registrar', [PropietariosController::class, 'create'])->name('registrar');
        Route::post('/', [PropietariosController::class, 'store']);
        Route::get('/editar/{ficha}', [PropietariosController::class, 'edit'])->name('editar');
        Route::put('/{ficha}', [PropietariosController::class, 'update'])->name('update');
        Route::delete('/{ficha}', [PropietariosController::class, 'destroy'])->name('destroy');
        Route::get('/{ficha}', [PropietariosController::class, 'show'])->name('show');
    });

    // Ruta protegida para el panel de usuario autenticado
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Rutas de autenticación generadas por Laravel
Auth::routes();
