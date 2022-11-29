@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['foto.update',$foto],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">

                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::textarea('nombre',$foto->nombre,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!!Form::textarea('descripcion',$foto->descripcion,['class'=>'form-control','required']) !!}
                </div>
                <div class="form-group">
                    <label for="orden">INGRESE ORDEN </label>
                    {!!Form::text('orden',$foto->orden,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label for="lugar_id">LUGAR</label>
                    {!!Form::select('lugar_id',$lugar, $foto->lugar_id,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">          
                    {!!Form::checkbox('estado',null) !!}
                    <label for="estado">ESTADO</label>
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN</label> <br>
                    <img src="/img/foto/{{$foto->urlfoto}}">
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
