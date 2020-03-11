<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Business;
use DB;
class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest:admin');   
    // }

    public function login(Request $request)
    {
        if(Auth::guard('admin')->check())
        return redirect()->route('admin.dashboard');
        return view('admin.login');
    }

    public function dashboard() {
        
        $notifications = DB::table('notifications')->get();

        $businesses =  Business::all();
        $business_count =  Business::count(); 
        return view('admin.dashboard')->with('businesses', $businesses)->with('business_count', $business_count)->with('notifications', $notifications);
    }

    public function postLogin(Request $request) {
        if (Auth::guard('admin')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
                return response()->json(['success' => 'Successfully Logged In']);
            } 
         else {
            return response()->json(['error'=> 'Something went wrong']);
        }
    }

    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
