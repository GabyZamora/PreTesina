@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <form action="{{ route('estado.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </form>
            <a href="{{route('estado.create')}}" class="btn btn-success">NUEVO ESTADO</a>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($estados as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->descripcion}}</td>
                        <td>
                            <a href="{{ route('estado.edit',$item->id)}}" class="btn btn-warning">Editar</a>
                            {!! Form::open(['method'=>'DELETE', 'route'=>['estado.destroy',$item->id],'style'=>'display:inline']) !!}
                            {!!Form::submit('ELIMINAR',['class'=>'btn btn-danger','onclick'=>'return confirm("¿Seguro que desea eliminar?")']) !!}
                            {!!Form::close() !!}
                        </td>
                    </tr>   
                    @empty
                        
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">{{$estados->appends(['busqueda'=>$busqueda])}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
