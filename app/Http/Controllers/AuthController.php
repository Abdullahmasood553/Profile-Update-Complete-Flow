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
use Carbon\Carbon;
use Session;
use DB;
use App\Business;
use App\Notification;


class AuthController extends Controller
{

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function dashboard() {
        // $data = auth()->user()->unreadNotifications;
 
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
        if($user->save()) {
            User::sendVerificationEmail($user);
        }
     //   $user->save();
        return response()->json(['success' => 'User Registered Successfully']);
    }

    public function user_login(Request $request) {
   
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
            $user = Auth()->user();
            if ($user->is_active == 1) {
                return response()->json(['success' => 'Successfully Logged In']);
            } else {
                return response()->json(['verify_email' => 'Please verify your account first through email.']);
            }

        } else {
            return response()->json(['error'=> 'Something went wrong']);
        }
    }

    public function save_business(Request $request) {
            $business = new Business;
            $business->business_name    = $request['business_name'];
            $business->business_email   = $request['business_email'];
            $business->business_phone   = $request['business_phone'];
            $business->business_web     = $request['business_web'];
            
            $user = User::first();
            if($business->save()) {
               $notif = new Notification;
                $notif->notif_data  = $request['business_name'];
                $notif->user_id     = Auth()->user()->id;
                $notif->save();
                return response()->json(['status' => 'Data Submitted Successfully']);
            } else {
                return response()->json(['status' => 'Data not submnitted']);
            }
    }
    
    public function verifyAccount(Request $request)
    {
        $user = User::where('remember_token', $request['token'])->first();
        if (isset($user)) {
            $user->remember_token = null;
            $user->is_active = true;
            $user->email_verified_at = Carbon::now();
            $user->save();
            Session::put('message', 'You have Successfully Verified');
            return redirect()->route('login');
        } else {
            Session::put('message', 'You have already verified or verification link Expired');
            return redirect()->route('login');
        }
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


      public function checkEmailPage() {
        return view('check_reset_email');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);
        //check if input is valid before moving on
        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->toArray();
            return response()->json(array(
                'status' => false,
                'error' => $validator->errors()->all(),
            ));
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $response = User::requestPasswordReset($user->email);
            if ($response) {
                return response()->json(array('status' => true, 'message' => 'Email has been sent...'));
            }
        }
        return response()->json(array('status' => false, 'error' => 'Something Went Wrong'));
    }  

    public function showResetPasswordPage(Request $request)
    {
        $token = $request->token;
        return view('reset_password')->with('token', $token);
    }

    public function resetPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'r_password' => 'required|between:6,255|confirmed',
            'r_password_confirmation' => 'required '
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'error' => $validator->errors()->all()];
        }
        $password = $request->r_password;

        // Validate the token
        $tokenData = DB::table('password_resets')->where('token', $request->reset_token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) {
            return ['status' => false, 'error' => 'Invalid Token'];
        }


        $user = User::where('email', $tokenData->email)->first();

        $user->password = bcrypt($password);
        if ($user->update()) {

        }
        DB::table('password_resets')->where('email', $user->email)->delete();

        return ['status' => true, 'message' => 'Password Updated'];

    }
}
