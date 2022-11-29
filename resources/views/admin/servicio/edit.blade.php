@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['servicio.update',$servicio],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">
                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::textarea('nombre',$servicio->nombre,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!!Form::textarea('descripcion',$servicio->descripcion,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN MÍNIMO 200px X 200px</label> <br>
                    <img src="/img/servicio/{{$servicio->urlfoto}}">
                    {!! Form::file('urlfoto') !!}
                </div>
            </div>                <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
