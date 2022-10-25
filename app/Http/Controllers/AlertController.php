<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
