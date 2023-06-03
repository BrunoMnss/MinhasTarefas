<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditTarefa;
use DateTime;
use App\Repositories\HomePageRepository;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $homePageRepository;

    public function __construct(HomePageRepository $homePageRepository)
    {
        $this->homePageRepository = $homePageRepository;
    }

    protected function index()
    {
        $data = $this->homePageRepository->getAll();
        return view('welcome1', compact('data'));
    }   

    public function edit(Request $request, $id)
    {
        $tarefas = $this->homePageRepository->getTarefaById($id);
        return view('homepage-editar', compact('tarefas'));
    }

    public function update(EditTarefa $request, $id)
    {
        $data = $request->validated(); 
        $tarefas = $this->homePageRepository->updateById($data, $id);
        return redirect()->route('home.index');
    }

    public function delete(Request $request, $id){
        $tarefas=$this->homePageRepository->deleteById($id);
        return redirect()->route('home.index');
    }

    public function editarFeito(Request $request)
    {
        $feito = $request->input('feito');
        $id = $request->input('id');
        return $this->homePageRepository->editarFeito($feito, $id);
    }

    
}
