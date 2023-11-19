<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id){
        $detail = User::find($id);
        return view('users.profile',compact('detail'));
    }

    public function submitProfile(Request $request){
        $user = User::find($request->id);

        if ($request->hasFile('profileImage')) {
            $existingImage = $user->image;
            if ($existingImage) {
                // Delete the existing file
                $filePath = public_path('usersImage') . '/' . $existingImage;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        
            $image = $request->file('profileImage');
            $name = $user->name.'-Image' . time() . '.' . $image->getClientOriginalExtension();
            $result = public_path('usersImage');
            $image->move($result, $name);
            $user->image = $name;
        }
        
        $user->name = $request->firstName;
        $user->email = $request->email;
        $user->phone = $request->phoneNumber;
        $user->save();
        
        toast('Profile Updated!', 'success');
        return back();

    }

    public function changePassword(){
        return view('auth.changePassword');
    }

    public function submitPassword(Request $request){
        $user = User::where('email', Auth::user()->email)->first();
            try {
                // if (Hash::check($request->oldpassword, $user->password)) {
                    $user->password = Hash::make($request->newpassword);
                    $user->save();
                    Auth::logout();                    
                    Alert('Success','Password Changed Successfully !');
                    return redirect()->route('login')->with('success', 'Password changed successfully. Please log in again.');
                // } else {
                //     Alert('error','Old password not matched');
                //     return back();
                // }
            } catch (\Throwable $th) {
                Alert('error',$th);
                return back();
            }
            
    }
}
