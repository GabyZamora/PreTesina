@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['host.update',$host],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">

                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::text('nombre',$host->nombre,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!!Form::textarea('descripcion',$host->descripcion,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                    <label for="ruta_id">RUTA</label>
                    {!!Form::select('ruta_id',$rutas, $host->ruta_id,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">          
                    {!!Form::checkbox('estado',null) !!}
                    <label for="estado">ESTADO</label>
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/host/{{$host->urlfoto}}">
                    {!! Form::file('urlfoto') !!}
                </div>

                <div class="form-group">
                    <label for="urllogo">IMAGEN 200px X 200px</label> <br>
                    <img src="/img/host/{{$host->urllogo}}">
                    {!! Form::file('urllogo') !!}
                </div>
            </div>                <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
