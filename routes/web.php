<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicacionController;
use App\Livewire\Vista;
use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


use function Laravel\Prompts\alert;

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

    $publicaciones = Publicacion::all();

    return view('publicaciones.index',[
        'publicaciones' => $publicaciones,
    ]);
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->user();

    $usuarioExiste = User::where('google_id', $user_google->id)->first();

    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => ($usuarioExiste && !empty($usuarioExiste->name)) ? $usuarioExiste->name : generarNumeroAleatorio(),
        'email' => $user_google->email,
    ]);

    Auth::login($user);

    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('user/{name}', [ProfileController::class, 'show']);

Route::resource('publicacion', PublicacionController::class);

Route::get('/comentarios/create/{comentable}/{tipo}/{publicacion}', [ComentarioController::class, 'create'])
->name('hacer_comentario');

Route::post('/comentarios/store/{comentable}/{tipo}/{publicacion}', [ComentarioController::class, 'store'])
->name('guardar_comentario');

Route::get('/comentarios/edit/{comentario}/{publicacion}', [ComentarioController::class, 'edit'])
->name('editar_comentario');

Route::post('/comentarios/{comentario}/{publicacion}', [ComentarioController::class, 'update'])
->name('actualizar_comentario');

Route::delete('/comentarios/{comentario}/{publicacion}', [ComentarioController::class, 'destroy'])
->name('borrar_comentario');

Route::get('/menear/{publicacion}', function(Publicacion $publicacion){
    $user = Auth::user();
    if(!$publicacion->meneos->find($user)){
        $publicacion->meneos()->attach($user->id);
        return redirect()->route('publicacion.index');
    } else{
        return redirect()->route('publicacion.index');
    }

})
    ->middleware('auth')
    ->name('menear');

Route::get('/vista', Vista::class);

require __DIR__.'/auth.php';
