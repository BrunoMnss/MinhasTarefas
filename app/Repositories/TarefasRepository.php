<?php

namespace App\Repositories;

use App\Models\TarefasGeral;
use DateTime;

class TarefasRepository
{
	protected $tarefasGeral;

	public function __construct(TarefasGeral $tarefasGeral)
	{
		$this->tarefasGeral = $tarefasGeral;
	}

	public function getAll()
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
		return $newData;
	}

	public function store(array $data)
	{
		return $this->tarefasGeral->store($data);
	}

	public function getTarefaById($id)
	{
		return $this->tarefasGeral->getTarefaById($id);
	}

	public function updateById($data, $id)
	{
		return $this->tarefasGeral->updateById($data, $id);
	}

	public function editarFeito($feito, $id)
	{
		$atualizaFeito = $this->tarefasGeral->editarFeito($feito, $id);
		if (empty($atualizaFeito)) {
			return 'Não foi possivel atualizar o status';
		}
		return 'Status atualizado';
	}

	public function getSemanaAtual()
	{
		$firstday = date('d/m/Y', strtotime("this week"));
		$lastday = date('d/m/Y', strtotime("sunday +0 week"));
		return "[ " . $firstday . "  -  " . $lastday . " ] ";
	}

	// public function delete(Request $request, $id)
	// {
	// 	$tarefas = $this->tarefasGeral->deleteById($id);
	// 	return redirect()->route('tarefa.index');
	// }
	public function getAllTarefas($search)
	{
		return $this->tarefasGeral->getAllTarefas($search);
	}

	// public function allTaskEdit(Request $request, $id)
	// {
	// 	$tarefas = $this->tarefasGeral->getTarefaById($id);
	// 	return view('todas-tarefas-editar', compact('tarefas'));
	// }

	// public function allTaskDelete(Request $request, $id)
	// {
	// 	$tarefas = $this->tarefasGeral->deleteById($id);
	// 	return redirect()->route('tarefa.allTask');
	// }
}
