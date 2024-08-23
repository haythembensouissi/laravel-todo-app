<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Database\Eloquent\SoftDeletes;
class TasksController extends Controller
{
    use SoftDeletes;
    public function index(){
        $tasks=Task::orderBy('completed_at')->orderBy('id','DESC')->get();
        return view("tasks.index",[
            'tasks'=>
        $tasks
    ]);

    }
    public function create(){
        return view("tasks.create");
    }
    public function store(Request $request){
        $request->validate([
            'description' => 'required|max:255',
        ]);
     $task= Task::create([
        'description'=>request('description'),
        'completed_at'=>null
     ]);
     return redirect("/");
    }
    public function update($id){
        $task=Task::where('id',$id)->first();
        $task->completed_at=now();
        $task->save();
        return redirect("/");
    }
    public function delete($id){
        $task=Task::where('id',$id)->first();
        $task->delete();
        return redirect("/");
    }
}
