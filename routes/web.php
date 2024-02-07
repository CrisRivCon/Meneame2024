<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionController;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('publicacion', PublicacionController::class);

Route::get('/comentarios/create/{comentable}/{tipo}/{publicacion}', [ComentarioController::class, 'create'])
->middleware('auth')
->name('hacer_comentario');

Route::post('/comentarios/store/{comentable}/{tipo}/{publicacion}', [ComentarioController::class, 'store'])
->middleware('auth')
->name('guardar_comentario');

Route::post('/menear/{publicacion}',function(){
/*     $user = Auth::id();
    $->roles()->attach($roleId); */
})
->middleware('auth')
->name('guardar_comentario');

require __DIR__.'/auth.php';
