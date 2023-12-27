<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ContactRequest $request)
    {
        //
       $inputArr = $request->validated();

       //file
       if($request->hasFile('inputImage'))
       {
           $image = $request->file('inputImage');
           $directory = '/uploads';
           $extension = $image->getClientOriginalExtension();
           $renamedFile = 'Contact'.time().'.'.$extension;
           $image->storeAs($directory, $renamedFile, 'local');

           $data = array(
               'name' => $inputArr['inputName'],
               'file_name' => $renamedFile
           );
           $result = Contact::insert($data);

           if($result)
           {
            return response()->json(['message' => 'Successfully saved', 'data' =>''], Response::HTTP_OK);
           } else {
            return response()->json(['message' => 'Something Went Wrong', 'data' =>''], Response::HTTP_UNPROCESSABLE_ENTITY);
           }
       } else {
           return response()->json(['message' => 'please upload a file', 'data' =>''], Response::HTTP_UNPROCESSABLE_ENTITY);
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
