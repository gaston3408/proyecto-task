<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Validator;
//se pone para usar el Validator 

class TaskController extends Controller
{
    //public function nombredelmetodo()  el nombre puede ser cualquiera
     public function index(){
         //variable con array
         //$tasks =
         //[
        //    [
         //    'id'=>1,
         //    'name'=>'practicar',
         //    'description'=>'practicar todos los dias',
         //   ] ,
         //[
         //    'id'=>2,
         //'name'=>'estudiar',
         //'description'=>'estudiar mucho',
       // ],
         // [
          //   'id'=>3,
           //  'name'=>'dormir',
           //  'description'=>'zzzzzz',
          //],
         //];
         //$task = $tasks[$id -1] ;
         //lo transforma tasks en un array
         $tasks = Task::get();
         return response()->json( ['tasks'=> $tasks ], 200);

     }
       //Request recibe algo de la url. lo convierte en variable $request.
       
       //request es lo q esta guardado en el post.
     public function store(Request $request){
        $validator = Validator::make($request->all(),[
          //request all ..nos trae toda la informacion del post.
            'name'=>'required|unique:tasks'
        ]);
        if ($validator->fails()){
           return response()->json(['error'=>$validator->errors()],422);//el 422 se agrega por el tipo de error q aparece en el postman.
        }
        //se crea una nueva tarea..
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request ->description;
        $task->priority = $request->priority;
        $task->status = $request->status;

        $task->save();

        return response()->json(['task'=> $task]);

         //return $request['descrption'];
         //$taskName=$request['name'];
         //if si existe taskName hace algo.
         //if(!isset($taskName)){
           //  return 'debe incluir un nombre'; }
     }
    public function show($id){
       $task = Task::find($id);
       //isset se usa si tiene asignado algo task ; si existe task.
       //de lo contrario !isset ..se usa si no tiene nada asignado.
       if(!isset($task)){
           return response()->json(['message'=>'Task not finded']);
       }
       //$task = Task::where('id',$id)->get();   //where (lo que filtro , el parametro)y despues get();
       //es igual que lo de find.

       return response()->json(['task'=> $task]);

    }
    public function update($id){
        $task = $id;
       return response()->json(['task'=> $task]);
    }


    //
}
