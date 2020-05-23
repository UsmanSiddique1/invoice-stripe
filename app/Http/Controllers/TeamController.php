<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class TeamController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function all_customers(){

    	$all_customers = Payment::where('status', 'verified')->get();

    	return view('Team.dashboard', compact('all_customers'));
    }
}
