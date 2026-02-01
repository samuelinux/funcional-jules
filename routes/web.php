<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Usuario\Dashboard::class)->name('usuario.dashboard');
    Route::get('/funcional', \App\Livewire\Usuario\Funcional::class)->name('usuario.funcional');
    Route::get('/documento/funcional', function () {
        $user = auth()->user();

        if (!$user->caminho_funcional || !Storage::disk('local')->exists($user->caminho_funcional)) {
            abort(404);
        }

        return response()->file(Storage::disk('local')->path($user->caminho_funcional), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="funcional.pdf"'
        ]);
    })->name('documento.funcional');
});

Route::middleware(['auth', 'perfil:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
    Route::get('/usuarios', \App\Livewire\Admin\Usuarios::class)->name('usuarios');
});
