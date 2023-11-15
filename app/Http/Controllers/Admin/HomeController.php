<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    public function __construct()
        {
            $this->middleware('admin');
        }

    public function home(){
        return view('admin.index');
    }

    public function profile(){
        $admin = Admin::where('id', 1)->first();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request, $id){
        try{
            // $admin = Admin::where('id', $id)->first();
            $admin = Admin::findOrFail($id);
            $admin->update([
                // 'image'=>$image_file ?? $users->image,
                'name'=> $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
            ]);
            // dd($admin);
            return back()->with('Success', 'Updated Successfull');
        }catch(\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('Error', 'Something went Wrong');
        }
    }

    public function validatepassword(Request  $request){
        $this->validate($request, [
            'current_password'=>['required', 'string'],
            'new_password'=>['required', 'string'],
        ]);
        # check for current password match
        $adminpassword = Admin::where('id', 1)->first();
        if (password_verify($request->current_password, $adminpassword->password)) {
            # if true
            if ($request->new_password == $request->Confirm_password) {
                # send otp to user email and the password in datebase
                session(['new_password'=> $request->new_password]);
                $adminpassword->update([
                    'password'=>Hash::make(session('new_password'))
                ]);
                // dd($adminpassword);
                return redirect(route('admin.profile-page'))->with('success', 'Password Change Successful');
            } else{
                return back()->with('error', 'Error! Password Mismatch');
            }
        }else{
            return back()->with('error',  'Error! The password does not match the current password?');
        }
    }
}
