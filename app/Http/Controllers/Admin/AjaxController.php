<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
    public function selectedItemDeleteById( Request $request ){
        $input = $request->all();
        
        if($input['data']['id'] && $input['data']['track']){
            if($input['data']['track'] == 'employees_list'){
                if(Employees::where('id', $input['data']['id'])->delete()){
                    return response()->json(array('delete' => true));
                }
            }
            if($input['data']['track'] == 'company_list'){
                if(Company::where('id', $input['data']['id'])->delete()){
                    return response()->json(array('delete' => true));
                }
            }

        }
    }

    public function selectedItemEditById( Request $request ){
        $input = $request->all();
        
        if($input['data']['id'] && $input['data']['track']){
            if($input['data']['track'] == 'employees_list'){
                $data = Employees::where('id', $input['data']['id'])->first();
                return response()->json($data);
            }
            if($input['data']['track'] == 'company_list'){
                $data = Company::where('id', $input['data']['id'])->first();
                return response()->json($data);
            }

        }
    }

    public function saveAllImage(Request $request){

        $cover = $request->covergal_picture;
        $extension = $cover->getClientOriginalExtension();
        $upload_success = Storage::disk('local')->put($cover->getClientOriginalName(),  File::get($cover));

        if ($upload_success) {
            return response()->json(array('status' => 'success', 'name' => $cover->getClientOriginalName() ));
        } else {
            return Response::json('error', 400);
        }

  }
}
