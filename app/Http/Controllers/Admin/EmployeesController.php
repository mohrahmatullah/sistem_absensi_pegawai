<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeRequest;
use App\Http\Requests\EmployeEditRequest;
use App\Models\Employees;
use App\Models\Company;
use Session;
use Mail;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employees::paginate(10);
        $company = Company::all();
        // $arr = get_defined_vars();
        // dd($arr);
        return view('admin.employees.index', compact('employees','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();
        return view('admin.employees.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        $employees = new Employees;

        $employees->nik      = $request->nik;
        $employees->first_name      = $request->first_name;
        $employees->last_name     = $request->last_name;
        $employees->company_id  = $request->company_id;
        $employees->email     = $request->email;
        $employees->phone  = $request->phone;
        $employees->address      = $request->address;
        

        if($employees->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Employees Successfully Added.',
                'type'  => 'success',
            ];
            /*Send email message*/
            Mail::send('admin.partials.applyer',
                array(
                   'first_name' => $request->first_name,
                   'last_name' => $request->last_name,
                   'company_id' => $request->company_id,
                   'email' => $request->email,
                   'phone' => $request->phone
               ), function ($msg) use ($request)
                {                                                 
                      $msg->subject("New Employees".' | '.$request->first_name.' - '.$request->last_name);
                      $msg->from('rahmatfitri104@gmail.com');
                      $msg->to('rahmetuloh@gmail.com', 'Admin');
                });
            /* \Send email message*/

            
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Occurred While Adding a User.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.employees.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(EmployeEditRequest $request)
    {
        $employees = Employees::findOrFail($request->id);

        $employees->nik      = $request->nik;
        $employees->first_name      = $request->first_name;
        $employees->last_name     = $request->last_name;
        $employees->company_id  = $request->company_id;
        $employees->email     = $request->email;
        $employees->phone  = $request->phone;
        $employees->address      = $request->address;

        if($employees->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Employees Successfully Updated.',
                'type'  => 'success',
            ];
        }
        else
        {
            $alert_toast = 
            [
                'title' => 'Operation Failed : ',
                'text'  => 'A Problem Update The User.',
                'type'  => 'danger',
            ];
        }

        Session::flash('alert_toast', $alert_toast);
        return redirect()->route('admin.employees.index');
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
