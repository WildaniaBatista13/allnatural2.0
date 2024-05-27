<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request,User $user): RedirectResponse
    {

        $data=$request->validated();

        $model = $user;

        if(data_get($data, 'image')){

            
            $disk = 'public';
            if($model->image!=''&&!is_null($model->image)){
                Storage::disk($disk)->delete($model->image);
            }
            

            // obtener el nombre del archivo sin la extension

            $file=data_get($data, 'image');

            $folder=Str::lower(class_basename(\App\Models\User::class));

            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

            // extension

            $extension = $file->getClientOriginalExtension();

            // se agrega el tiempo al nombre del archivo

            $filename = $filename.'-'.time().'.'.$extension;

            // subir archivo

            $image= $file->storeAs($folder,$filename,$disk);

            data_set(
                $data,
                'image',
                $image,
            );
        }
        //dd($data);
        $request->user()->fill($data);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        


        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function admin_destroy(User $user,$ruta=null)
    {
        $user->delete();
        
        $redirect=null;

        if($ruta!=null&&$ruta!=''){
            $redirect=$ruta;
        }

        return redirect()->route('user.admin.index',['user'=>$redirect]);
    }
}
