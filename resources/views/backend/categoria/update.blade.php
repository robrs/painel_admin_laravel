@extends('backend.layouts.adminLte')

@section('titulo','Categoria')

@section('content')
    <div class="card card-light">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-cubes"></i> Editar Categoria - {{$categoria->id}}</h4>
        </div>
        <form class="form" action="{{route('categoria.update',$categoria->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.categoria._form')
            <div class="card-footer">
                <button class="btn btn-success"><i class="fas fa-edit"></i>Atualizar</button>
            </div>
        </form>
    </div>
@endsection
