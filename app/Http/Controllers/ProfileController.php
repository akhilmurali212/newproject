<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(){

        $user = Auth::user();
        $data = array(
            'user' => $user,
        );
        return view('User.Profile.profile',$data);
    }

    public function edit($id){

        
            $user = User::FindOrFail($id);
            $data = array(
                'user' => $user,
            );
            return view('User.Profile.edit',$data);
        

    }

    public function update($id,Request $request){
        $validation = Validator::make($request->all() ,
        [
            'name'=> 'min:3|max:15',
            'phone'=> 'nullable|numeric',
            'empimage'=> 'nullable|mimes:jpeg,jpg,png',
            
        ],[
            'name.required'=> 'Please enter a Name',
            'phone.numeric'=> 'Please enter a Numeric Value',
            'empimage.mimes'=> 'Please upload an image file',
        ]);
        if($validation->passes()){

            $user = User::FindOrFail($id);
            $id = $user->registerid;
            $main_image_src = $user->image;
            $user->name = $request->name;
            $user->phone = $request->phone;
            if($image = $request->empimage){
                $extension = $image->extension();
                $image_path = public_path('image/dp');
                $main_image_src = "/image/dp/" . $id . "." . $extension;
                $image->move($image_path , $main_image_src);
                $user->image = $main_image_src;
            }

            $user->update();
            return redirect()->route('profile')->with(['msg' => 'Profile Updated !']);
        }else{
            return redirect()->route('profile.edit',$id)->withErrors($validation->errors())->withInput();
        }
    }
}
