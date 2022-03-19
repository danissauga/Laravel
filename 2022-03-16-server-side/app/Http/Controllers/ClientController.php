<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $scrf = '1234'; //&& $scrf == "123456789"

        if (isset($scrf) && !empty($scrf) ) {
            $clients = Client::paginate(15);
            return response()->json($clients); 
        } else {
            return response()->json(
                array(
                    'error' => 'Autentificatio fall')
                ); 
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
        
        // $client = Client::create([
        //     'name' => $request->client_name,
        //     'surname' => $request->client_surname,
        //     'description' => $request->client_description,
        // ]);

        $client->name = $request->client_name;
        $client->surname = $request->client_surname;
        $client->description = $request->client_description;

        $client->save();

        return response()->json(array(
            'success' => 'Clint added',
            'name' => $client->name,
            'surename' => $client->surname,
        ));
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
