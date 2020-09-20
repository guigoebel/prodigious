@extends('adminlte::page')

@section('content')
<div class="card">
  <div class="card-header">
    <i class="fa fa-info-circle"></i>
    <h5>Preencha os campos e clique em Salvar Cliente</h5>
    <hr class="m-b-5">
  </div>

  <div class="card-body">
    @isset($clients)
    <form method="POST" action="{{ route('client.update', $clients->id) }}" enctype="multipart/form-data">
      @method('PUT')
      @else
      <form method="POST" action="{{ route('client.store') }}" enctype="multipart/form-data">
        @endif

        @csrf


        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nome *</label>
          <div class="col-md-9">
            <input type="text" id="nome" name="nome" class="form-control @error('nome') @errror is-invalid @enderror"
              value="{{ old('nome', $clients->nome ?? null) }}" onkeyup="toUpper(this)" placeholder="Nome" autofocus>

            @error('nome')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email *</label>
          <div class="col-md-9">
            <input type="email" id="email" name="email"
              class="form-control @error('email') @errror is-invalid @enderror"
              value="{{ old('email', $clients->email ?? null) }}" onkeyup="toUpper(this)" placeholder="Detalhes"
              autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Data de Ingresso *</label>
          <div class="col-md-9">
            <input type="date" id="data" name="data" class="form-control @error('data') @errror is-invalid @enderror"
              value="{{ old('data', $clients->data ?? null) }}" onkeyup="toUpper(this)" placeholder="Data" autofocus>

            @error('data')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Sobre *</label>
          <div class="col-md-9">
            <input type="text" id="sobre" name="sobre" class="form-control @error('sobre') @errror is-invalid @enderror"
              value="{{ old('sobre', $clients->sobre ?? null) }}" onkeyup="toUpper(this)" placeholder="Sobre" autofocus>

            @error('sobre')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fotos</label>
          <div class="col-md-9">
            <input type="file" id="files" name="files[]" multiple accept="image/*"
              class="form-control @error('file') @errror is-invalid @enderror">
            @error('file')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <hr>

        <div class="form-group row mb-0">
          <div class="col-md-9 offset-md-2">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-check"></i> Salvar Cliente
            </button>
            <a class="btn btn-warning" href="{{ route('client.index') }}">
              <i class="fa fa-undo"></i> Voltar à listagem
            </a>
          </div>
        </div>
      </form>

  </div>
</div>
@endsection