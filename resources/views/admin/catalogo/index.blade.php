@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Quattrocento+Sans:wght@700&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@600&display=swap" rel="stylesheet"> 
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap-4.3.1.min.js"></script>
<style>
    .catalogo body{
        font-family: 'Quattrocento';
        letter-spacing: 0.03em;
        line-height: 1.6;
    }

    .title{
        text-align: center;
        font-size: 40px;
        color: #6a6a6a;
        margin-top: 50px;
        font-family: 'Quattrocento';
    }

    .contain{
        width: auto;
        margin-left: 70px;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        overflow: hidden;
    }

    .contain .card{
        width: 240px;
        height: auto;
        border-radius: 8px;
        border-color: #6a6a6a;
        box-shadow: 0 2px 2px rbga(0, 0, 0.2);
        overflow: hidden;
        margin: 20px;
        text-align: center;
        transition: all 0.25s;
    }

    .contain .card:hover{
        transform: translate(-15px);
        box-shadow: 0 12px 16px rgba(0, 0, 0.2);
    }

    .contain .card img{
        width: 250px;
        height: 250px;
    }

    .contain .card h4{
        font-weight: 600;
        font-family: 'Quattrocento';
    } 


    .contain .card h5{
        padding: 0 2rem;
        font-weight:400;
        font-size: 14px;
        font-family: 'Quattrocento';
    } 

    .contain .card a{
        font-weight: 500;
        text-decoration: none;
        color: #3498db;
}
</style>
<div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <span id="card_title">
                    {{ __('Hospedajes') }}
                </span>
            </div>  
            <form action="{{ route('lugar.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </form>                 
            @foreach ($lugares as $item)
            <div class="contain">              
                <div class="card">
                    <img src="/img/lugar/{{$item->urlfoto}}"/>
                    <h4>{{ $item->nombre }}</h4>
                    <h5>${{ $item->precio }}</h5>
                    <a class="btn btn-sm btn-primary " href="{{ route('catalogo.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i>Ver más...</a>
                </div>
            </div>                        
                @endforeach
        </div>
        <tfoot>
            <tr>
                <td colspan="4">{{$lugars->appends(['busqueda'=>$busqueda])}}</td>
            </tr>
        </tfoot>
</div>
@endsection
