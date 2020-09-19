@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
  integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
  integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



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