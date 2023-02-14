<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefasGeral extends Model
{
    use HasFactory;

    protected $table = 'tarefas_geral';

    protected $fillable = [
        'dia',
        'horario',
        'tarefa',
        'feito'
    ];

    protected $dates = [
        'dia',
    ];

    public function store($data)
    {
        return $this->create($data);
    }

    public function getAll()
    {

        return $this->select('id', 'dia', 'horario', 'tarefa')
            ->orderBy('dia', 'ASC')
            ->orderBy('horario', 'ASC')
            ->whereBetween('dia', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();
    }

    public function getAllTarefas($search)
    {
        $busca =  $this->select('id', 'dia', 'horario', 'tarefa', 'created_at');
        if (!empty($search)) {
            $busca = $busca->where('dia', 'LIKE', $search . '%')->orWhere('horario', 'LIKE', $search . '%')->orWhere('tarefa', 'LIKE', $search . '%');
        }
        return $busca
            ->orderBy('dia', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get();
    }

    public function searchTarefa()
    {
        return $this->select('id', 'dia', 'horario', 'tarefa', 'created_at')
            ->get();
    }

    public function getTarefaById($id)
    {
        return $this->select('id', 'dia', 'horario', 'tarefa')->where('id', $id)->first();
    }

    public function updateById($data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function editarFeito($feito, $id)
    {
        return $this->where('id', $id)->update(['feito' => $feito]);
    }
}
