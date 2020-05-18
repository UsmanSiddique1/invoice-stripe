<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biller;
use App\Payment;

class CheckoutController extends Controller
{
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


    public function update(Request $request){
    	$update = Biller::where('id', $request['id'])->first();
    	$update->biller = $request->biller;
    	$update->save();

    	return redirect()->back()->with('msg', 'Biller Updated');
    }



    Public function allPayers(){

    	$payers = Payment::all();
    	return view('payers', compact('payers'));
    }
}
