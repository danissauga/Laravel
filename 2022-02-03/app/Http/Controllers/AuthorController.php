<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

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
        //$authors = Author::all(); //surusiuota didėjimo tvarka
       /// $authors = Author::sort(); tas pat kas all()

        //true -- Mazejimo tvarka
        //False -- didejimo tvarka.

        //$authors = Author::all()->sortBy('name', SORT_REGULAR, false);
        
        if (empty($sortCollumn) || empty($sortOrder)) {
            $authors = Author::all();
        } else {
            $authors = Author::orderBy($sortCollumn, $sortOrder)->get();
        }
       // DB::select('SHOW TABLES');

       $select_array = DB::getSchemaBuilder()->getColumnListing('authors');
       array_slice($select_array, 1, -2);
      

        // $select_array = array(
        //     'id',
        //     'name',
        //     'surename',
        //     'username',
        //     'description'
        // );
       // $author = $authors->first();
        // $author =(array) $author;
        // $author=array_keys($author);
        // foreach ($author as $aut => $key) {

        // }

                
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
}
