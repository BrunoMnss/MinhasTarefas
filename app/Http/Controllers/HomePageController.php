<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditTarefa;
use App\Models\HomePage;
use DateTime;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $tarefasGeral;

    public function __construct(HomePage $tarefasGeral)
    {
        $this->tarefasGeral = $tarefasGeral;
    }

    protected function index()
    {
        $data = $this->tarefasGeral->getAll()->toArray();
        $diaAtual = '';
        $newData = [];
        foreach ($data as $key => $tarefa) {
            $formataDia = new DateTime($tarefa['dia']);
            $formataDia = $formataDia->format('d/m/Y');
            if ($diaAtual != $formataDia) {
                $diaAtual = $formataDia;
                $newData[$diaAtual] = [];
                $newData[$diaAtual]['id'] = $tarefa['id'];
                $newData[$diaAtual]['horarios'] = [];
            }
            $dia_nome = new DateTime($tarefa['dia']);
            $dia_nome = $dia_nome->format('l');
            array_push($newData[$diaAtual]['horarios'], ['horario' => $tarefa['horario'], 'feito' => $tarefa['feito'], 'tarefa' => $tarefa['tarefa'], 'id' => $tarefa['id'], 'dia_nome' => $dia_nome]);
        }
        
        return view('welcome1', compact('newData'));
    }   

    public function edit(Request $request, $id)
    {
        $tarefas = $this->tarefasGeral->getTarefaById($id);
        return view('homepage-editar', compact('tarefas'));
    }

    public function update(EditTarefa $request, $id)
    {
        $tarefas = $this->tarefasGeral->updateById($id, $request->validated());
        return redirect()->route('home.index');
    }

    public function delete(Request $request, $id){
        $tarefas=$this->tarefasGeral->deleteById($id);
        return redirect()->route('home.index');
    }

    
}
