@extends('adminlte::page')

@section('content')

<form method="post" action="{{ route('client.store')}}">
  @csrf
  <div class="form-group col-md-4">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome"
      placeholder="Insira o nome do cliente">
  </div>
  <div class="form-group col-md-4">
    <label for="email">Endereço de email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email">
  </div>
  <div class="form-group col-md-4">
    <label for="data">Data de ingresso</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Data">
  </div>
  <div class="form-group col-md-4">
    <label for="sobre">Sobre</label>
    <input type="textarea" class="form-control" id="sobre" name="sobre" aria-describedby="sobre"
      placeholder="Sobre o cliente">
  </div>
  <button type="submit" class="btn btn-primary" style="margin-left: 20px;">Enviar</button>
</form>

@endsection
