@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10">
            {!! Form::open(['route'=>['reserva.store'],'method'=>'POST','files'=>true]) !!}
            <div class="jumbotron">
                
                <div class="form-group">
                    <label for="lugar_id">ELIGE LUGAR </label>
                    {!!Form::select('lugar_id', $lugar, null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <label for="checkin">FECHA DE INGRESO</label>
                    {!!Form::date('checkin',null,['class'=>'form-control', 'id'=>'checkin', 'oninput'=>'calcularPrecioTotal()']) !!}
                </div>

                <div class="form-group">                            
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <label for="checkout">FECHA DE SALIDA</label>
                    {!!Form::date('checkout',null,['class'=>'form-control', 'id'=>'checkout', 'oninput'=>'calcularPrecioTotal()'])  !!}
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
                    <label for="preciototal">PRECIO TOTAL</label>
                    {!!Form::text('preciototal',null,['class'=>'form-control', 'id'=>'precioTotal']) !!}
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
<script>
    function calcularPrecioTotal() {
        const checkIn = new Date(document.getElementById("checkin").value);
        const checkOut = new Date(document.getElementById("checkout").value);
        if (checkOut > checkIn)
        {
            const diff = checkOut.getTime() - checkIn.getTime();
            const totalDias = Math.round(diff / (1000 * 60 * 60 * 24)); 
            console.log(totalDias)
            //const precioTotal = totalDias * precio;
            //document.getElementById("precioTotal").value = precioTotal;

        }
        else if (checkOut != null && checkOut < checkIn) {
            alert("La fecha final de la promoción debe ser mayor a la fecha inicial");
            const totalDias = 0;
        }

    }

    </script>
@endsection