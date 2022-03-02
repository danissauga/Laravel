<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Owner;
use App\Models\PaginationSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sortCollumn = $request->sort;
        $sortOrder = $request->direction;
        
        $paginate = $request->paginateSetting;

       

    if (empty($paginate)) {
        $defaultPaginate = PaginationSetting::where('default_value', '=' , 1)->first();
        $paginate = $defaultPaginate->value;
    }
        $paginationSettings = PaginationSetting::where('visible', '=' , 1)->get();

        $tem_task = Task::all();
        $select_array = array_keys($tem_task->first()->getAttributes());
           
        if ($paginate == 1) {
                $tasks = Task::sortable()->get();
            }
            else {
                $tasks = Task::sortable()->paginate($paginate);
        }
         
        return view('task.index',
        ['tasks'=>$tasks,
        'select_array'=>$select_array,  
        'paginationSettings'=>$paginationSettings,
        'paginateSetting'=>$paginate,
        'sort'=>$sortCollumn,
        'direction'=> $sortOrder
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tasksCount = $request->tasksCount;

        if(!$tasksCount) {
            $tasksCount = 1;
        }  

        $owners = Owner::all();

        return view("task.create", ['tasksCount' => $tasksCount, 'owners'=>$owners]);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            "taskTitle.*.title" => "required|alpha|min:6|max:255",
            "taskDescription.*.description" => "required|max:1500",
            "taskStart_date.*.start_date" => "required|date|before:taskEnd_date.*.end_date", 
            "taskEnd_date.*.end_date" => "required|date",
            "taskOwnerId.*.owner_id" => "required|gt:0",
            "taskLogo.*.logo" => "required|image"
        ]);
        $tasksCount = count($request->taskTitle);

    //dd($request->taskOwnerId);
    
        for($i=0; $i< $tasksCount; $i++ ) {
            $task = new Task;
            $task->title = $request->taskTitle[$i]['title'];
            $task->description = $request->taskDescription[$i]['description'];
            $task->start_date = $request->taskStart_date[$i]['start_date'];
            $task->end_date = $request->taskEnd_date[$i]['end_date'];
            $imageName = 'file_'.time().'.'.$request->taskLogo[$i]['logo']->extension();
            $request->taskLogo[$i]['logo']->move(public_path('images'), $imageName);
            $task->logo = $imageName;
            $task->owner_id = $request->taskOwnerId[$i]['owner_id'];
            $task->save(); 
        }
    
    
   return redirect()->route('task.index');;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $owners = Owner::all();
        return view('task.edit',['owners' => $owners, 'task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
             "taskTitle" => "required|alpha|min:6|max:255",
             "taskDescription" => "required|max:1500",
             "taskStart_date" => "required|date|before:taskEnd_date", 
             "taskEnd_date" => "required|date",
             "taskOwnerId" => "required|gt:0",
         ]);

        //dd($request->taskOwnerId);
        
        
        $task->title = $request->taskTitle;
        $task->description = $request->taskDescription;
        $task->start_date = $request->taskStart_date;
        $task->end_date = $request->taskEnd_date;
   
        if ($request->taskLogo != "") { 
            $request->validate([
                "taskLogo" => "required|image"
            ]);
                $file_path = public_path("images/".$request->oldLogo); 
            
                if(File::exists($file_path)) File::delete($file_path);

            $imageName = 'file_'.time().'.'.$request->taskLogo->extension();
            $request->taskLogo->move(public_path('images'), $imageName);
            $task->logo = $imageName;
        }
        $task->owner_id = $request->taskOwnerId;
        $task->save(); 
     
   return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
