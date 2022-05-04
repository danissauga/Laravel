<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::sortable()->paginate(10);
        return view('restaurant.index', ['restaurants'=>$restaurants]); 
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
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }
    public function showAjax(Restaurant $restaurant)
    {
        $restaurant_array = array(
                'successMessage' => "Restaurant show succesfuly",
                'restaurantId' => $restaurant->id,
                'restaurantTitle' => $restaurant->title,
                'restaurantTablesCount' => $restaurant->tables_count,
                'restaurantWorkTimeFrom' => $restaurant->work_time_from,
                'restaurantWorkTimeTill' => $restaurant->work_time_till,
        );
        $json_response =response()->json($restaurant_array);
        return $json_response;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }
    public function updateAjax(Request $request, Restaurant $restaurant)
    {

        $input = [
            'input_edit_restaurant_title'=> $request->restaurant_title,
            'input_edit_restaurant_tables_count'=> $request->restaurant_tables_count,
            'input_edit_restaurant_work_time_from'=> $request->restaurant_work_time_from,
            'input_edit_restaurant_work_time_till'=> $request->restaurant_work_time_till,
        ];

        $rules = [
            'input_edit_restaurant_title'=> 'required',
            'input_edit_restaurant_tables_count'=> 'required|integer|min:1',
            'input_edit_restaurant_work_time_from'=> 'required|date_format:H:i',
            'input_edit_restaurant_work_time_till'=> 'required|date_format:H:i|after:input_edit_restaurant_work_time_from',
        ];

        $messages = [
            'required' => "This field is required",
            'integer|min:1' => "Just integer value Min 1",
            'min' => "Min value :min",
            'date_format' => "Invalid From date format :date_format",
            'after' => "Invalid time, :after set before From time", 
        ];


        $validator = Validator::make($input, $rules, $messages); 

        //tikrina ar validatorius nepraejo
        if($validator->fails()) {

            $errors = $validator->messages()->get('*'); //pasiima visu ivykusiu klaidu sarasa
            $restaurant_array = array(
                'errorMessage' => "Validator fails",
                'errors' => $errors
            );
        } else {

        $restaurant->title = $request->edit_restaurant_title;
        $restaurant->description = $request->edit_restaurant_description;
        $restaurant->type_id = $request->edit_restaurant_type_id;
        $restaurant->save();

        $restaurant_array = array(
            'successMessage' => "restaurant". $restaurant->title ." updated succesfuly",
            'restaurantId' => $restaurant->id,
            'restaurantTypeId' => $restaurant->type_id,
            'restaurantTypeTitle' => $restaurant->restaurantHasType->title,
            'restaurantTitle' => $restaurant->title,
            'restaurantDescription' => $restaurant->description,
        );
    }

        $json_response = response()->json($restaurant_array);
        return $json_response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
       //
    }
    public function destroyAjax(Restaurant $restaurant)
    {
       // $type_count = count($article->articleHasTypes);
        // dd($type_count);
      //   if ($type_count == 0) {
             $restaurant->delete();
        /*      $feedback_array = array(
                 'successMessage' => "Article deleted successfuly". $article->id,
             );
         } else {
 
             $feedback_array = array(
                 'errorMessage' => "Acticle has type and can`t by delete". $article->id,
             );
         } */
         $feedback_array = array(
            'successMessage' => "Restaurant(s) deleted successfuly". $restaurant->id,
        );
         $json_response = response()->json($feedback_array);
         return $json_response;
    }

    public function searchAjax(Request $request) {

        $searchValue = $request->searchValue;

        if ($searchValue == '') {
            $restaurants = DB::table('restaurants')->get();
        }
        else {

        $restaurants = DB::table('restaurants')
        ->where('title', 'like', "%{$searchValue}%")
        ->orWhere('tables_count', 'like', "%{$searchValue}%")
        ->orWhere('work_time_from', 'like', "%{$searchValue}%")
        ->orWhere('work_time_till', 'like', "%{$searchValue}%")
        ->get();

        }

        if(count($restaurants) > 0) {
            $restaurants_array = array(
                'restaurants' => $restaurants
            );
        } else {
            $restaurants_array = array(
                'errorMessage' => 'No restaurants found'
            );
        }

        $json_response =response()->json($restaurants_array);
        return $json_response;

    }
}
