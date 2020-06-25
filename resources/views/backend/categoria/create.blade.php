@extends('backend.layouts.adminLte')

@section('titulo','Categoria')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-cubes"></i> Cadastrar Categoria</h4>
        </div>

        <form class="" action="{{route('categoria.store')}}" method="post">
            @csrf
            @include('backend.categoria._form')
            <div class="card-footer">
                <button class="btn btn-primary"><i class="fas fa-folder"></i> Salvar</button>
            </div>
        </form>

    </div>
@endsection
