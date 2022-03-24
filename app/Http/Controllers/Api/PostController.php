<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($category = null){

        if($category){
            $posts = Post::where("category_id", $category)->get();
        }
        else{
        $posts = Post::all();
        }

        return response()->json($posts);
    }
}
