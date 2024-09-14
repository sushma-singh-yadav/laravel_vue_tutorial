<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Validator;

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

        ///search
        $searchVal = request()->search['value'];
        if($searchVal != ''){
            $contactList = $contactList->where('name','like','%'.$searchVal.'%');
            $contactList = $contactList->orWhere('email','like','%'.$searchVal.'%');
            $contactList = $contactList->orWhere('phone','like','%'.$searchVal.'%');
            $contactList = $contactList->orWhere('created_at','like','%'.$searchVal.'%');
        }
        $pageLength = request()->length;
        if($pageLength > 0)
        {
            $contactList = $contactList->offset(request()->start)->limit($pageLength); ///pagination
        }

        
        $recordsFiltered = $contactList->count();  // filtered coubt
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
        $result = '';
        $contactForm = $request->all();
        Validator::validate($contactForm, [
            'contactForm.*.name' =>'required',
            'contactForm.*.email' =>'required',
            'contactForm.*.phone' =>'required',
            'contactForm.*.created_at' =>'required',
        ]);
        foreach($contactForm['contactForm'] as $contact)
        {
            $contactRes = ContactModel::insert($contact);
            if($contactRes)
            {
                $result .= 'Inserted,\n';
            } else {
                $result .= 'Not Inserted,\n';
            }   
        }
        if($result)
            {
                return response()->json(['status'=>200, 'message' => 'Data Inserted', 'data' => $result],Response::HTTP_OK);
            } else{
                return response()->json(['status'=>422, 'message' => 'Data Not Inserted', 'data' => []],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
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