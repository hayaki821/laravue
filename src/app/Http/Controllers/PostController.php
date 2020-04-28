<?php

namespace App\Http\Controllers;

use App\Post;
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
        return view('posts.index',[
            'posts' =>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->content = $request->content;
        $post->user_id = \Auth::user()->id;

        $post->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)//イングリッシュドバインディング　こうしておくとwhereを使うことなくそのidのデータを取ってこれる
    {
        if (!function_exists('is_countable')) {
            function is_countable($var) {
                if(is_array($var) || $var instanceof Countable){
                    count($var);
                }else{
                    return 0;
                }
            }
        }

        $userAuth = \Auth::user();

        $post->load('likes');
        $defaultCount = count($post->likes);

        $defaultLiked = $post->likes->where('user_id',$userAuth->id)->first();    
        if(!is_array($defaultLiked)){
            $defaultLiked = false;
        } else {
            $defaultLiked = true;
        }
        return view('posts.show',[
            'post' => $post,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultCount' => $defaultCount
        ]);

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
        //
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
