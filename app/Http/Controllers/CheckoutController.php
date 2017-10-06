<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Product;
Use App\Customerinformation;
Use App\CartItem;
use \Cart as Cart;
use Validator;
use URL;
use App\Mail\admin_new_order_checkout;
use Session;

class CheckoutController extends Controller
{
    public function index() 
    {     
        
        # check if the referer is from these pages
        $referer = URL::previous();
        $needles = array('cart', 'purchase', 'checkout');

        if (strposa($referer, $needles, 1)) {
            return view('checkout');
        } else {
            return redirect('/');
        }
            
    	
    }     

    public function store(Request $request)
    {
    	//return var_dump($card);
    	//return $request->all();
    	# input manual
    	//$note = new Note;
    	//$note->body = $request->body;
    	//$note->user_id = $request->user_id;
    	//$card->notes()->save($note);     

        $rules = [
            'email' => 'required|email',
            'name' => 'required',
            'postalcode' => 'required|numeric|digits:6',           
            'blk' => 'required',           
            'street' => 'required',           
            'unit' => 'required',           
            'mobile' => 'required',           
        ];
        $this->validate($request, $rules);
        //dd($errors->all());

        # save customerinfo into DB
        $customerinformation = new Customerinformation($request->all());
        $customerinformation->checkoutstate = '1';
        $customerinformation->customer_id = str_random(20);
        $customerinformation->save();      

        # save customerinfo into session
        Session::put('customerinformation', $customerinformation);
  
        # save cartitems into DB      
        foreach (Cart::content() as $item) {

            # using function from App/CartItem.php
            $cartitem = new CartItem;
            $cartitem->row_id = $item->rowId; 
            $cartitem->product_id = $item->id; 
            $cartitem->qty = $item->qty; 
            $cartitem->name = $item->name; 
            $cartitem->price = $item->price; 
            $customerinformation->addCartItem($cartitem);              

        }   

    	//DB::listen(function($query) { var_dump($query->sql); });
    

        $cartTotalCents = Cart::total() * 100;
        $customerinformation = Session::get('customerinformation');
        $cartitem = Cart::content();
        //dd($customerinformation);             

        # send email to admin notify new order
        \Mail::to(env('MAIL_ADMIN'))->send(new admin_new_order_checkout($customerinformation,$cartitem, $cartTotalCents));        

    	//return \Redirect::to('/cards/');
    	return redirect('purchase/');
    	//return back();
    }

}
