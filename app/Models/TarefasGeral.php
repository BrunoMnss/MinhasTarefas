<?php

namespace App\Models;

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
    ];

    protected $dates = [
        'dia',
    ];

    public function store($data){
        return $this->create($data);
    }

    public function getAll(){
        
        return $this->select('id', 'dia', 'horario', 'tarefa')->orderBy('horario', 'asc')->get();
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

}
