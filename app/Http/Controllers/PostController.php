<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getD() {
        $arg = "argument";
        var_dump($arg);
        dump($arg);
        $arg2 = 42;
        dd($arg);
        dump($arg2);
    }

    public function getById($id) {
        #$post = Post::find($id);
        #dump("Post id: " . $post -> id);
        #dump("Post title: " . $post -> title);
        #dump("Post content: " . $post -> content);
        $post = DB::select("select * from posts where id = :id", array("id"=>$id));
        dump("Post id: " . $post[0] -> id);
        dump("Post title: " . $post[0] -> title);
        dump("Post content: " . $post[0] -> content);
    }

    public function getAll() {
        $posts = Post::all();
        foreach($posts as $post) {
            dump("Post id: " . $post -> id);
            dump("Post title: " . $post -> title);
            dump("Post content: " . $post -> content);
        }
    }

    public function getAllPublished() {
        $posts = Post::where("is_published", 1)->get();
        foreach($posts as $post) {
            dump("Post id: " . $post -> id);
            dump("Post title: " . $post -> title);
            dump("Post content: " . $post -> content);
        }
    }



}
