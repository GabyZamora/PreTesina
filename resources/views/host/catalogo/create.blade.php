@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            {!! Form::open(['route'=>['catalogo.store'],'method'=>'POST','files'=>true]) !!}
            <div class="jumbotron">
                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::text('nombre',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!!Form::textarea('descripcion',null,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                    <label for="latitud">INGRESE LATITUD </label>
                    {!!Form::text('latitud',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="longitud">INGRESE LONGITUD</label>
                    {!!Form::text('longitud',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="ruta_id">ZONAS </label>
                    {!!Form::select('ruta_id', $rutas, null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="categoria_id">CATEGORIA </label>
                    {!!Form::select('categoria_id', $categorias, null,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::checkbox('estado',null,null) !!}    
                    <label for="estado">ESTADO </label>
                </div>

                <div class="form-group">
                    <label for="numHuesped">INGRESE NÚMERO DE HÚESPEDES </label>
                    {!!Form::text('numHuesped',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::checkbox('mascotas',null,null) !!}    
                    <label for="mascotas">¿SE ADMITEN MASCOTAS? </label>
                </div>

                <div class="form-group">
                    <label for="servicios">Selecciona los servicios</label>
                    {!! Form::select('servicios', $servicios, null,['class'=>'form-control','name'=>'servicios[]','multiple'=>'multiple']) !!}
                </div>
                
                <div class="form-group">
                    <label for="precio">INGRESE PRECIO(EN DOLARES) POR NOCHE </label>
                    {!!Form::text('precio',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/lugar/foto.jpg">
                    {!! Form::file('urlfoto') !!}
                </div>
            </div>                
            <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection