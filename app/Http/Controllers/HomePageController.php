<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TarefasGeral;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $tarefasGeral;

    public function __construct(TarefasGeral $tarefasGeral)
    {
        $this->tarefasGeral = $tarefasGeral;
    }

    protected function index(Request $request)
    {
        $data=$this->tarefasGeral->getAll();
        return view('welcome1', compact('data'));
    }
}
