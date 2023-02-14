<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTarefa;
use App\Http\Requests\EditTarefa;
use App\Repositories\TarefasRepository;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    protected $tarefasRepository;

    public function __construct(TarefasRepository $tarefasRepository)
    {
        $this->tarefasRepository = $tarefasRepository;
    }

    public function index()
    {
        $data = $this->tarefasRepository->getAll();
        $semana = $this->tarefasRepository->getSemanaAtual();
        return view('tarefas-geral', compact('data', 'semana'));
    }

    public function create(Request $request)
    {
        return view('tarefas-criar');
    }

    public function store(AddTarefa $request)
    {
        $created = $this->tarefasRepository->store($request->validated());
        if (empty($created)) {
            return redirect()->back();
        }
        return redirect()->route('tarefa.index');
    }

    public function edit(Request $request, $id)
    {
        $tarefas = $this->tarefasRepository->getTarefaById($id);
        return view('tarefas-editar', compact('tarefas'));
    }

    public function update(EditTarefa $request, $id)
    {
        $data = $request->validated(); //dados para atualizar a tarefa 
        $tarefas = $this->tarefasRepository->updateById($data, $id);
        return redirect()->route('tarefa.index');
    }

    public function delete(Request $request, $id)
    {
        $tarefas = $this->tarefasGeral->deleteById($id);
        return redirect()->route('tarefa.index');
    }

    public function allTask(Request $request)
    {
        $search = $request->input('search');
        $data = $this->tarefasRepository->getAllTarefas($search);

        return view('todas-tarefas', compact('data', 'search'));
    }

    public function allTaskEdit(Request $request, $id)
    {
        $tarefas = $this->tarefasGeral->getTarefaById($id);
        return view('todas-tarefas-editar', compact('tarefas'));
    }

    public function allTaskDelete(Request $request, $id)
    {
        $tarefas = $this->tarefasGeral->deleteById($id);
        return redirect()->route('tarefa.allTask');
    }
}
