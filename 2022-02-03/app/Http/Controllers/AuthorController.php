<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;
//use \Illuminate\Support\Facades\DB;

class AuthorController extends Controller
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
        $recordPerPage = $request->recordsPerPage;
        $search_key = $request->search_key;
        if (empty($sortCollumn) || empty($sortOrder)) {
            $authors =Author::paginate($recordPerPage);
        } else {
            $authors = Author::where('description','like','%'.$search_key.'%')
            ->orWhere('name', 'like', '%'.$search_key.'%')  
            ->orWhere('surename', 'like', '%'.$search_key.'%') 
            ->orWhere('username', 'like', '%'.$search_key.'%') 
            ->orWhere('id', 'like', '%'.$search_key.'%')
            ->orderBy($sortCollumn, $sortOrder)
            ->paginate($recordPerPage);
        }
       $select_array = array_keys($authors->first()->getAttributes());
                
       return view('author.index', ['authors' => $authors, 'sortOrder'=> $sortOrder, 'sortCollumn' => $sortCollumn, 'select_array' => $select_array]);

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
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }

    /**
     * Searching function.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   
        $search_key = $request->search_key;
        $authors = Author::where('description','like','%'.$search_key.'%')
        ->orWhere('name', 'like', '%'.$search_key.'%')  
        ->orWhere('surename', 'like', '%'.$search_key.'%') 
        ->orWhere('username', 'like', '%'.$search_key.'%') 
        ->orWhere('id', 'like', '%'.$search_key.'%')              
        ->get();
        return view('author.search', ['authors' => $authors]);

    } 
}
