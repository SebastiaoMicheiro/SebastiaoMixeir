<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FeriasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('sair', function(){
        Auth::logout();
        return view('auth.login');
})->name('sair');
    
Route::group(['middleware'=>'auth'],function () {
    Route::get('/', function () {
        return view('page.inicio');
    });
    
    Route::get('user',[UserController::class,'index'])->name('usuario.index');
    Route::post('user',[UserController::class,'store'])->name('user.store');
    Route::get('apagar/{id}',[UserController::class,'apagar'])->name('user.apagar');
    //Route para o funcionario
    Route::get('funcionario',[FuncionarioController::class,'index'])->name('funcionario');
    Route::post('funcionario',[FuncionarioController::class,'store'])->name('funcionario.store');
    Route::get('apagar/{id}/funcionario',[FuncionarioController::class,'apagar'])->name('funcionario.apagar');
    //Route para ferias
    Route::get('ferias',[FeriasController::class,'index'])->name('ferias');
    Route::post('ferias',[FeriasController::class,'store'])->name('ferias.store');
    Route::get('apagar/{id}/ferias',[FeriasController::class,'apagar'])->name('ferias.apagar');
    Route::get('aprovado/{id}/ferias',[FeriasController::class,'aprovado'])->name('ferias.apagar');
    Route::get('recusado/{id}/ferias',[FeriasController::class,'recusado'])->name('ferias.apagar');
});
    

Auth::routes();

Route::get('/home', function(){
    return redirect('/');
})->name('home');
