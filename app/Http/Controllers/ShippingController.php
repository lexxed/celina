<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Cart as Cart;

class ShippingController extends Controller
{
    
    public function singpost($id,$rowId) 
    {

        if($rowId != '000') {
        	Cart::remove($rowId);
        }

    	if($id == 7) {
	        $duplicateshipping = Cart::search(function ($cartItem, $rowId) {
	            return $cartItem->id === 7;
	        }); 

	        if ($duplicateshipping->isEmpty()) {
	            Cart::add(7, "Singpost Registered Mail", 1, 3.00)->associate('App\Product');
	        }  	        
    	}

    	if($id == 8) {
	        $duplicateshipping = Cart::search(function ($cartItem, $rowId) {
	            return $cartItem->id === 8;
	        });     	

	        if ($duplicateshipping->isEmpty()) {
	            Cart::add(8, "Singpost Normal Mail", 1, 1.00)->associate('App\Product');
	        }  	        
    	}    	
        # add shipping registered

        
        //session()->flash('success_message', 'Shipping Registered Added.');

        //return response()->json(['success' => true]);

        //return redirect('cart')->withSuccessMessage('Reg');

    }       

}
