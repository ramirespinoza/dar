<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class AlertController extends Controller
{


    public function newAlert(Request $request){
        //New alert function

        //$request->user()->id;
       

        try {
            $this->validate($request, [
                'message' => 'required',
                'token' => 'required',
                ]);

                $alert = new Alert();
                $alert->message = $request->get('message');
                $alert->token   = $request->get('token');
                $alert->save();

                return response()->json([
                    'customer' => $request->all(),
                    'operation' => 'create',
                    'status' => 'success',
                    'code' => '1'
                ]);
                
        } catch (\Throwable $th) {
        
            return response()->json([
            'customer' => $request->all(),
            'operation' => 'create',
            'status' => 'failed',
            'code' => '0'
            ]);
        }

        
        
    }
    public function index()
    {
        return view('alert');
    }



    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        //
    }



    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
