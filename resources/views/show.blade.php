@extends('app')


@section('content')
<div class="container w-25 border p-4 mt-4 bg-light text-center">
    <!--en el action-->
    <form action="{{ route('tareas-update', ['id' => $tareas->id]) }}" method="POST">
        @method('PATCH')
        <!--csrf es una directiva es para temas de seguridad -->
        @csrf
        <!--Condicional que si la session es success me mande una alerta-->
        @if (session('success'))
        <h6 class="alert alert-success"> {{session('success')}}</h6>
        @endif
        <!--error si el campo esta vacio que me mande un mensaje-->
        @error('title')
        <h6 class="alert alert-danger"> {{$message}}</h6>
        @enderror





        <div class="mb-3">
          <label for="title" class="form-label">Titulo de la tarea</label>
          <input type="text" value="{{ $tareas->title }}" name="title" class="form-control" id="title" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">

        <button type="submit" class="btn btn-primary">Editar Tarea</button>
      </form>

</div>
<div>

@endsection
