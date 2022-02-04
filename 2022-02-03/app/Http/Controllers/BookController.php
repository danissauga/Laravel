<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use \Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $authors= Author::orderBy('name', 'asc')->get();;
        $sortCollumn = $request->sortCollumn;
        $sortOrder = $request->sortOrder;
        
        $tem_book = Book::all();
        $select_array = array_keys($tem_book->first()->getAttributes());
        
        if (empty($sortCollumn) || empty($sortOrder)) {
            $books = Book::all();
        } else {

            if($sortCollumn == "author_id") {
                $sortBool = true;
                if ($sortOrder == "asc") {
                    $sortBool = false;
                }
                $books = Book::get()->sortBy(function($query){
                return $query->getAuthor->name;
                },SORT_REGULAR,$sortBool)->all();

            }

            $books = Book::orderBy($sortCollumn, $sortOrder)->get();
           
        
        }

   //    $select_array = array_keys($books->first()->getAttributes());
     // $select_array = array('athor_id');
       
                
       return view('book.index', ['books' => $books,'authors' => $authors, 'sortOrder'=> $sortOrder, 'sortCollumn' => $sortCollumn, 'select_array' => $select_array]);

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
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
    public function bookfilter(Request $request)
    {   
        // $author_id = $request->author_id;
        // $books = Book::where('author_id', '=', $author_id)->get();
        // return view('book.bookfilter', ['books' => $books]);
       // dd($request->author_id);
        $author_id = $request->author_id;
        $books = Book::where('author_id', '=' , $author_id)->get();
        return view('book.bookfilter', ['books' =>$books]);
   

    }
}
