@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['host.store'],'method'=>'POST','files'=>true]) !!}
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
                    <label for="ruta_id">ZONAS </label>
                    {!!Form::select('ruta_id', $rutas, null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::checkbox('estado',null,null) !!}    
                    <label for="estado">ESTADO </label>

                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/host/foto.jpg">
                    {!! Form::file('urlfoto') !!}
                </div>

                
                <div class="form-group">
                    <label for="urllogo">LOGO 200px X 200px</label> <br>
                    <img src="/img/host/foto.jpg">
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
