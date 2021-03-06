<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->get();
        return view('admin.posts.index', ['post_list' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $data = [
            'category_list' => $categories,
            'tags' => $tags
        ];
        return view('admin.posts.create', $data);
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
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $data = $request->all();
        $slug = Str::of($data['title'])->slug('-')->__toString();
        $original_slug = $slug;
        $referred_post = Post::where('slug', $slug)->first();
        $counter = 0;
        while($referred_post) {
            $counter++;
            $slug = $original_slug . '-' . $counter;
            $referred_post = Post::where('slug', $slug)->first();
        }
        $data['slug'] = $slug;
        $new_post = new Post();
        $new_post->fill($data);
        $new_post->save();
        if(!empty($data['tags'])) {
            $new_post->tags()->sync($data['tag_id']);
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return view('admin.posts.show', ['post_list' => $post]);
        } else {
            return abort('404');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if ($post) {
            $categories = Category::all();
            $tags = Tag::all();
            $data = [
                'post_list' => $post,
                'category_list' => $categories,
                'tags' => $tags
            ];
            return view('admin.posts.edit', $data);
        } else {
            return abort('404');
        }
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
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);
        $data = $request->all();
        $slug = Str::of($data['title'])->slug('-')->__toString();
        $original_slug = $slug;
        $referred_post = Post::where('slug', $slug)->first();
        $counter = 0;
        while($referred_post) {
            $counter++;
            $slug = $original_slug . '-' . $counter;
            $referred_post = Post::where('slug', $slug)->first();
        }
        $data['slug'] = $slug;
        $post = Post::find($id);
        $post->update($data);
        if(!empty($data['tag_id'])) {
            $post->tags()->sync($data['tag_id']);
        } else {
            $post->tags()->detach();
        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('admin.posts.index');
        } else {
            return abort('404');
        }
    }
}
