<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Posts;
use App\Categories;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Posts::latest()->paginate(8);
        if(auth()->user()->role != 1){
            return redirect('/');
        }else{
           return view('admin.post.list', compact('posts'));
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
        $cat = Categories::all();
        $select = [];
        foreach($cat as $c){
            $select[$c->id] = $c->name;
        }
        return view('admin.post.add', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|max:100|min:10',
            'des'   => 'required|max:1000|min:10',
            'content'=> 'required'
        ]); 
        if($request->hasFile('img')) {
            //
           $file = $request->file('img');
           $name_image = $file->getClientOriginalName();
           $request->img->storeAs('public/images', $name_image);
        }else{
           $name_image ='no_image.jpg';
        }
        $post = new Posts;
        $post->title = $request->title;
        $post->des   = $request->des;
        $post->content = $request->content;
        $post->id_user = $request->id_user;
        $post->id_cat  = $request->id_cat;
        $post->img = $name_image;
        $post->save();
        return redirect('/post')->with('mess', 'Create post success');
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
        
        $posts = Posts::find($id)->toArray();
        $cat = Categories::all();
        $select = [];
        foreach($cat as $c){
            $select[$c->id] = $c->name;
        }
        $data = array(
            'posts'=>$posts,
            'select'=>$select
        );
        return view('admin.post.edit', compact('data'));
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
        $post = Posts::find($id);
        $request->validate([
            'title' => 'required|max:100|min:10',
            'des'   => 'required|max:1000|min:10',
            'content'=> 'required'
        ]);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = $file->getClientOriginalName();
            $request->img->storeAs('public/images', $file_name);
        }
        $post->title = $request->title;
        $post->des   = $request->des;
        $post->content = $request->content;
        $post->id_user = $request->id_user;
        $post->id_cat  = $request->id_cat;
        if(isset($file_name)){
            $post->img = $file_name;
        }
        $post->update();
        return redirect('/post')->with('mess', 'Update article success');
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
        $post = Posts::find($id);
        if($post->img !='no_image.jpg'){
            Storage::delete('public/images/'.$post->img);
        }
        $post->delete();
        return redirect('/post')->with('mess', 'Delete Data Success');
    }
}
