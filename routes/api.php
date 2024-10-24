<?php

use App\Http\Controllers\MotosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/moto',[MotosController::class,'listar']);
Route::post('/moto',[MotosController::class,'salvar']);
Route::put('/moto/{id}',[MotosController::class,'editar']);
Route::delete('/moto/{id}',[MotosController::class,'excluir']);
Route::get('/moto/{id}',[MotosController::class,'listarPeloId']); 