<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssignedNotification;
use App\Notifications\TaskTerminedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Auth::User()->assign_task;
        return view('admin.task.index',[
            'tasks'=>$tasks,
        ]);
    }

    public function myTasks()
    {
        $tasks = Auth::user()->assigned_task;
        return view('admin.task.taskAssigned',[

            'tasks'=>$tasks,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {


        $request->validate([

            'name'=>['required','min:3'],
            'start_date'=>['required','date','after:tomorrow'],
            'due_date'=>['required','date','after:start_date'],
            'description'=>['required','min:5']

         ]);


         Task::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'due_date'=>$request->due_date,
            'user_created_by'=>Auth::user()->id,
            'user_assigned_to'=>'3',
         ]);

         return redirect()->route('tasks.index')->with('success','Nouvelle tâche crée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $user = User::findOrFail(Auth::user()->id);

        $notifications = $user->notifications()->where(function($query) use($task){

                     $query->where('data->task_id',$task->id)
                           ->where('read_at', null);
        })->first() ;

        if($notifications)
        {
            $notifications->markAsRead();
        }
        return view('admin.task.taskAssignedView', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
         return view('admin.task.edit',[
            'task'=>$task,
         ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([

            'name'=>['required','min:3'],
            'start_date'=>['required','date','after:tomorrow'],
            'due_date'=>['required','date','after:start_date'],
            'description'=>['required','min:5']

         ]);


         $task->update($request->all());

         return redirect()->route('tasks.index')->with('success','Nouvelle tâche éditée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Task $task)
    {
       $task->delete();
       return redirect()->route('tasks.index')->with('success','Suppression de tâche éffectuée avec succès!');
    }


    public function assignedView(Task $task)
    {
     $users = User::whereDoesntHave('roles', function(Builder $query){
                 $query->whereIn('name',['admin','create']);
     })->get();

    if(Auth::user()->isAdmin())
    {
        $users = User::whereDoesntHave('roles', function(Builder $query)
    {
          $query->where('name','admin');
    })->get();
    }

    if(Auth::user()->isCreate())
    {
        $users = User::whereDoesntHave('roles', function(Builder $query)
    {
          $query->whereIn('name',['admin','create']);

    })

       ->where('service_id',Auth::User()->service_id)
       ->get();

    }

     return view('admin.task.assignedView',compact('task','users'));

    }



    public function assign(Request $request, Task $task)
    {
       $request->validate([
            'user_assigned_to'=>['required','exists:users,id']
       ]);

       $user_assigned_to = $request->user_assigned_to ;

       $user= User::findOrFail($user_assigned_to);

       $occuped = $user->assigned_task()->where(function(Builder $query) use($task){
          $query->where(function ($sub)
          {
            $sub->where('status','en cours')
            ->orWhere('status','en attente');

        })
        -> where('due_date','>',$task->start_date);
       })->exists();

    //    dd($occuped);

       if($occuped)
       {
        return redirect()->route('tasks.assignedView',['task'=>$task->id])->with('error',"L'utilisateur $user->name est déjà occupé pour cette période");
       }

        $task->user_assigned_to = $user_assigned_to;
        $task->status = 'en attente';
        $task->save();
        $user->notify(new TaskAssignedNotification($task));
       return redirect()->route('tasks.index')->with('success',"La tâche a bien été attribuée à l'utilisateur $user->name");


    }

    public function startTask(Task $task)
    {

        $task->status = 'en cours';
        $task->save();

        return redirect()->route('tasks.MyTask');


    }


    public function markAsTermined(Task $task)
    {
        $user= User::findOrFail($task->user_created_by);
        $task->status = 'terminée';
        $task->save();
        $user->notify(new TaskTerminedNotification($task));
        return redirect()->route('tasks.MyTask');


    }

    public function commentTask(Request $request,Task $task)
    {

        $request->validate([
         'comments'=>['required'],
        ]);
       $task->comments = $request->comments;
       $task->save();
       return redirect()->route('tasks.MyTask')->with('success',"Tâche commenté avec succès!");
    }



}
