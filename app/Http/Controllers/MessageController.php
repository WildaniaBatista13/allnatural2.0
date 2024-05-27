<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function index($type=null){
        
        if($type=='admin'){

            $messages=Message::all();

            return view('admin.messages',compact('messages'));
        }else{
            return view('contact');
        }

    }

    public function store(Request $request)
    {
        //
        
        $request=$request->all();

        $request['user_id']=Auth::user()->id;

        Message::create($request);

        return redirect()->route('message.index',['type'=>'user']);
    }

    public function destroy(Message $message)
    {
        //dd($message->delete());
        $message->delete();

        return redirect()->route('message.admin.index',['type'=>'admin']);
    }
}
