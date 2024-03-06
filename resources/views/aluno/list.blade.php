@extends('base')
@section('conteudo')
@section('titulo' , "Formulario Aluno")
<form action="{{route('aluno.search')}}" method="post">
    @csrf
    <label for=""> Nome</label>
    <input type="text" name="nome"><br>
    <button type="submit">Buscar</button>
    <button><a href="{{url('aluno/create')}}">Novo</a></button>

</form>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Cpf</th>
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







