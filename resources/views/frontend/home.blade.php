@extends('frontend.layout.site')

@section('titulo','Produtos')

@section('content')

    <div class="container" style="padding: 5%">
        <div class="card-deck mb-3 text-center">
            @foreach($produtos as $produto)
                <div class="col-sm-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{asset($produto->foto)}}" class="card-img-top" alt="{{$produto->nome}}" height="140">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <p class="card-text">{{$produto->descricao}}</p>
                            <p class="card-text"><strong>R$&nbsp;{{number_format($produto->preco,2,',','.')}}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-12">
            {{$produtos->links()}}
        </div>
    </div>

@endsection
