<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Type;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $companys = Company::all();
            return view('companys.index',['companys' => $companys]); // clients/index.blade.php
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $types = Type::all();
        return view('companys.create', ['types'=>$types]);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->company_name;
        $company->type_id = $request->company_type;
        $company->description = $request->company_description;
        
        $company->save();
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companys.show',['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {   
        $types = Type::all();
        return view('companys.edit',['company'=>$company, 'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->company_name;
        $company->type_id = $request->company_type;
        $company->description = $request->company_description;
        
        $company->save();
       
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //Gaunam kompanijai priklausancius klientus
        //juos suskaiciuoti
        //ar ju yra ar nera

        $clients = $company->companyClients;
        
        if (count($clients) != 0) {
            return redirect()->route('company.index')->with('error_message','Delete is not possible because company has clients');
        }

        $company->delete();
            return redirect()->route('company.index')->with('success_message','Record removed success!');
    }
}
