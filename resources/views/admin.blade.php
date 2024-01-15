@extends('adminlte::page')

@section('title', 'Métodos')

@section('content_header')
    <h1>Catalogo de Métodos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="/metodos-pdf" target="_blank" style="text-decoration:none;color:aliceblue;"><button type="button" class="btn btn-info" >Imprimir Reporte</button></a>
        <a style="text-decoration:none;color:aliceblue;" class="float-right d-none d-sm-block">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
               <i class="far fa fa-plus-square"></i> Agregar
           </button>
        </a>        
    </div>
    <div class="card-body">
        <select  class="select2-multiple form-control" name="usuario" id="usuario" style="width: 100%">
            <option value="0">Todos</option>

        </select>
        
    </div>
</div>
@stop

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ asset('css/select2.min.css')}}" rel="stylesheet" />
@stop


@section('js') 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>


<script>
    $(document).ready(function () {
        $('#metodos').DataTable({"order": [[ 0, 'desc' ]]});
        $('.select2-multiple').select2();
    });
</script>
<script src="{{ asset('js/select2.min.js')}}"></script>

@stop
