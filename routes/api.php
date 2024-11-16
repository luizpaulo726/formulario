<?php

use App\Http\Controllers\Api\v1\FormularioController;
use Illuminate\Support\Facades\Route;


Route::post('/formularios/{id_formulario}/form-preenchimentos', [FormularioController::class, 'store']);
Route::get('/formularios/{id_formulario}/form-preenchimentos', [FormularioController::class, 'show']);
Route::get('/formularios', [FormularioController::class, 'teste']);
