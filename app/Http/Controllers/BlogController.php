<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Models\Blog;
use App\Models\Enums\BlogStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Blog::where('status', BlogStatus::ACTIVE)->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBlogPostRequest  $request
     * @return Response
     */
    public function store(StoreBlogPostRequest $request)
    {
        $blog = Blog::create($request->all());

        Redis::set('blog_' . $blog->id, $blog);

        return $blog;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(int $id)
    {
       $cachedBlog = Redis::get('blog_' . $id );

       if($cachedBlog === null){
           $blog = Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->first();
           Redis::set('blog_' . $id, $blog);
           return $blog;
       }

       return json_decode($cachedBlog, true);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StoreBlogPostRequest  $request
     * @param  int  $id
     * @return Response|bool
     */
    public function update(StoreBlogPostRequest $request, int $id)
    {
        $blog = Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->first();
        if($blog->update($request->all())){
            Redis::set('blog_' . $id, $blog);
            return $blog;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        return Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->delete();
    }

    public function search(string $title)
    {
        $cachedBlog = Redis::get('blog_title_' . $title);

       if($cachedBlog === null){
           $blog = Blog::where('title', 'like', '%'.$title.'%')->where('status', BlogStatus::ACTIVE)->get();
           Redis::set('blog_title_' . $title, $blog);
           return $blog;
       }

       return json_decode($cachedBlog, true);
    }
}
