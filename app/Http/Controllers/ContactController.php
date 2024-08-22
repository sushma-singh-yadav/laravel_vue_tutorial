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
        $orderColumn = request()->order;
        $columns = request()->columns;
        if($searchVal != '')
        {        
            $contactList = $contactList->where('name','like',"%$searchVal%");  ///search in name
            $contactList = $contactList->orWhere('email','like',"%$searchVal%");  ///search in email
        }
        foreach($columns as $col)
        {
            $col_name = $col['name'];
            $col_search_val = $col['search']['value'];
            if($col_search_val != '')
            {
            $contactList = $contactList->where($col_name,'like',"%$col_search_val%");  ///search
            }
        }
        $recordsFiltered = $contactList->count();  // filtered coubt
        $pageLength = request()->length;
        if($pageLength > 0)
        {
            $contactList = $contactList->offset(request()->start)->limit($pageLength); ///pagination
        }
        foreach($orderColumn as $order)
        {
            $orderColumnDir = $order['dir'];
            $contactList = $contactList->orderBy($order['name'], $orderColumnDir);
        }
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