<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $blogs = Post::with('categoryBlog')->where('user_id', $user->id)->latest()->paginate(20);
        return view('dashboard.admin.posts.index', [
            'blogs' => $blogs
        ]);
    }


    public function createView()
    {
        $categoryBlogs = Category::all();
        return view('dashboard.admin.posts.content.create', [
            'categoryBlogs' => $categoryBlogs
        ]);
    }


    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'slug' => 'required|unique:posts|max:255',
                'categories_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'body' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }

            $validatedData = $validator->validated();
            if ($request->image) {
                $validatedData['image'] = $request->file('image')->store('images/posts', 'public');
            }

            $validatedData['user_id'] = Auth::user()->id;
            $validatedData['tagline'] = Str::limit(strip_tags($request->body), 120, '...');

            // dd($validatedData);

            Post::create($validatedData);
            return back()->with('success', 'Post Created');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function editView($slug)
    {
        try {
            $blogs = Post::with('categoryBlog')->where('slug', $slug)->first();
            // dd($blogs);
            $categoryBlogs = Category::all();
            return view('dashboard.admin.posts.content.edit', [
                'blog' => $blogs,
                'categoryBlogs' => $categoryBlogs
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Request $request, Post $post)
    {
        try {
            $rules = [
                'title' => 'required|max:255',
                'categories_id' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'body' => 'required'
            ];

            //cek slug
            if ($request->slug != $post->slug) {
                $rules['slug'] = 'required|unique:posts|max:255';
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return back()->with('errors', $validator->messages()->all()[0])->withInput();
            }

            $validatedData = $validator->validated();

            if ($request->image) {
                if ($request->oldImage) {
                    if (Storage::disk('public')->exists($request->oldImage)) {
                        Storage::disk('public')->delete($request->oldImage);
                    }
                }
                $validatedData['image'] = $request->file('image')->store('images/posts', 'public');
            }

            $validatedData['user_id'] = Auth::user()->id;

            $validatedData['tagline'] = Str::limit(strip_tags($request->body), 120, '...');

            Post::where('slug', $post->slug)->update($validatedData);

            return back()->with('success', 'Post Updated');
            // dd($validatedData);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function delete($id)
    {
        $blog = Post::find($id);

        if ($blog->image) {
            if (Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
        }

        $blog->delete();
        return back()->with('success', 'Blog Deleted');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);

            $url = Storage::url($path);

            return response()->json([
                'uploaded' => true,
                'url' => $url,
            ]);
        }

        return response()->json(['uploaded' => false, 'error' => 'Upload failed'], 400);
    }

    public function checkSlug(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        // dd($request->all());
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
