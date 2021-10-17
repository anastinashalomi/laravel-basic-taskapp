<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;  // model call

class TaskController extends Controller
{

    public function store(Request $request){  //form request karana data tika $request kiyana object ekata danawa
         //dd($request->all());

         //create object related modle Task

         $task=new Task; // task object ekata DB hama field ekakma access kalanna pulywan
         
         // validation task in form 
         $this->validate($request,[
             'task'=>'required|max:100|min:5',
         ]);
         
         $task->task=$request->task; // do db task == form task value
         $task->save();    //db save
 
         $data=Task::all(); // Task modle (db table data) put to data variable (db data get in to variable call data)
         return view('task')->with('tasks1',$data); // task view return with 'view' variable which attach the dataset of data variable 
         
         //dd($data);
         //return redirect()->back(); // return to back same page

    }


    // function for update the iscompleted fiel when mark as completed clicked
    public function updatetaskascompleted($id){

        $newtask=Task::find($id);
        $newtask->iscompleted=1;
        $newtask->save();
        return redirect()-> back();

    }

    // fuction for update markasnotcompleted to markascompleted
    public function updatetaskasnotcompleted($id){

        $newtask=Task::find($id);
        $newtask->iscompleted=0;
        $newtask->save();
        return redirect()-> back();

    }

    // function for delete task
    public function delete($id){

        $newtask=Task::find($id);
        $newtask->delete();
        return redirect()-> back();

    }

    // function for updatetask
    public function updatetaskview($id){
       
       $newtask=Task::find($id);
       return view('updatetaskview')-> with('taskdata',$newtask); 
    }

    //function for update task value get in to display
    public function updatenew(Request $request){ //1st front eke task eka requst variable ekatada gannawa

        $this->validate($request,[
            'task'=>'required|max:100|min:5',
        ]);

        $id=$request->id;
        $task=$request->task;
        $newtask=Task::find($id);
        $newtask->task=$task;
        $newtask->save();
        $data=Task::all();
        return view('task')->with('tasks1',$data);
        
    }
    
}
