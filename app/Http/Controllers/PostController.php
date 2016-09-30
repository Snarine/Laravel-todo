<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Post;
use Carbon\ Carbon;

class PostController extends Controller
{
    public function index(Post $postModel)
    {
    	//$posts=Post::all();
    	//$posts=Post::latest('id')->get();
    	//$posts=Post::latest('published_at')->get();
 //   	$posts=Post::latest('published_at')
 //  		->where ('published_at', '<=', Carbon::now())
 //   		->get();

    	$posts = $postModel->getPublishedposts();	

      	return view ('post.index', ['posts'=>$posts]);
    }


    public function unPublished(Post $postModel)
    {
    	$posts = $postModel->getUnPublishedposts();	

      	return view ('post.index', ['posts'=>$posts]);
    }


    public function create()
{
       return view('post.create');
}

    public function store(Post $postModel, Request $request)
    {
        $postModel->create($request->all());
        return redirect()->route('posts');

    }



}
