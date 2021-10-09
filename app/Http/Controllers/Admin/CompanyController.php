<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Session;
use Illuminate\Support\Facades\Storage;
use File;
use App\Http\Requests\CompanyAddRequest;
use App\Http\Requests\CompanyEditRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::paginate(10);
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyAddRequest $request)
    {
        $c = new Company;

        // $cover = $request->file('logo');
        // $extension = $cover->getClientOriginalExtension();
        // Storage::disk('local')->put($cover->getClientOriginalName(),  File::get($cover));
        // $c->logo = $cover->getClientOriginalName();

        $c->name      = $request->name;
        $c->email     = $request->email;
        $c->logo      = $request->logo;
        $c->website     = $request->website;
        

        if($c->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Company Successfully Added.',
                'type'  => 'success',
            ];
            
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
        return redirect()->route('admin.company.index');
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
    public function update(CompanyEditRequest $request)
    {
        $c = Company::findOrFail($request->id);

        // $cover = $request->file('logo');
        // $extension = $cover->getClientOriginalExtension();
        // Storage::disk('local')->put($cover->getClientOriginalName(),  File::get($cover));
        // $c->logo = $cover->getClientOriginalName();

        $c->name      = $request->name;
        $c->email     = $request->email;        
        $c->logo      = $request->logo;
        $c->website     = $request->website;

        if($c->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Company Successfully Updated.',
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
        return redirect()->route('admin.company.index');
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
