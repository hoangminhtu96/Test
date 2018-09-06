<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\TestAPI as TestResource;
class apiController extends Controller
{
    public function showItem(){
    	
    	return new TestResource(Product::select('id','name','price')->get());
    	//return Product::select('id','name')->get();
    }
}
