<?php

use Illuminate\Support\Facades\Route;

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



$tarefas = App\Http\Controllers\TarefasController::class;

$homepage = App\Http\Controllers\HomePageController::class;

Route::get('/', [$homepage, 'index'])->name('home.index');

Route::get('/tarefas', [$tarefas, 'index'])->name('tarefa.index');

Route::get('/tarefas-criar/', [$tarefas, 'create'])->name('tarefa.create');

Route::post('/tarefas-salvar/', [$tarefas, 'store'])->name('tarefa.store');

Route::get('/tarefas-editar/{id}', [$tarefas, 'edit'])->name('tarefa.edit');

Route::put('/tarefas-alterar/{id}', [$tarefas, 'update'])->name('tarefa.save');

Route::get('/tarefa-delete/{$id}', [$tarefas, 'delete'])->name('tarefa.delete');