<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTarefa;
use App\Http\Requests\EditTarefa;
use App\Models\TarefasGeral;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    protected $tarefasGeral;

    public function __construct(TarefasGeral $tarefasGeral)
    {
        $this->tarefasGeral = $tarefasGeral;
    }

    public function index()
    {

        $data = $this->tarefasGeral->getAll();
    
        $jaTem = '';
        $semana = '';

        $firstday = date('d/m/Y', strtotime("this week"));
        $semana .= "[ " . $firstday . "  -  ";

        $lastday = date('d/m/Y', strtotime("sunday +0 week"));
        $semana .= $lastday . " ] ";

        return view('tarefas-geral', compact('data', 'semana', 'jaTem'));
    }

    public function create(Request $request)
    {
        return view('tarefas-criar');
    }

    public function store(AddTarefa $request)
    {
        $created = $this->tarefasGeral->store($request->validated());
        if (empty($created)) {
            return redirect()->back();
        }
        return redirect()->route('tarefa.index');
    }

    public function edit(Request $request, $id)
    {
        $tarefas = $this->tarefasGeral->getTarefaById($id);
        return view('tarefa-editar', compact('tarefas'));
    }

    public function update(EditTarefa $request, $id)
    {
        $tarefas = $this->tarefasGeral->updateById($id, $request->validated());
        return redirect()->route('tarefa.index');
    }

    public function delete(Request $request, $id)
    {
        $tarefas = $this->tarefasGeral->deleteById($id);
        return redirect()->route('tarefa.index');
    }
}
