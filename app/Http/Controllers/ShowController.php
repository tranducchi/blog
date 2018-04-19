<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Categories;
use App\Comments;
class ShowController extends Controller
{
    //
    public function index(){
        $posts = Posts::orderBy('id', 'desc')->paginate(4);
        return view('layouts.index', compact('posts'));
    }
    public function showCategories($id){
        $cat_post = Posts::where('id_cat','=',$id)->paginate(3);
        $cat = Categories::find($id);
        return view('categories', compact('cat_post'))->with('cat', $cat);
    }
    public function showPost($id){
        $show_post = Posts::find($id);
        $comment = Comments::where('id_post', '=', $id)->get();
        $recent_post = Posts::where('id','!=', $id)->take(6)->get();
       return view('detail_post', compact('show_post'), ['comment'=>$comment, 'recent_post'=>$recent_post]);
    }
    public function search(Request $request){
        $content = $request->content;
        $data = Posts::where('title', 'like', '%'.$content.'%')
        ->orderBy('title')->paginate(5);
        return view('/search',compact('data', 'content'));
    }
}
