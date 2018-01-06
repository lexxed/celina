<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use App\Product;
Use App\Customerinformation;
Use App\CartItem;
use \Cart as Cart;
use Validator;
use URL;
//use Stripe\Stripe;
//use Stripe\Charge;
//use Stripe\Customer;
use Stripe\{ Stripe, Charge, Customer};
use App\Mail\admin_new_order;
use App\Mail\cust_new_order;
Use Session;

class PurchasesController extends Controller
{

    public function index() 
    {

    	//dd(\Session::get(null));
    	//dd(Session::get('customerinformation'));     

        $referer = URL::previous();
        $needles = array('checkout');

        if (strposa($referer, $needles, 1)) {           
            return view('purchase');
        } else {
            return redirect('/');
        }

    }  


    public function store(Request $request)
    {
    	# see what is post
    	//dd(request()->all());
    	//dd(Cart::total());  

    	$cartTotalCents = Cart::total() * 100;

    	#perform the charge
    	Stripe::setApiKey(config('services.stripe.secret'));

    	$customer = Customer::create([
    		'email' => request('stripeEmail'),
    		'source' => request('stripeToken')
    	]);

    	Charge::create([
    		'customer' => $customer->id, 
    		'amount' => $cartTotalCents,
    		'currency' => 'sgd'
    	]);

        $customerinformation = Session::get('customerinformation');
        $cartitem = Cart::content();
        //dd($customerinformation);             

    	# send email to admin notify new order
    	//\Mail::to("lexx.tham@gmail.com")->send(new admin_new_order($customerinformation, $customer, $cartitem, $cartTotalCents));
        \Mail::to(env('MAIL_ADMIN'))->send(new admin_new_order($customerinformation, $customer, $cartitem, $cartTotalCents));
        
        # mail to the email that the customer use on stripe
        \Mail::to($customer->email)->send(new cust_new_order($customerinformation, $customer, $cartitem, $cartTotalCents));      

        # set checkoutstate to S for stripe
        $customer_id = Session::get('customerinformation')->customer_id;
        $customerinformation = Customerinformation::where('customer_id', $customer_id)->first();
        //$customerinformation->checkoutstate = $request->paymentmethod;
        $customerinformation->checkoutstate = '0';
        $customerinformation->save();    

        #clear shopping cart
        Cart::destroy();     

    	return view('purchaseSuccess');

    }
}

