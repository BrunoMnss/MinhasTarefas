<?php

namespace App\Models;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TarefasGeral extends Model
{
    use HasFactory;

    protected $table = 'tarefas_geral';

    protected $fillable = [
        'dia',
        'horario',
        'tarefa',
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

    public function getAllTarefas()
    {

        return $this->select('id', 'dia', 'horario', 'tarefa', 'created_at')
            ->orderBy('dia', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get();
    }

    public function searchTarefa(){
        return $this->select('id', 'dia', 'horario', 'tarefa', 'created_at')
        ->get();
    }

    public function getTarefaById($id)
    {
        return $this->select('id', 'dia', 'horario', 'tarefa')->where('id', $id)->first();
    }

    public function updateById($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return $this->where('id', $id)->delete();
    }
}
