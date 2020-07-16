<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('guest.posts.index', ['post_list' => $posts]);
    }

    public function show($slug) {

        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return view('guest.posts.show', ['post_list' => $post]);
        } else {
            return abort('404');
        }
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $posts = $category->posts;
            $data = [
                'category' => $category,
                'posts' => $posts
            ];
            return view('guest.posts.category', $data); 
        } else {
            return abort('404');
        }
    }
}
