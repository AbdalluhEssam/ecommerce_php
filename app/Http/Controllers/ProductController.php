<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titlePage = "All Product";
        $products = Product::get();
        $pageLoading ="true";
        return view("products.view",compact("products","titlePage","pageLoading"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        Product::create([
            "name" =>   $name
        ]);

        return redirect("/products");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products =Product::where("id", $id)->first();
        print_r($products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::where("id", $id)->first();
        return view("products.edit",compact("products"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        Product::where("id", $id)->update([
            "name"=> $name
        ]);
        return redirect("/products");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where("id", $id)->delete();
        echo "Delete!";
    }
}