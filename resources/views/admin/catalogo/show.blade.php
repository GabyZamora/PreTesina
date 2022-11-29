@extends('../layouts.app')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-warning" href="{{ route('catalogo.index') }}">Catalogo</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <img src="/img/lugar/{{$lugares->urlfoto}}"/>
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $lugares->nombre}}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $lugares->descripcion }}
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{ route('clientes.create')}}" class="btn btn-success">RESERVAR</a>
                </div>
            </div>
        </div>
    </section>
@endsection
