@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            {!! Form::open(['route'=>['reserva.store'],'method'=>'POST','files'=>true]) !!}
            <div class="jumbotron">
                
                <div class="form-group">
                    <label for="lugar_id">ZONAS </label>
                    {!!Form::select('lugar_id', $lugar, null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <label for="checkin">FECHA DE INGRESO</label>
                    {!!Form::date('checkin',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">                            
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <label for="checkout">FECHA DE SALIDA</label>
                    {!!Form::date('checkout',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="numHuesped">INGRESE NÚMERO DE HÚESPEDES </label>
                    {!!Form::text('numHuesped',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::checkbox('mascotas',null,null) !!}    
                    <label for="mascotas">¿MASCOTAS? </label>
                </div>

                <div class="form-group">
                    <label for="preciototal"></label>
                </div>

            </div>                <br>
            <a href="javascript: history.go(-1)" class="btn btn-danger">CANCELAR</a>
            {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{}}/assets-old/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicket.min.js"></script>

@endsection