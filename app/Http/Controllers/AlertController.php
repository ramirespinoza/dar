<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use DefStudio\Telegraph\Models\TelegraphChat;

class AlertController extends Controller
{


    public function newAlert(Request $request){
        //New alert function

        //$request->user()->id;


        try {
            $this->validate($request, [
                'message_id' => 'required',
                'token' => 'required',
                ]);

                $user = User::where('password', '=', $request->token)->first();

                $chat = TelegraphChat::where('chat_id', '=', $user->chat_id)->first();

                $alert = new Alert();
                $alert->message_id = $request->get('message_id');
                $alert->user_chat_id   = $user->chat_id;
                $alert->save();

                if($alert->message_id == "1") {
                    $chat->html(
                        "<strong>Vibración detectada:</strong>\n\nFecha y hora: $alert->created_at \n"
                    )->send();
                } else {

                    $chat->html(
                        "<strong>Movimiento detectado:</strong>\n\nFecha y hora: $alert->created_at \n"
                    )->send();

                }

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
    public function index(Request $request)
    {

        $alerts = DB::table('alert')
            ->join('message','message.id','=', 'alert.message_id')
            ->join('users','users.chat_id','=', 'alert.user_chat_id')
            ->select('alert.*','message.message as message_id','users.username as user_chat_id')
            ->where('users.password', '=', $request->token)
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
