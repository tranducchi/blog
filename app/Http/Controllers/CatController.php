<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Categories::all();
        if(auth()->user()->role != 1){
            return redirect('/');
        }else{
            return view('admin.categories.list', compact('categories'));
        } 
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|unique:categories,name|max:200|min:5'
        ]);
        $cat = new Categories;
        $cat->name = $request->name;
        echo $cat->name;
        $cat->save();
        return redirect('/cat')->with(['mess'=>'Add categories success']);
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
        //
        $cat = Categories::find($id);
        return view('admin.categories.edit', compact('cat'));
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
        //
        $cat = Categories::find($id);
        $request->validate([
            'name'=>'required|unique:categories,name|max:100|min:5'
        ]);
        $cat->name = $request->name;
        $cat->update();
        return redirect('/cat')->with('mess', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cat = Categories::find($id);
        $cat->delete();
        return redirect('/cat')->with('mess', 'Delete cat success');
    }
}
