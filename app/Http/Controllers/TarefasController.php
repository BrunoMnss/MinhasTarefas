<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTarefa;
use App\Http\Requests\EditTarefa;
use App\Models\TarefasGeral;
use DateTime;
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
            array_push($newData[$diaAtual]['horarios'], ['horario' => $tarefa['horario'], 'tarefa' => $tarefa['tarefa'], 'id' => $tarefa['id'], 'dia_nome' => $dia_nome]);
        }

        $semana = '';
        $firstday = date('d/m/Y', strtotime("this week"));
        $semana .= "[ " . $firstday . "  -  ";
        $lastday = date('d/m/Y', strtotime("sunday +0 week"));
        $semana .= $lastday . " ] ";


        return view('tarefas-geral', compact('newData', 'semana'));
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
        return view('tarefas-editar', compact('tarefas'));
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

    public function allTask()
    {
        $data = $this->tarefasGeral->getAllTarefas();
 
        return view('todas-tarefas', compact('data'));
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

    public function allTaskSearch(Request $request){
        $search = $request->input('search');
        
if(empty($search)){
    $data = $this->tarefasGeral->getAllTarefas();
    return view('todas-tarefas', compact('data'));
}
$data = $this->tarefasGeral->searchTarefa()
->where('dia', 'LIKE', '%'.$request['search'].'%')
->orWhere('horario', 'LIKE', '%'.$request['search'].'%')
->orWhere('tarefa', 'LIKE', '%'.$request['search'].'%')
->orWhere('created_at', 'LIKE', '%'.$request['search'].'%')
->get();

        return view('todas-tarefas', compact('data', 'tarefas'));
    }

}
