@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.menu')
        <div class="col-sm-10">
            <form action="{{ route('user.index') }}" method="GET">
                <div class="btn-group">
                    <input type="text" name="busqueda" class="form-control">
                    <input type="submit" value="Buscar" class="btn btn-primary">
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Activo</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->activo}}</td>
                        <td>
                            <a href="{{ route('user.edit',$item->id)}}" class="btn btn-warning">Editar</a>
                            {!!Form::close() !!}
                        </td>
                    </tr>   
                    @empty
                        
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">{{$users->appends(['busqueda'=>$busqueda])}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
