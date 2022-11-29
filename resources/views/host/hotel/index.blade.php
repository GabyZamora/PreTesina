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
    
    
        .cardlug{
            width: 300px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 2px;
            overflow: hidden;
            margin: 10px;
            text-align: center;
            transition: all 0.25s;
        }
    
        .cardlug:hover{
            transform: translate(-15px);
            box-shadow: 0 12px 16px rgba(0, 0, 0.2);
        }
    
        .cardlug img{
            width: 300px;
            height: 300px;
        }
    
        .cardlug h4{
            font-weight: 400;
            font-family: 'Quattrocento';
        } 
    
    
        .cardlug h5{
            padding: 0 2rem;
            font-weight:400;
            font-size: 14px;
            font-family: 'Quattrocento';
        } 
    
        .cardlug a{
            font-weight: 500;
            text-decoration: none;
            color: #3498db;
        }
</style>
<div class="container-fluid">    
    <form action="{{ route('hotel.index') }}" method="GET">
        <div class="btn-group">
            <input type="text" name="busqueda" class="form-control">
            <input type="submit" value="Buscar" class="btn btn-primary">
        </div>
    </form>       
        <div class="col-sm-12"> 
            <div class="row">    
                @forelse ($categoria as $item)                
                <div class="col-sm-3">        
                    <div class="cardlug">
                        <img src="/img/lugar/{{$item->urlfoto}}"/>
                        <h4>{{ $item->nombre }}</h4>
                        <h5>${{ $item->precio }}</h5>
                        <a class="btn btn-sm btn-primary " href="{{ route('hotel.show',$item->id) }}"><i class="fa fa-fw fa-eye"></i>Ver más...</a>
                    </div>
                </div>                    
                @empty
            </div>          
            @endforelse
        </div>                        
        <tfoot>
        </tfoot>
</div>
@endsection
