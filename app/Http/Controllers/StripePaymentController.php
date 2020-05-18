<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Payment;
use App\Biller;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function payForm()
    {
        $all_biller = Biller::all();
        return view('charge', compact('all_biller'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $add_payer = new Payment;
        $add_payer->name = $request->name;
        $add_payer->email = $request->email;
        $add_payer->phone = $request->phone;
        $add_payer->billing_account_number = $request->billing_account_number;
        $add_payer->EX = $request->RX;
        $add_payer->Invoice = $request->Invoice;
        $add_payer->zipcode = $request->zipcode;

        $add_payer->save();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}