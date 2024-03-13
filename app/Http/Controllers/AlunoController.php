<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use App\Models\Categoria;
use Illuminate\Http\Request;
class AlunoController extends Controller
{
    public function index()
    { //app/http/controler
        $dados=Aluno::all();
       //dd($dados);
        return view("aluno.list",["dados"=> $dados]);
    }

    public function create()
    {
        $categorias= Categoria::all();
        return view("aluno.form",['categorias'=>$categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'=>"required|max:100",
             'cpf'=> "required|max:16",
             'telefone'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'cpf.required'=> "O :attribute é obrigatório",
            'cpf.max'=> "São permitidos 16 caracteres",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Aluno::create(
            [ 'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'cpf'=> $request->cpf,
            'categoria_id'=>$request->categoria_id,
            ] );

            return redirect('aluno');

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
     $dado= Aluno::findOrFail($id);
     return view ("aluno.form",['dado'=>$dado,
    'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nome'=>"required|max:100",
             'cpf'=> "required|max:16",
             'telefone'=>"nullable"
        ],[
            'nome.required'=> "O :attribute é obrigatório",
            'nome.max'=> "São permitidos 100 caracteres",
            'cpf.required'=> "O :attribute é obrigatório",
            'cpf.max'=> "São permitidos 16 caracteres",
            'categoria_id.required'=> "O: attribute é obrigatório",
        ]);


        Aluno::updateOrCreate(
            [ 'id'=> $request->id],

            [ 'nome'=> $request->nome,
            'telefone'=> $request->telefone,
            'cpf'=> $request->cpf,
            'categoria_id'=>$request->categoria_id,
        ]);
            return redirect('aluno');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Aluno::findOrFail($id);
       // dd($dado);
        $dado->delete();

        return redirect('aluno');
    }
    public function search(Request $request)
    {
        if(! empty ($request->nome)){
            $dados = Aluno::where(
                "nome",
                "like",
                "%". $request->nome . "%" )->get();
        } else{
            $dados=Aluno::all();
        } //dd($dados)
             return view("aluno.list",["dados"=> $dados]);

    }

}
