<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

        $alerts = DB::table('alert')
            ->join('message','message.id','=', 'alert.message_id')
            ->join('users','users.chat_id','=', 'alert.user_chat_id')
            ->select('alert.*','message.message as message_id','users.name as user_chat_id')
            ->get();

        return view('alert', compact('alerts'));
    }



    public function create()
    {
        $alerts = Alert::all();
        return view('alert', compact('alerts'));
    }



    public function store(Request $request)
    {
        //
    }



    public function show($id)
    {

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
