<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[MovieController::class,'index'] );

Route::get('/movie/{id}/{slug}',[MovieController::class,'detail_movie'] );

Route::get('/movie/create', [MovieController::class,'create'])->middleware('auth');

Route::post('/movie/store', [MovieController::class,'store']);

Route::get('/login', [AuthController::class,'formLogin'])->name('login');

Route::post('/login', [AuthController::class,'login']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::get('/list', [MovieController::class,'list']);

Route::delete('/movie/{id}', [MovieController::class, 'destroy']);

route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->middleware('auth', RoleAdmin::class);

route::put('/movie/{id}', [MovieController::class, 'update'])->middleware('auth', RoleAdmin::class);
