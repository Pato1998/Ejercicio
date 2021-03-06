@extends('admin.layouts.layout')

@section('content')
<div class="container">

<h2 class="text-center mt-4">Agregar empleado</h2>

<form action="guardar" method="POST" class="mt-4">
  @csrf
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
  </div>
  <div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
  </div>
  <div class="form-group">
    <label for="edad">Edad</label>
    <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" required>
  </div>
  <div class="form-group">
    <label for="empresa_id">Empresa</label>
    <select class="form-control" id="empresa_id" name="empresa_id" required>
        @foreach($empresas as $empresa)
          <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="tipo_empleado_id">Tipo de empleado</label>
    <select class="form-control" id="tipo_empleado_id" name="tipo_empleado_id" required>
        @foreach($tipoEmpleados as $tipoEmpleado)
          <option value="{{ $tipoEmpleado->id }}">{{ $tipoEmpleado->nombre }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="especialidad_id">Tipo de especialidad</label>
    <select class="form-control" id="especialidad_id" name="especialidad_id" required>
    
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
</form>
</div>

@endsection
