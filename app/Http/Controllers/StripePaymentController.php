<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Payment;
use App\Biller;
use App\ZipCode;   
use App\Service;
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
        $zip = ZipCode::all();
        $services = Service::all();        
        return view('charge', compact('all_biller','zip','services'));
    }

    public function zipsearch(Request $request){

        try {

            $zsearch = ZipCode::where('zip', $request->zip)->first();
            return response()->json($zsearch, 200);
            
        } catch (\Exception $e) {
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }

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
        $add_payer->status = 'pending';


        $add_payer->service_name = $request->service_name;

        $service = Service::where('name', $request->service_name)->first();

        $service_price = $service->price;
        
        $add_payer->service_price = $service_price;
        $total_amount = $request->amount + $service_price;
        $total_amount_strip = "$total_amount";
        $add_payer->total_amount = "$total_amount";

        $add_payer->amount = $request->amount;
        
        $add_payer->zip = $request->zip;
        $add_payer->city = $request->city;
        $add_payer->state = $request->state;

        
        $add_payer->save();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total_amount_strip,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}