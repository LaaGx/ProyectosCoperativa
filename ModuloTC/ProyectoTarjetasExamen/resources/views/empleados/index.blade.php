
@extends('layouts.app')

@section('content')

<div class="container">

<!--Si existe la variable mensaje o tiene informacion simplemente imprime y se mostrara un mensaje. -->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{Session::get('Mensaje')}}
</div>

@endif

<br/>
<a href="{{ url('empleados/create') }}" class="btn btn-success">Agregar Empleado</a>
<br/>
<br/>
<table class="table table-light table-hover" >

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

        @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            <!--Muestra la ruta original ponle / y muestrame el producto de esta foto. -->
            <img src="{{ asset('storage').'/'.$empleado->Foto}}" class="img-thumbnail img-fluid" alt="" width="80">           
            </td>
            <td>{{ $empleado->Nombre}} {{ $empleado->ApellidoPaterno}} {{ $empleado->ApellidoMaterno}} </td>
            <td>{{ $empleado->Correo}}</td>
            <td>
            <a class="btn btn-primary"  href="{{ url('/empleados/'.$empleado->id.'/edit') }}">Editar
            </a>
        
            
            <!-- Url para borrar y enviar el dato id unico--> 
            <form method="post" action="{{ url('/empleados/'.$empleado->id) }}" style="display:inline">
           <!-- Cada vez que se envia un formulario se genera un token.--> 
            {{csrf_field()}}
            <!-- Tipo de solicitud que se realizara--> 
            {{method_field('DELETE')}}
            <!-- Notificacion de confirmacion de borrado.--> 
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')" >Borrar</button>
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$empleados->links()}}
</div>
@endsection
