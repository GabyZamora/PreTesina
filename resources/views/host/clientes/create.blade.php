@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            {!! Form::open(['route'=>['clientes.store'],'method'=>'POST','files'=>true]) !!}
            <div class="jumbotron">

                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::text('nombre',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="fechaNac">FECHA DE NACIMIENTO</label>
                    {!!Form::date('fechaNac',null,['class'=>'form-control','required']) !!}
                </div>

                <div class="form-group">
                    <label for="dui">DUI </label>
                    {!!Form::text('dui', null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="telefono">TELEFONO </label>
                    {!!Form::text('telefono', null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="correo">CORREO DE CONTACTO </label>
                    {!!Form::text('correo', null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="direccion">DIRECCION</label>
                    {!!Form::text('direccion', null,['class'=>'form-control']) !!}
                </div>

            </div>                <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('SIGUIENTE',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
