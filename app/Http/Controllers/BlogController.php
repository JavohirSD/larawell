<?php
/** @noinspection PhpDynamicAsStaticMethodCallInspection */

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ApiResponse;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Resources\BlogCollection;
use App\Models\Blog;
use App\Models\Enums\BlogStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        $pageNumber = request()->input('page',1);
        $pageLimit  = request()->input('limit',2);

        return Cache::remember('blog_index_' . $pageNumber . '_' . $pageLimit, 3600, function () use ($pageLimit) {
            return ApiResponse::json(
                new BlogCollection(Blog::where('status', BlogStatus::ACTIVE)->paginate($pageLimit)),
                true,
                SymfonyResponse::HTTP_OK
            );
        });
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogPostRequest $request
     *
     * @return JsonResponse
     */
    public function store(StoreBlogPostRequest $request): JsonResponse
    {
        $blog = Blog::create($request->all());

        Cache::put('blog_' . $blog->id, $blog, 3600);

        return ApiResponse::json($blog, true, SymfonyResponse::HTTP_CREATED);
    }

    /**
     * Display the specified blog.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $status        = true;
        $status_code   = SymfonyResponse::HTTP_OK;
        $error_message = "";

        // First check the cache
        $cachedBlog = Cache::get('blog_show_' . $id);

        // if blog with given id exists in cache then decode and return it
        if (isset($cachedBlog)) {
            $blog = json_decode($cachedBlog, false);
        } else {
            // if blog with given id exists in DB then save it to cache and return it
            if ($blog = Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->first()) {
                Cache::put('blog_' . $id, $blog, 3600);
            } else {
                // if blog with given id not found in DB and cache too return error response
                $status        = false;
                $status_code   = SymfonyResponse::HTTP_NOT_FOUND;
                $error_message = __("Blog with this ID not found");
            }
        }
        return ApiResponse::json($blog, $status, $status_code, $error_message);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  StoreBlogPostRequest  $request
     * @param  int  $id
     *
     * @return JsonResponse|bool
     */
    public function update(StoreBlogPostRequest $request, int $id) : JsonResponse|bool
    {
        $blog = Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->first();
        if($blog->update($request->all())){
            Cache::put('blog_' . $id, $blog, 3600);
            return ApiResponse::json($blog, true, SymfonyResponse::HTTP_ACCEPTED);
        }
        return false;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        if($blog = Blog::where('id', $id)->where('status', BlogStatus::ACTIVE)->first()){
            Cache::forget('blog_' . $id);
            return ApiResponse::json($blog->delete(), true,SymfonyResponse::HTTP_OK);
        }

        return ApiResponse::json(null, false,SymfonyResponse::HTTP_NOT_FOUND);
    }

    /**
     * @param string $title
     *
     * @return JsonResponse
     */
    public function search(string $title): JsonResponse
    {
        $pageLimit  = request()->input('limit',2);

            return ApiResponse::json(
                Blog::where('title', 'like', '%'.$title.'%')
                        ->where('status', BlogStatus::ACTIVE)
                        ->paginate($pageLimit),
                true,
                SymfonyResponse::HTTP_OK
            );
    }
}
