@extends('adminlte::page')



@section('content')


<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">
            <a href="{{ route('client.index') }}">
            </a>
          </h5>
        </div>
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item active" aria-current="page">Clientes</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <i class="fa fa-list"></i>
    <h4>Listagem de Clientes</h4>
    <hr class="m-b-5">
  </div>

  <div class="card-body">
    <div class="row">


      <div class="col-md-6 text-right">
        <a href="{{ route('client.create') }}" class="btn btn-info">
          <i class="fa fa-plus"></i> Novo Cliente
        </a>
      </div>


      <hr>
      {{ $clients->links() }}
      <div class="col-md-12 table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Junto desde:</th>
              <th class="text-center">Sobre</th>
              <th class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($clients as $client)
            <tr>
              <td class="white-space">{{ $client->nome }}</td>
              <td>{{ $client->email }}</td>
              <td>{{ $client->data }}</td>
              <td>{{ $client->sobre }}</td>
              <td class="text-center">


                <a class="btn btn-warning" href="{{ route('client.show',$client->id) }}">
                  <i class="fa fa-eye"></i>
                </a>

                <a class="btn btn-success" href="{{ route('client.edit',$client->id) }}">
                  <i class="fa fa-edit"></i>
                </a>

                <form action="{{ route('client.destroy',$client->id) }}" method="POST">

                  @csrf
                  @method('DELETE')

                  <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>

              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8">
                <div class="alert alert-danger text-center">
                  <i class="fa fa-exclamation-triangle"></i>
                  Oops... nenhum registro encontrado!
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>


      </div>

      @endsection