<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPostRequest;
use App\Models\Blog;
use App\Models\Enums\BlogStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return Blog::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->first();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StoreBlogPostRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(StoreBlogPostRequest $request, $id)
    {
        return Blog::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->delete();
    }

    public function search($title)
    {
        return Blog::where('title', 'like', '%'.$title.'%')->where('status', BlogStatus::ACTIVE)->get();
    }
}
