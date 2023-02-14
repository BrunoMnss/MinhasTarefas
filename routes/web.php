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




$homepage = App\Http\Controllers\HomePageController::class;


Route::get('/', [$homepage, 'index'])->name('home.index');

Route::get('/homepage-edit/{id}', [$homepage, 'edit'])->name('homepage.edit');

Route::put('/homepage-alter/{id}', [$homepage, 'update'])->name('homepage.save');

Route::get('/homepage-del/{id}', [$homepage, 'delete'])->name('homepage.del');


$tarefas = App\Http\Controllers\TarefasController::class;

Route::get('/tarefas', [$tarefas, 'index'])->name('tarefa.index');

Route::get('/tarefas-criar/', [$tarefas, 'create'])->name('tarefa.create');

Route::post('/tarefas-salvar/', [$tarefas, 'store'])->name('tarefa.store');

Route::get('/tarefas-editar/{id}', [$tarefas, 'edit'])->name('tarefa.edit');

Route::put('/tarefas-alterar/{id}', [$tarefas, 'update'])->name('tarefa.save');

Route::get('/tarefas-delete/{id}', [$tarefas, 'delete'])->name('tarefa.delete');

// Todas Tarefas Page

Route::get('/todas-tarefas', [$tarefas, 'allTask'])->name('tarefa.allTask');

Route::get('/todas-tarefas-edit/{id}', [$tarefas, 'allTaskEdit'])->name('tarefa.allTaskEdit');

Route::get('/todas-tarefas-delete/{id}', [$tarefas, 'allTaskDelete'])->name('tarefa.allTaskDelete');

Route::get('/todas-tarefas-pesquisa', [$tarefas, 'allTaskSearch'])->name('tarefa.allTaskSearch');


