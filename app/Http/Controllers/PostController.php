<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->body = substr($post->body, 0, 100) . '...';
        }
        return view('posts', compact('posts'));
    }

    public function showPostsTable()
    {
        $posts = Post::all();
        return view('post-dashboard', compact('posts'));
    }

    public function deletePost(Request $request)
    {
        Post::where('id', $request->post_id)->delete();
        return redirect('/post-dashboard')->with('status', 'Post successfully deleted');
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
                'title' => 'required|min:2|max:100|string',
                'body' => 'required|min:10|max:2000|string'
            ]);

            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->user_id = $request->user_id;
            $post->save();

            return redirect('createpost')->with('status', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        // $post->comments = $post->comments();
        return view('post', compact('post'));
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
    }
}
