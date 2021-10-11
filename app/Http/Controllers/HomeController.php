<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Http\Requests\attedenceRequest;
use App\Models\Employees;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = Employees::all();
        return view('frontend.home.index', compact('employees'));
    }
    public function create( attedenceRequest $req)
    {
        // $arr = get_defined_vars();
        // dd($arr);
        $c = new Attendance;
        $c->nik      = $req->nik;        
        $c->date_time     = date('Y-m-d H:i:s', strtotime('now'));
        $c->in_out     = date('Y-m-d H:i:s', strtotime('now')); 

        if($c->save())
        {
            $alert_toast = 
            [
                'title' => 'Operation Successful : ',
                'text'  => 'Attendance Successfully Added.',
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
        return redirect()->route('home');
    }
}
