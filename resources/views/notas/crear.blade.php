@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Agregar Nota</span>
                    <a href="/notas" class="btn btn-primary btn-sm">Volver a lista de notas...</a>
                </div>
                <div class="card-body">     
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                  <form method="POST" action="/notas">
                    @csrf
                    @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es obligatorio
                        </div>
                    @enderror

                    @error('descripcion')
                        <div class="alert alert-danger">
                            La descripción es obligatoria
                        </div>
                    @enderror

                    <input
                      type="text"
                      name="nombre"
                      placeholder="Nombre"
                      class="form-control mb-2"
                      value="{{ old('nombre') }}">
                    <input
                      type="text"
                      name="descripcion"
                      placeholder="Descripcion"
                      class="form-control mb-2"
                      value="{{ old('descripcion') }}">
                    <button class="btn btn-outline-warning btn-block" type="submit">Agregar</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection