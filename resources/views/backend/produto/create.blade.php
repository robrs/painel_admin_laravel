@extends('backend.layouts.adminLte')

@section('titulo','Produtos')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-cubes"></i> Cadastrar Produto</h4>
        </div>

        <form class="" action="{{route('produto.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.produto._form')
            <div class="card-footer">
                <button class="btn btn-primary"><i class="fas fa-folder"></i> Salvar</button>
            </div>
        </form>

    </div>
@endsection
