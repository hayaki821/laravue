<?php

namespace App\Http\Controllers;
use App\Post;
use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Post $post,Request $request)
    {
        $like = Like::create(['user_id'=>$request->user_id,'post_id'=>$post->id]);

        $likeCount = count(Like::where('post_id',$post->id)->get());
        return response()->json(['likeCount'=>$likeCount]);
    }

    public function unlike(Post $post,Request $request)
    {
        $like = Like::where('user_id',$request->user_id)->where('post_id',$post->id)->first();
        $like->delete();
        $likeCount = count(Like::where('post_id',$post->id)->get());
        return response()->json(['likeCount'=>$likeCount]);
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
    public function store(Request $request)
    {
        //
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
