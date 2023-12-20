<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $countryList = Country::all();

        if(!empty($countryList))
        {
            return response()->json(['status'=>200, 'message' => 'Country List', 'data' => $countryList],Response::HTTP_OK);
        } else {
            return response()->json(['status'=>422, 'message' => 'No Data Found', 'data' => []],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}