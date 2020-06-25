@extends('backend.layouts.adminLte')

@section('title','Adminisistrar Categorias')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success" href="{{ route('categoria.create') }}"><i
                    class="fas fa-plus"></i>&nbsp;Adicionar</a>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-cubes"></i> Administrar Categorias</h4>
        </div>
        <br>
        <div class="table-responsive card-body p-0">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 30px">id#</th>
                        <th>Título</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$categoria->id}}</td>
                            <td>{{$categoria->titulo}}</td>
                            <td style="width: 60px">
                                <a class="btn btn-primary" href="{{ route('categoria.edit',$categoria->id) }}"
                                   title="Editar"><i
                                        class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td style="width: 60px">
                                <a href="javascript:" data-toggle="modal"
                                   onclick="deleteData('destroy',{{$categoria->id}})"
                                   data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12" style="margin-top: 10px;">
                {{$categorias->links()}}
            </div>
        </div>
    </div>
@endsection

@include('backend.includes.confirm_modal')
