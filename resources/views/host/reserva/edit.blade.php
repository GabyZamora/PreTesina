@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['lugar.update',$lugar],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">
                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::text('nombre',$lugar->nombre,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!!Form::textarea('descripcion',$lugar->descripcion,['class'=>'form-control','required']) !!}
                </div>
                
                <div class="form-group">
                    <label for="latitud">INGRESE LATITUD </label>
                    {!!Form::text('latitud',$lugar->latitud,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="longitud">INGRESE LONGITUD </label>
                    {!!Form::text('longitud',$lugar->longitud,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label for="ruta_id">ZONA</label>
                    {!!Form::select('ruta_id',$rutas, $lugar->ruta_id,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="categoria_id">CATEGORIA</label>
                    {!!Form::select('categoria_id',$categorias, $lugar->categoria_id,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">          
                    {!!Form::checkbox('estado',null) !!}
                    <label for="estado">ESTADO</label>
                </div>

                <div class="form-group">
                    <label for="numHuesped">NÚMERO DE HÚESPEDES</label>
                    {!!Form::text('numHuesped', $lugar->numHuesped,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!!Form::checkbox('mascotas',null) !!}
                    <label for="mascotas">¿SE ADMITEN MASCOTAS?</label>
                </div>

                <div class="form-group">
                    <label for="precio">PRECIO</label>
                    {!!Form::text('precio',$lugar->precio,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="urlfoto">IMAGEN 900px X 400px</label> <br>
                    <img src="/img/lugar/{{$lugar->urlfoto}}">
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
