@extends('backend.layouts.adminLte')

@section('title','Adminisistrar Produtos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-success" href="{{ route('produto.create') }}"><i
                    class="fas fa-plus"></i>&nbsp;Adicionar</a>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><i class="fas fa-cubes"></i> Administrar Produtos</h4>
        </div>
        <br>
        <div class="table-responsive card-body p-0">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width: 30px">id#</th>
                        <th>Categoria</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Publicado</th>
                        <th colspan="2">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->categoria->titulo}}</td>
                            <td style="width: 80px"><img height="40" width="60" src="{{asset($produto->foto)}}"
                                                         alt="{{$produto->nome}}"/></td>
                            <td>{{$produto->nome}}</td>
                            <td>{{number_format($produto->preco,2,',','.')}}</td>
                            <td>{{$produto->publicado == 's' ? 'SIM':'NÃO'}}</td>
                            <td style="width: 60px">
                                <a class="btn btn-primary" href="{{ route('produto.edit',$produto->id) }}"
                                   title="Editar"><i
                                        class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td style="width: 60px">
                                <a href="javascript:" data-toggle="modal"
                                   onclick="deleteData('delete',{{$produto->id}})"
                                   data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12" style="margin-top: 10px;">
                {{$produtos->links()}}
            </div>
        </div>
    </div>
    @include('backend.includes.confirm_modal')
@endsection


