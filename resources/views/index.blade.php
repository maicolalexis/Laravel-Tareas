@extends('app')


@section('content')
<div class="container w-25 border p-4 mt-4 bg-light text-center">
    <!--en el action-->
    <form action="{{ route('tareas') }}" method="POST">
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
          <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">

        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
      </form>
      <div >
          @foreach($tareas as $tarea)
            <div class="row py-1 ">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('tareas-edit',['id' => $tarea->id]) }}" class="text-decoration-none">{{ $tarea->title }}</a>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('tareas-destroy', [$tarea->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">eliminar</button>
                </div>
            </div>

          @endforeach
    </div>
</div>
<div>

@endsection
