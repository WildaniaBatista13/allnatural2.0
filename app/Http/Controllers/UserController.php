<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(Request $request,$type=null)
    {
        if($type==null){
            $users=User::all();
        }else{
            $users=User::where('user_type',$type)->get();
        }
        

        return view('admin.users',compact('users'));
    }
}
