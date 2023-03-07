<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::paginate(5);
        return view('pages.employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = Company::get();
        return view('pages/create',['type'=>'employee','action'=>'create', 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        //
        $c = Company::where('id',$request->company)->first();
        if(!$c) {
            return redirect()->route('employee.create');
        }
        $c->employee()->create($request->input());
        return redirect()->route('employee.index');
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
        $data = Employee::where('id',$id)->first();
        $companies = Company::get();
        return view('pages/create',compact('companies')+['type'=>'employee','action'=>'update','data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        //
        $emp = Employee::where('id',$id)->first();
        $emp->update($request->input());
        $emp->update(['company_id'=>$request->company]);
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $emp = Employee::where('id',$id)->first();
        $emp->delete();
        return redirect()->route('employee.index');
    }
}
