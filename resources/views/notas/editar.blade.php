@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header text-center font-weight-bold">
  <h2>EDITAR NOTA</h2>
</div>
<div class="card-body">
  @if (session('mensaje'))
      <div class="alert alert-success">
          {{ session('mensaje') }}
      </div>
  @endif
  <form action="{{ route('notas.update', $editar->id) }}" method="POST">
    @method('PUT')
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

    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $editar->nombre }}">
    <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-2" 
    value="{{ $editar->descripcion }}">
    <div class="container-top mt-4 text-centers">
    <button class="btn btn-warning text-center" type="submit">Editar</button>
    <a href="/notas" class="btn btn-primary text-center">Volver</a>
</div>
</form>
    </div>
</div>

@endsection