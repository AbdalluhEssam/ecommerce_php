<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\StoreRequest;


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
       $brands =  Brand::all();
       $categories =  Categorie::all();
       return view("products.create",compact("brands","categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'count_in_stock' => 'required',
            'category_id' => 'required',
            'barnd_id' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        $productModel = new Product;
        $productModel->name = $request->input('name');
        $productModel->price = $request->input('price');
        $productModel->count_in_stock = $request->input('count_in_stock');
        $productModel->category_id =$request->input('category_id');
        $productModel->barnd_id = $request->input('barnd_id');
        $productModel->description = $request->input('description');
        $productModel->image = $fileName;
        $productModel->save();

        return redirect('{{ route("products.view") }}')->with([
            'message' => 'User added successfully!', 
            'status' => 'success'
        ]);
     

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::get();
        $pageLoading ="true";
        return view("products.details",compact("products","pageLoading"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands =  Brand::all();
        $categories =  Categorie::all();
        $products = Product::where("id", $id)->first();
        return view("products.edit",compact("products","brands","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'count_in_stock' => 'required',
            'category_id' => 'required',
            'barnd_id' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('image')){
                Storage::disk('public/images')->delete($product->image);
                $fileName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/images', $fileName);
        }
        $name = $request->name;
        $price = $request->price;
        $count_in_stock = $request->count_in_stock;
        $category_id =$request->category_id;
        $barnd_id = $request->barnd_id;
        $description = $request->description;
        $image = $fileName;

       
        $name = $request->name;
        Product::where("id", $id)->update([
            "name"=> $name,
            "price"=> $price,
            "count_in_stock"=> $count_in_stock,
            "category_id"=> $category_id,
            "barnd_id"=> $barnd_id,
            "description"=> $description,
            "image"=> $image

        ]);
        return redirect('{{ route("products.view") }}')->with([
            'message' => 'Products Updeta successfully!', 
            'status' => 'success'
        ]);

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