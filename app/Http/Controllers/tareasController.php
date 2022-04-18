<?php

namespace App\Http\Controllers;
use App\Models\tarea;
use Illuminate\Http\Request;


class tareasController extends Controller
{
    //funcion que pide una peticion
    public function store(request $request){
        //si la peticion enviada al validarla es lo que se pide
        $request->validate(['title' => 'required|min:3']);
        //crea un instancia de el modelo tarea
        $tareas = new Tarea();
        //agrega lo que se valido en el request a el modelo
        $tareas->title = $request->title;
        //guarda
        $tareas->save();
        //redirecciona a rutas con un success que lo estaremos usando en el index.blade.php
        return redirect()->route('tareas')->with('success', 'Tarea creada correctamente');
    }

    public function index(){
        $tareas = Tarea::all();
        return view('index', ['tareas' => $tareas]);
    }
    public function show($id){
        $tareas = Tarea::find($id);
        return view('show', ['tareas' => $tareas]);
    }
    public function update(request $request, $id){

        $tarea = Tarea::find($id);
        $tarea->title = $request->title;
        $tarea->save();

        return redirect()->route('tareas')->with('success', 'Tarea actualizada correctamente');

    }
    public function destroy($id){
        $tareas = Tarea::find($id);
        $tareas->delete();
        return redirect()->route('tareas')->with('success', 'Tarea ha sido eliminada correctamente!');

    }

}
