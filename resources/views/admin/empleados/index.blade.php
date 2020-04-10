@extends('admin.layouts.layout')

@section('content')

<div class="container text-center">

<h2 class="mt-4">Empleados</h2>

<a href="{{ Route('crearEmpleado') }}" class="btn btn-primary btn-sm float-left mb-4">+ Agregar empleado</a>
<button id="btnPromedioEdad" class="btn btn-success btn-sm float-left mb-4 ml-2">Ver promedio de edad</button>

<form action="{{ Route('buscarEmpleado') }}" type="GET">
  <div class="form-group col-sm-4 float-right d-flex flex-row">
      <input type="text" class="form-control" id="empleado_id" name="empleado_id" placeholder="ID de empleado" required>
      <button class="btn btn-success ml-2">Buscar</button>
  </div>
</form>

<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Tipo de empleado</th>
      <th scope="col">Especialidad</th>
    </tr>
  </thead>
  <tbody>
    @foreach($empleados as $empleado)
      <tr>
          <td>{{ $empleado->id }}</td>
          <td>{{ $empleado->nombre }}</td>
          <td>{{ $empleado->apellido }}</td>
          <td>{{ $empleado->edad }}</td>
          <td>{{ $empleado->tipoEmpleado->nombre }}</td>
          <td>{{ $empleado->TipoEspecialidad->getEspecialidad()->nombre }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection