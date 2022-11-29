@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            {!!Form::open(['route'=>['user.update',$user],'method'=>'PUT','files'=>true]) !!}
            <div class="jumbotron">

                <div class="form-group">
                    <label for="name">{{$user->name}}</label>
                </div>

                <div class="form-group">
                    <label for="orden">INGRESE ORDEN </label>
                    {!!Form::text('orden',$user->orden,['class'=>'form-control']) !!}
                </div>
                
                <div class="form-group">          
                    {!!Form::checkbox('activo',null,$user->activo) !!}
                    <label for="activo">ACTIVO</label>
                </div>

                <div class="form-group">
                    <label for="urlfoto">IMAGEN</label> <br>
                    <img src="/img/user/{{$user->urlfoto}}">
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
