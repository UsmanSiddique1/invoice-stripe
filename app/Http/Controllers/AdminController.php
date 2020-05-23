<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biller;
use App\Payment;
use App\Service;
use App\User;
use App\Team;
use Auth;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /// Dashboard

    public function dashboard()
    {   
        $all_biller = Biller::all()->count();
        $all_payer = Payment::all()->count();
        $all_team = User::where('role', 'team')->count();
        $all_service = Service::all()->count();
        $all_payment = Payment::sum('amount');
        return view('Admin.dashboard', compact('all_payer','all_biller','all_team','all_service','all_payment'));
    }


    ////Team

    public function allTeam(){

    	$team = User::where('role', 'team')->get();

    	return view('Admin.allteam' , compact('team'));
    }

    public function addTeamPage(){

    	return view('add_team');
    }

    public function register_team(Request $request){

    	
    	Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    	User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'team',
            'password' => Hash::make($request['password']),
        ]);

        return redirect('/allteam')->with('msg', 'Team Member has been added');

    }

    public function edit_team($id){

    	$edit_team = User::where('id', $id)->where('role', 'team')->first();

    	return view('Admin.editteam', compact('edit_team'));
    }




    public function update_team(Request $request){

    	
    	
    	Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    	$update_user = User::where('id', $request->id)->first();
    	
    	$update_user->name = $request->name;
    	$update_user->email = $request->email;

    	$update_user->password = Hash::make($request['password']);

    	$update_user->save();

        return redirect('/allteam')->with('msg', 'Team Member has been added');

    }


    //// Biller

    public function allbillers(){

        $all_biller = Biller::all();
        return view('Admin.billers', compact('all_biller'));
    }

    public function addbiller(Request $request){
        $add_biller = new Biller;
        $add_biller->biller = $request['biller'];
        $add_biller->save();

        return redirect()->back()->with('msg', 'New Biller Added');
    }

    public function delBiller($id){

        $del_biller = Biller::where('id', $id)->delete();
        return redirect()->back()->with('msg', 'Biller Deleted');
    }

    public function updateBiller(Request $request){

    	$update_biller = Biller::where('id', $request->id)->first();

    	$update_biller->biller = $request->biller;

    	$update_biller->save();

    	return redirect()->back()->with('msg', 'Biller has been updated');
    }

     //// Biller

    public function allServices(){

        $service = Service::all();
        return view('Admin.services', compact('service'));
    }

    public function addService(Request $request){
        $add_service = new Service;
        $add_service->name = $request['name'];
        $add_service->price = $request['price'];
        $add_service->save();

        return redirect()->back()->with('msg', 'New service Added');
    }

    function updateService(Request $request){

    	$update_service = Service::where('id', $request->id)->first();

    	if ($request->price !="") {

    		$update_service->price = $request->price;
    	}

    	if ($request->name != "") {

    		$update_service->name = $request->name;
    	}
    	
    	

    	$update_service->save();

    	return redirect()->back()->with('msg', 'Biller has been updated');
    }

    public function delService($id){

        $del_service = Service::where('id', $id)->delete();
        return redirect()->back()->with('msg', 'service Deleted');
    }



    ///// Customer


    public function all_customers(){

    	$all_customers = Payment::all();

    	return view('Admin.customers', compact('all_customers'));
    }

    public function updateverification(Request $request){

    	$verify = Payment::where('id', $request->id)->first();
    	
    	if ($verify->status == 'verified') {
    		$verify->status = 'pending';
    	}
    	else{
    		$verify->status = 'verified';
    	}
    	
    	$verify->save();
    	return redirect()->back()->with('msg', 'Customer Payment Verified');
    }

}
