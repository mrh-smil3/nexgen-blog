<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $baseUrl = url('/') . '/posts/';
        // Ambil blog berdasarkan jumlah klik (trending)
        $trendingBlogs = Post::with('categoryBlog', 'author')
            ->select('posts.*', DB::raw('COUNT(visits.id) as total_clicks'))
            ->leftJoin('visits', DB::raw("CONCAT('$baseUrl', posts.slug)"), '=', 'visits.url')
            ->groupBy('posts.id')
            ->orderBy('total_clicks', 'desc')
            ->take(4) // Batasi hasil jika perlu
            ->get();

        // dd($trendingBlogs->toSql());
        $allBogsPost = Post::with('categoryBlog', 'author')->latest()->paginate(20);
        return view('blog_public.index', [
            'allBogsPost' => $allBogsPost,
            'trendingBlogs' => $trendingBlogs
        ]);
    }


    public function show($slug)
    {
        // URL target berdasarkan slug
        $url = url("posts/$slug");

        // Hitung total klik
        $clicks = DB::table('visits')
            ->where('url', $url)
            ->count();

        $blogs = Post::latest()->take(4)->get();
        $blog = Post::with('categoryBlog', 'author')->where('slug', $slug)->first();
        return view('blog_public.detail-posts', [
            'blog' => $blog,
            'blogs' => $blogs,
            'clicks' => $clicks
        ]);
    }

    public function categoryShow(Category $category)
    {
        // dd($category);
        try {
            $blogs =  $category->posts()->latest()->paginate(20);
        } catch (\Throwable $th) {
            throw $th; // Opsional: Log error jika diperlukan
        }

        // dd($blogs);

        return view('blog_public.category-filter', [
            'blogs' => $blogs,
            'category' => $category, // Opsional, untuk menampilkan nama kategori di view
        ]);
    }
}
