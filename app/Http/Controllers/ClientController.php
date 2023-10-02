<?php
namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller {


    public function index()
    {
       $clients = Client::get();
       return View("clients.index",compact("clients"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clients.create");
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
            ]);


              if($request->file('image')){

        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->store('image', 'public');
        
        
        // image->storeAs('public/images/', $fileName);
  
        $testImonial = new Client;
        $testImonial->name = $request->input('name');
        $testImonial->jop_title = trim($request->input('jop_title'));
        $testImonial->description = bcrypt($request->input('description'));
        $testImonial->image = $fileName;
        $testImonial->save();
        }
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

?>