@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar Nota de {{auth()->user()->name}}</span>
                    <a href="{{route('notas.index')}}" class="btn btn-primary btn-sm">Volver a lista de notas...</a>
                </div>
                <div class="card-body">     
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                  <form method="POST" action="{{route('notas.update', $nota->id)}}">
                    @method('PUT')
                    @csrf
                    <input
                      type="text"
                      name="nombre"
                      placeholder="Nombre"
                      class="form-control mb-2"
                      value="{{$nota->nombre}}"
                    />
                    @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es obligatorio
                        </div>
                    @enderror
                    <input
                      type="text"
                      name="descripcion"
                      placeholder="Descripcion"
                      class="form-control mb-2"
                      value="{{$nota->descripcion}}"
                    />
                    @error('descripcion')
                        <div class="alert alert-danger">
                            La descripción es obligatoria
                        </div>
                    @enderror
                    <button class="btn btn-primary btn-block" type="submit">Actualizar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection