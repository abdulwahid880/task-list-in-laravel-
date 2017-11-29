<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
          return view('tasks',[
           'tasks'=>$request->user()->tasks()->orderBy('created_at' , 'asc')->get(),
            ]);
    }

   public function store(Request $request){
         $this->validate($request,[
               'name' => 'required|max:255',
          ]);
         
         $request->user()->tasks()->create([
            'name'=> $request->name,
          ]);
         return redirect()->route('tasks.index');
   }
   public function destroy(Request $request , Task $task){
       if($task->user_id != $request->user()->id){
          abort(401);
       }
   	    $task->delete();

        return redirect()->route('tasks.index');
   }
}
