<div class="card-body">

    <div class="col-md-6">
        <label for="categoria-id">Categoria</label>
        <select id="categoria-id" name="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror">
            <option value="">Selecione</option>
            @foreach($categorias as $categoria)
                <option
                    {{isset($produto->categoria_id) && $produto->categoria_id  == $categoria->id ? 'selected': ''}} value="{{$categoria->id}}">{{$categoria->titulo}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label for="titulo">Título</label>
        <input id="titulo" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome"
               value="{{$produto->nome ?? old('nome')}}">
        @error('nome')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="descricao">Descrição</label>
        <input id="descricao" class="form-control @error('descricao') is-invalid @enderror" type="text" name="descricao"
               value="{{$produto->descricao ?? old('descricao')}}">
        @error('descricao')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="valor">Valor</label>
        <input id="valor" class="money form-control @error('preco') is-invalid @enderror" type="text" name="preco"
               value="{{$produto->preco ?? old('preco')}}">
        @error('preco')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6">
        <label class="" for="customFile">Foto</label>
        <div class="custom-file">
            <label class="custom-file-label" for="customFile">Escolha uma foto</label>
            <input name="foto" type="file" class="custom-file-input @error('foto') is-invalid @enderror"
                   id="customFile">
        </div>
        @error('foto')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>

    @if(isset($produto->foto))
        <br>
        <div class="col-md-6">
            <img width="150" src="{{asset($produto->foto)}}"/>
        </div>
    @endif
    <br>
    <div class="col-md-12">
        <input type="checkbox" id="publicado" name="publicado"
               {{isset($produto->publicado) && ($produto->publicado || old('publicado')) == 's' ? 'checked' : '' }} value="true"/>
        <label class="form-check-label" for="test5">Publicar?</label>
    </div>
</div>
