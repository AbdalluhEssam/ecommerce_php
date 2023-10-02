<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestImonial;

class TestImonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $testImonials =  TestImonial::get();
      $pageLoading ="true";
      return view("testimonials.view",compact("testImonials","pageLoading"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("testimonials.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'jop_title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        $testImonial = new TestImonial;
        $testImonial->name = $request->input('name');
        $testImonial->jop_title = trim($request->input('jop_title'));
        $testImonial->description = trim($request->input('description'));
        $testImonial->image = $fileName;
        $testImonial->save();

        return redirect("/testimonials")->with([
            'message' => 'User added successfully!', 
            'status' => 'success'
        ]);
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