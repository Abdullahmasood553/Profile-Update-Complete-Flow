<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Storage;
use URL;

class AuthController extends Controller
{

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function dashboard() {
        return view('dashboard');
    }


    public function save_register(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if($user) {
            return response()->json(['exists' => 'Email already exists']);
        } else {
            $user = new User;
            $user->fname = $request['fname'];
            $user->lname = $request['lname'];
            $user->email = $request['email'];
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return response()->json(['success' => 'Data Submitted Successfully']);
    }


    public function user_login(Request $request) {
        
  
        $validator = Validator::make($request->all(), [
             'email' => 'required|email',
             'password' => 'required',
         ]);
     
         if ($validator->passes()) {
             if (auth()->attempt(array('email' => $request->input('email'),
               'password' => $request->input('password')),true))
             {
                return response()->json(['success' => 'Successfully Logged In']);
             }
             return response()->json(['error' => ['email' => 'Sorry User not found.']
            ]);
         }
     
         return response()->json(['error'=> 'Something went wrong']);
    }

    public function get_update_profile() {
        return view('update_profile');
    }


    public function save_profile(Request $request) {

        if(User::whereRaw('email = "'.$request->email.'" and id != '.Auth::user()->id)->first()){
            echo 301;
            die;
        }
        
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('profile_pic')) {
            
            $completeFileName = $request->file('profile_pic')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('profile_pic')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
            $path = $request->file('profile_pic')->storeAs('public/users', $compPic);
            $user->profile_pic = 'users/'.$compPic;
        }

        
        $user->fname        = $request->fname;
        $user->lname        = $request->lname;
        $user->email        = $request->email;
     

        if($user->save()){
            echo 200;
        }else{
            echo 700;
        }
    }
    
    public function UpdatePassword(Request $req) {
        if(!Hash::check($req->current_password, Auth::user()->password)){
            echo 301;die;
        }
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($req->new_password);
        $user->save();
        echo 200;
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }    
      
      public function deleteProfilePicture(Request $request) {
        $user = Auth()->user();
        if ($user) {
            if ($user->profile_pic && Storage::exists($user->profile_pic)) {
                Storage::delete($user->profile_pic);
            }
            $user->profile_pic = null;
            $user->update();
            return ['status' => true, 'message' => 'Profile Image Deleted'];
        } else {
            return ['status' => false, 'error' => 'Something Went Wrong'];
        }
      }
}
