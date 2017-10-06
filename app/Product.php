<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function product_images() 
    {
    	return $this->hasOne('App\Product_images'); 
    }    
}
