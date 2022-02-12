<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
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

        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;

        $tem_task = Task::all();
        $select_array = array_keys($tem_task->first()->getAttributes());

        if (empty($sortCollumn) || empty($sortOrder)) {
            $tasks = Task::all();
        }
        else {

            if($sortCollumn == "category_id") {
                $sortBool = true;
                if ($sortOrder == "asc") {
                    $sortBool = false;
                }
                $tasks = Task::get()->sortBy(function($query){
                    return $query->getTaskStatus->title;
                    },SORT_REGULAR,$sortBool)->all();
            }
            $tasks = Task::orderBy($sortCollumn, $sortOrder)->get();
        }
       // $tasks = Task::all();    
        return view('task.index',['tasks' => $tasks, 'sortCollumn'=>$sortCollumn, 'sortOrder'=> $sortOrder, 'select_array'=>$select_array]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
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
