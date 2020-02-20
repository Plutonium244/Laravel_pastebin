<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
use Illuminate\Cookie\CookieJar;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = Post::with('user')
        ->where('password', NULL)
        ->get();
        foreach ($this->posts as $post) {
            $currentDateTime = Carbon::now();
            if ($post->lifetime > 0 && 
                $currentDateTime->diffInMinutes( $post->created_at ) > $post->lifetime)
            {  
                dump('Заметка №'.$post->id.' должна быть удалена');
                // Post::delete($post->id);
                // unset($post);
            }
        }
    }

    public function index(Request $request)
    {
        dump($request->cookie());
        return view('posts', [
        'posts' => $this->posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CookieJar $cookieJar, Request $request)
    {
        Post::create($request->all()+[
            'user_id' => isset(auth()->user()->id) ? auth()->user()->id : '0'
        ]);
        return back();
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
        Post::find($id)->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return back();
    }

    public function getPostsByAuthor($id)
    {
        $posts = Post::with('user')->where('user_id',$id)->get();
        return view('posts', [
        'posts' => $posts
        ]);
    }

    public function getPostsByPassword(Request $request)
    {
        $posts = Post::with('user')->where('password',$request->password)->get();
        return view('posts', [
        'posts' => $posts
        ]);
    }
}
