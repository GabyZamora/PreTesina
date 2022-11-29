@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <form action="{{ route('ruta.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </form>
            <a href="{{route('ruta.create')}}" class="btn btn-success">NUEVA RUTA</a>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($rutas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>
                            <a href="{{ route('ruta.edit',$item->id)}}" class="btn btn-warning">Editar</a>
                            {!! Form::open(['method'=>'DELETE', 'route'=>['ruta.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!!Form::submit('ELIMINAR',['class'=>'btn btn-danger','onclick'=>'return confirm("¿Seguro que desea eliminar?")']) !!}
                            {!!Form::close() !!}
                        </td>
                    </tr>   
                    @empty
                        
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">{{$rutas->appends(['busqueda'=>$busqueda])}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
