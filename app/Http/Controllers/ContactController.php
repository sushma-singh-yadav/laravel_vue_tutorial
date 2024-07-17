<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contactList = ContactModel::select('*');
        $recordsTotal = $contactList->count();   //total records

        $searchVal = request()->search['value'];
        if($searchVal != '')
        {        
            $contactList = $contactList->where('name','like',"%$searchVal%");  ///search in name
            $contactList = $contactList->orWhere('email','like',"%$searchVal%");  ///search in email
        }
        $recordsFiltered = $contactList->count();  // filtered coubt
        $contactList = $contactList->offset(request()->start)->limit(request()->length); ///pagination
        $contactList = $contactList->get();
        if(!empty($contactList))
        {
            return response()->json([
                'status'=>200, 
                'message' => 'Contact List', 
                'data' => $contactList,
                'recordsTotal' => $recordsTotal,
                'recordsFiltered' => $recordsFiltered,
                ],Response::HTTP_OK);
        } else {
            return response()->json(['status'=>422, 'message' => 'No Data Found', 'data' => []],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}