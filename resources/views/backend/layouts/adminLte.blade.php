@extends('adminlte::page')


@section('content_header')
    @include('backend.includes.flash-message')
@stop


@section('css')
    {{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <script src="{{asset('js/jquery.mask.js')}}"></script>

    <script src="{{asset('js/masks.js')}}"></script>

    <script>
        // para os alerts flashes
        $(".alert").fadeOut(3000);

        // para o método de exclusão de itens
        function deleteData(action, id) {
            $("#DeleteModal").show();
            let url = action + '/' + id;

            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }

    </script>
@stop

