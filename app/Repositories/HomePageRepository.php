<?php
namespace App\Repositories;

use App\Models\HomePage;
use DateTime;

class HomePageRepository
{
	protected $homePage;

	public function __construct(HomePage $homePage)
	{
		$this->homePage = $homePage;
	}

    public function getAll()
	{
		$data = $this->homePage->getAll()->toArray();
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
		return $newData;
	}

    public function getTarefaById($id)
    {
        return $this->homePage->getTarefaById($id);
    }

    public function updateById($data, $id)
    {
        return $this->homePage->updateById($data, $id);
    }

    public function deleteById($id){
        return $this->homePage->deleteById($id);
    }

    public function editarFeito($feito, $id)
	{
		$atualizaFeito = $this->homePage->editarFeito($feito, $id);
		if (empty($atualizaFeito)) {
			return 'Não foi possivel atualizar o status';
		}
		return 'Status atualizado';
	}
}