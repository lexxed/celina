<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use App\Product_images;
use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $url = \Request::path();

        //dd($category->id);                                                    

        $category = Category::where('subcatslug','=',$url)
                            ->first();        

        if($url != 'shop') {
            $products = Product::where('display', 1)
                                ->where('cat_id','=',$category->id)
                                ->get();                        
        } else {
            $products = Product::where('display', 1)
                                ->get();                                                
        }

        //$products = Product::all();


        return view('shop')->with(['products' => $products, 'url' => $url,'category' => $category]);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $category = Category::where('id','=',$product->cat_id)->firstOrFail();

        $interested = Product::where('slug', '!=', $slug)->where('display',1)->get()->random(3);

        //dd($product->id);
        //$product_images = Product_images::find($product->id);
        $product_images = $product->product_images;


        $directory = 'img/product_images/' . $product_images->img_slug;

        $files = File::allFiles($directory);
        $product_images_array = array();
        foreach ($files as $file)
        {
            $product_images_array[] = (string)$file;
        }        
        //var_dump($product_images_array);            

        return view('product')->with(['product' => $product, 'interested' => $interested, 'product_images_array' => $product_images_array,'category' => $category]);
    }


}