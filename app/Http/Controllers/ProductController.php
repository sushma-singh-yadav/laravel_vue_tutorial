<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
    }
      /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $requestData = $request->all();

        foreach($requestData as $product)
        {
            print_r($product);
            Product::insert($product);
        }
        
        return response()->json(['status'=> 200, 'message' => 'Product successfully saved', 'data' => []]);
    }
}