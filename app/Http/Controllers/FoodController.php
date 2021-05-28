<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;
use App\Models\Category;

class FoodController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
    
        $foods = Food::latest()->paginate(4);
        
        return view('food.index',compact('foods'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
            ,'price'=>'required|integer'
            ,'category'=>'required'
            ,'image'=>'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinaltionPath= public_path('/images');
        $image->move($destinaltionPath,$name);

        Food::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'description'=>$request->get('description'),
            'category_id'=>$request->get('category'),
            'image'=>$name
        ]);
        return redirect()->back()->with('message','Food Created');
    
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('food.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'name'=>'required'
            ,'price'=>'required|integer'
            ,'category'=>'required'
           
        ]);
        $food = Food::find($id);
       $name = $food->image;

       if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinaltionPath= public_path('/images');
            $image->move($destinaltionPath,$name);
       }
        $food->name = $request->get('name');
        $food->price =$request->get('price');
        $food->description = $request->get('description');
        $food->category_id = $request->get('category');
        $food->image = $name;
        $food->save();
         return redirect()->route('food.index')->with('message','Food information Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food.index')->with('message','Food Deleted');
    }
    public function ListFood(){
        $categories = Category::with('food')->get();
        return view('food.list',compact('categories'));
    }
    public function view($id){
        $food = Food::find($id);
        return view('food.detail',compact('food'));
    }
}