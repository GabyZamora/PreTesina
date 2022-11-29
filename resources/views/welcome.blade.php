@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"/>
      <link rel="stylesheet" href="{{ asset('css/inicio.css') }}" />
      <title>Airbnb</title>

</head>
<body>
<div class="busqueda">
        <div align="center">
            <input type="search" placeholder="Buscar un lugar..." name="busquedaInicio">
            <br>
            <label>¿Qué estás buscando?</label>
        </div>
        <div class="icons-busqueda">
            <a href="#">
                <span>
                    <i class="fa-solid fa-house"></i>
                    <label class="label-icon-busqueda">Casas</label>
                </span>
            </a>
            <a href="#">
                <span>
                    <i class="fa-solid fa-hotel"></i>
                    <label class="label-icon-busqueda">Hoteles</label>
                </span>
            </a>
            <a href="#">
                <span>
                    <i class="fa-solid fa-campground"></i>
                    <label class="label-icon-busqueda">Cabañas</label>
                </span>
            </a>
        </div>
    </div>

    <div class="content-inicio">
        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>

        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>

        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>

        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>

        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>

        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>

        <div class="card d-flex flex-column justify-content-between ml-2">
            <img src="{{ asset('img/lugar.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title">LUGAR 1</h5>
               <a href="#" class="btn btn-primary btn-block">Ver Lugar</a>
            </div>
        </div>
        
    </div>
</body>
</html>
@endsection
