@extends('base')
@section('conteudo')

<form
 action= "{{route('aluno.store')}}" method="post">
    @csrf
    <label for=""> Nome</label>
    <input type="text" name="nome"><br>

    <label for="">Telefone</label>
     <input type="text" name="telefone"><br>

    <label for="">CPF</label>
    <input type="text" name="cpf"><br>

    <button type="submit"> Salvar</button>
    <button><a href="{{url('aluno')}} ">Voltar</a></button>

</form>
@stop







