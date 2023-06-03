<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
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


    public function getAll(){
        return $this->select('id', 'dia', 'horario', 'tarefa', 'feito')
        ->whereDate('dia', [Carbon::now('America/Sao_Paulo')])
        ->orderBy('horario', 'asc')
        ->get();
    }

    public function getTarefaById($id){
        return $this->select('id', 'dia', 'horario', 'tarefa')->where('id', $id)->first();
    }

    public function updateById($id, $data){
        return $this->where('id', $id)->update($data);
    }

    public function deleteById($id){
        return $this->where('id', $id)->delete();
    }

    public function editarFeito($feito, $id)
    {
        return $this->where('id', $id)->update(['feito' => $feito]);
    }
}
