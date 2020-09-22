@extends('adminlte::page')

@section('content')
<div class="card">
  <div class="card-header">
    <i class="fa fa-info-circle"></i>
    <h5>Visualizar cliente</h5>
    <hr class="m-b-5">
  </div>

  <div class="card-body">
    @isset($client)
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Nome</label>
      <div class="col-md-9">
        <input type="text" id="nome" name="nome" class="form-control" value="{{ $client->nome ?? null }}"
          onkeyup="toUpper(this)" placeholder="Nome" autofocus readonly>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Email</label>
      <div class="col-md-9">
        <input type="email" id="email" name="email" class="form-control" value="{{ $client->email ?? null }}"
          onkeyup="toUpper(this)" placeholder="Detalhes" autofocus readonly>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Data de Ingresso</label>
      <div class="col-md-9">
        <input type="date" id="data" name="data" class="form-control" value="{{$client->data ?? null}}"
          onkeyup="toUpper(this)" placeholder="Data" autofocus readonly>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Sobre</label>
      <div class="col-md-9">
        <input type="text" id="sobre" name="sobre" class="form-control" value="{{ $client->sobre ?? null }}"
          onkeyup="toUpper(this)" placeholder="Sobre" autofocus readonly>
      </div>
    </div>

    <hr>

    <div class="form-group row mb-0">
      <div class="col-md-9 offset-md-2">
        <a class="btn btn-success" href="{{ route('client.edit', $client->id) }}">
          <i class="fa fa-edit"></i> Editar Cliente
        </a>
        <a class="btn btn-warning" href="{{ route('client.index') }}">
          <i class="fa fa-undo"></i> Voltar à listagem
        </a>
      </div>
    </div>
    </form>
    @endif
    @isset($client->images)
    <div>
      <div class="col-md-12 table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Imagem</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($client->images as $images)
            <tr>
              <td class="text-center">
                <div class="text-center">
                  <img class="rounded img-fluid" src="{{ asset('storage/'. $images->imagem) }}">
                </div>
              </td>
            </tr>
            @empty
            <p>Cliente sem imagens</p>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>

  @endsection