<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Constants\GlobalConstants;

class ProfileController extends Controller
{
    public function find_profile() {
        $profile = User::searchProfile(GlobalConstants::ALL);
        return view('find_profile')->with('profile', $profile);
    }

    public function filter_profile(Request $request) {
        $country = $request->country;
      
        if($request->ajax()) {
            $profile = User::searchProfile($country);
            return view('layouts.inc.search_page', compact('profile'))->render();
        }
    }


}
