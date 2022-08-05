<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Enums\BlogStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $news = Blog::with('category')->get();

        return view('home', [
            'news' => $news
        ]);
    }

    public function test(){
        return config('services.custom.password_field');

        return view('home');
    }
}
