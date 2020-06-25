@extends('backend.layouts.adminLte')

@section('titulo','Produtos')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-cubes"></i> Editar Produto - {{$produto->id}}</h4>
        </div>
        <form class="form" action="{{route('produto.update',$produto->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.produto._form')
            <div class="card-footer">
                <button class="btn btn-success"><i class="fas fa-edit"></i>Atualizar</button>
            </div>
        </form>
    </div>
@endsection
