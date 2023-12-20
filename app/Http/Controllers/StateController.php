<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Response;


class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $countryData = Country::find($id);

        if(!empty($countryData))
        {
            $states = State::where('country_id', $countryData->id)->get();
            return response()->json(['status'=>200, 'message' => 'State List', 'data' => $states],Response::HTTP_OK);
        } else {
            return response()->json(['status'=>422, 'message' => 'No Data Found', 'data' => []],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}