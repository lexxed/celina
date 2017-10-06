<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
	
	protected $fillable = array('img_slug');

	//protected $table = 'product_images';
	
    public function product() 
    {
    	return $this->belongsTo('App\Product');
    }    
}
