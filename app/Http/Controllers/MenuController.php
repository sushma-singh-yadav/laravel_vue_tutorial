<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menuList = MenuModel::with('submenu')->get();

        if(!empty($menuList))
        {
            return response()->json(['status'=>200, 'message' => 'Menu List', 'data' => $menuList],Response::HTTP_OK);
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
    public function show(Request $id)
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
    public function update(Request $request, MenuModel $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuModel $user)
    {
        //
    }
}
