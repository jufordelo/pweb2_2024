<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use Illuminate\Http\Request;
class AlunoController extends Controller
{
    public function index()
    { //app/http/controler
        $dados=Aluno::all();
       // dd($dados);
        return view("aluno.list",["dados"=> $dados]);
    }

    public function create()
    {
        return view("aluno.form");
    }

    public function store(Request $request)
    {
        Aluno::create(
            [ 'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'cpf'=> $request->cpf,
            ] );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dado = Aluno::findOrFail($id);
        $dado->delete();
        return redirect('aluno');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Aluno::where(
                "nome",
                "like",
                "%", $request->nome . "%"   )->get();
        } else{
            $dados=Aluno::all();
        } //ds($dados)
             return view("aluno.list",["dados"=> $dados]);
    }

}
