<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use \Cart as Cart;

class PagesController extends Controller
{

    public function home() 
	{
		$product = Product::where('slug', 'royal-jelly')->firstOrFail();

		//$this->notification->add('success', 'Notification message', 'Notification title');

		return view('welcome')->with(['product' => $product]);
	}   

    public function about() 
	{
		return view('about');	
	}    

    public function trackorder() 
	{
		return view('trackorder');
	}   	

    public function contactus() 
	{
		return view('contactus');
	}   	
}
