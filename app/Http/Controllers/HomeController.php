<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biller;
use App\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $all_biller = Biller::all();
        $all_payer = Payment::all();
        return view('home', compact('all_payer','all_biller'));
    }

    public function allbillers(){

        $biller = Biller::all();
        return view('billers', compact('biller'));
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



}
