<div class="card-body">
    <div class="col-md-6">
        <label for="titulo">Título</label>
        <input id="titulo" class="form-control @error('titulo') is-invalid @enderror" type="text" name="titulo"
               value="{{$categoria->titulo ?? old('titulo')}}">
        @error('titulo')
        <div style="color: red">{{ $message }}</div>
        @enderror
    </div>
</div>

