<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

	protected $fillable = ['product_id','row_id','qty','name','price'];

	protected $table = 'cartitems';

    public function Customerinformation() {
		return $this->belongsTo('App\Customerinformation');
	}  
}
