<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerinformation extends Model
{

	protected $fillable = ['name','email','postalcode','blk','street','unit','building','mobile','checkoutstate'];

	protected $table = 'customerinformation';

	// each customer have one or many CartItem orders
	public function CartItem() {
		return $this->hasMany('App\CartItem');
	}

    public function addCartItem(CartItem $cartitem) 
    {
    	return $this->cartitem()->save($cartitem);
    } 	

}
