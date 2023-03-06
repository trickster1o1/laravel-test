<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::get();
        return view('pages/company',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages/create',['type'=>'company','action'=>'create']);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        //
        $c = Company::create($request->input());
        
        $logo = $request->file('logo')->store('companyLogos/','public');
        $c->update([
            'logo'=>$logo,
        ]);

        dd('finished');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = Company::where('id',$id)->first();
        return view('pages/create',['type'=>'company','action'=>'update','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        //
        $data = Company::where('id',$id)->first();
        $data->update($request->input());
        if($request->file('logo') != null && $request->file('logo') != $data->logo) {
            if($data->logo != null) {
                if(file_exists('storage/'.$data->logo)){
                    unlink('storage/'.$data->logo);
                }
            }
            $logo = $request->file('logo')->store('companyLogos/','public');


        }else {
            $logo = $data->logo;
        }
        $data->update(['logo'=>$logo]);
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
