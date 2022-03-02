<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Owner;
use App\Models\PaginationSetting;
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
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
