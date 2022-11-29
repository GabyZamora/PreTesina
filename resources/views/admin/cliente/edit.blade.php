@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['cliente.update',$cliente],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">
                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::text('nombre',$cliente->nombre,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="FechaNac">INGRESE FECHA DE NACIMIENTO</label>
                    {!!Form::date('FechaNac',$cliente->fechaNac,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                    <label for="dui">INGRESE DUI</label>
                    {!!Form::text('dui',$cliente->dui,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="telefono">INGRESE TELEFONO</label>
                    {!!Form::text('telefono',$cliente->telefono,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="correo">INGRESE CORREO</label>
                    {!!Form::text('correo',$cliente->correo,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="direccion">INGRESE DIRECCIÓN</label>
                    {!!Form::text('direccion',$cliente->direccion,['class'=>'form-control']) !!}
                </div>

            </div>                <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
