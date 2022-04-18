<?php
use App\Http\Controllers\tareasController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/todos', function () {
    return view('index');
});
Route::get('/todos', [tareasController::class,'index'])->name('tareas');
Route::post('/todos', [tareasController::class,'store'])->name('tareas');


Route::get('/todos/{id}', [tareasController::class,'show'])->name('tareas-edit');
Route::patch('/todos/{id}', [tareasController::class,'update'])->name('tareas-update');
Route::delete('/todos/{id}', [tareasController::class,'destroy'])->name('tareas-destroy');

