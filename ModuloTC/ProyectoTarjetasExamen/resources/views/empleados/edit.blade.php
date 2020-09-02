@extends('layouts.app')

@section('content')

<div class="container">

Seccion para editar empleados

<form action="{{ url('/empleados/' . $empleado->id) }}" method="post" enctype="multipart/form-data" >
{{ csrf_field() }}
<!-- Hacemos un metodo patch para acceder al metodo UPDATE. --> 
{{ method_field('PATCH')}}

@include('empleados.form', ['Modo'=>'edit'])


</form>
</div>
@endsection