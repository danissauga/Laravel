<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\PaginationSetting;
use App\Models\Task;
use Illuminate\Http\Request;

class OwnerController extends Controller
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

        $task = $request->allTasks;
        $allTasks = Task::all();

        $paginate = $request->paginateSetting;

    if (empty($paginate)) {
        $defaultPaginate = PaginationSetting::where('default_value', '=' , 1)->first();
        $paginate = $defaultPaginate->value;
    }
        $paginationSettings = PaginationSetting::where('visible', '=' , 1)->get();

        $tem_owner = Owner::all();
        $select_array = array_keys($tem_owner->first()->getAttributes());

        if (($task == 'all') || (empty($task))) {
            if ($paginate == 'all') {
                $owners = Owner::sortable()->get();
            }
            else {
                $owners = Owner::sortable()->paginate($paginate);
            }
        }
        else {
            if ($paginate == 'all') {
            $owners = Owner::where('owner_id','=',$task)
            ->sortable()->get(); }
            else {
                $owners = Owner::where('owner_id','=',$task)
            ->sortable()->paginate($paginate);
            }
        }

        return view('owner.index',
        ['owners'=>$owners,
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
    public function create()
    {
        return view('owner.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "newOwnerName" => "required|min:2|max:15|alpha",
            "newOwnerSurename" => "required|min:2|max:15|alpha",
            "newOwnerEmail" => "required|email:rfc,dns",
            "newOwnerPhone" => ['required','max:12','regex:/(86|\+3706)\d{7}/'],
        ]);


        $owner = new Owner;
        $owner->name = $request->newOwnerName;
        $owner->surename = $request->newOwnerSurename;
        $owner->email = $request->newOwnerEmail;
        $owner->phone = $request->newOwnerPhone;

       
        $owner->save();

        return redirect()->route('owner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit',['owner'=>$owner]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            "newOwnerName" => "required|min:2|max:15|alpha",
            "newOwnerSurename" => "required|min:2|max:15|alpha",
            "newOwnerEmail" => "required|email:rfc,dns",
            "newOwnerPhone" => ['required','max:12','regex:/(86|\+3706)\d{7}/'],
        ]);

        $owner->name = $request->newOwnerName;
        $owner->surename = $request->newOwnerSurename;
        $owner->email = $request->newOwnerEmail;
        $owner->phone = $request->newOwnerPhone;

        $owner->save();

        return redirect()->route('owner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
}
