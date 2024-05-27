<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

use App\Traits\GeneratesPDFs;

class UserController extends Controller
{
    use GeneratesPDFs;
    //

    public function index(Request $request,$type=null)
    {
        $type=$type;
        
        if($type==null){
            $users=User::all();
        }else{
            $users=User::where('user_type',$type)->get();
        }
        
        return view('admin.users',compact('users','type'));
    }

    public function generatepdf($type=null){

        $type=$type;

        if($type!=null){
            $users = User::where('user_type',$type)->get();
        }else{
            $users = User::all();
        }
        
        

        $name = date('dmY').'_user.pdf';

        return $this->downloadPDF('plantillas.user', ['users' => $users,'type'=>$type], $name);
    }
}
