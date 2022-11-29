@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!! Form::open(['route'=>['foto.store'],'method'=>'POST','files'=>true]) !!}
            <div class="jumbotron">
                
                <div class="form-group">
                    <label for="nombre">INGRESE NOMBRE</label>
                    {!!Form::text('nombre',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="descripcion">INGRESE DESCRIPCION</label>
                    {!!Form::textarea('descripcion',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="orden">INGRESE ORDEN </label>
                    {!!Form::text('orden',null,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">
                    <label for="lugar_id">LUGAR </label>
                    {!!Form::select('lugar_id', $lugares, null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN</label> <br>
                    <img src="/img/foto/foto.jpg">
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
