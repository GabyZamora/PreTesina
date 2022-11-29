@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['ruta.update',$ruta],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">
                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::textarea('nombre',$ruta->nombre,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCIÓN</label>
                    {!!Form::textarea('descripcion',$ruta->descripcion,['class'=>'form-control','required']) !!}
                </div>
            </div>                <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
