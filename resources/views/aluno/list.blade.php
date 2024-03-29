@extends('base')
@section('conteudo')
@section('titulo' , "Formulario Aluno")



<h3> Listagem Aluno </h3>
<form action="{{route('aluno.search')}}" method="post">
    <div class="row">
        @csrf
        <div class= "col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-4" style="">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass">
                </i> Buscar</button>
           <a href="{{url('aluno/create')}}" class="btn btn-success"><i class="fa-regular fa-address-book"></i> Novo</a>
        </div>
    </div>
</form>

    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Cpf</th>
                    <th>Categoria</th>
                    <th colspan="2">Ações</th>
                    <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($dados as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>{{$item->telefone}}</td>
                <td>{{$item->cpf}}</td>
                <td>{{$item->categoria->nome ?? ""}}</td>
                <td>Editar</td>
                <td><a href="{{route('aluno.edit', $item->id)}}"> Editar </a></td>

                <td><form action="{{route('aluno.destroy',$item)}}" method="post">
                @method("DELETE")
                @csrf
                <input type="submit" value="Deletar">
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@stop







