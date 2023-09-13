<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table("product")->get()->toArray();
        return view("view",compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        Db::table("product")->insert([
            "name" =>   $name
        ]);
        echo "inserted";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = DB::table("product")->where("id", $id)->first();
        print_r($products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = DB::table("product")->where("id", $id)->first();
        return view("edit",compact("products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        DB::table("product")->where("id", $id)->update([
            "name"=> $name
        ]);
        echo "Updated!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("product")->where("id", $id)->delete();
        echo "Delete!";
    }
}
