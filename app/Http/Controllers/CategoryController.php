<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.admin.posts.category.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $validatedData = $validator->validated();

        Category::create($validatedData);
        return back()->with('success', 'Blog Category Created');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $validatedData = $validator->validated();

        $category = Category::find($id);
        $category->update($validatedData);
        return back()->with('success', 'Blog Category Updated');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back()->with('success', 'Blog Category Deleted');
    }

    public function checkSlug(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255'
        ]);
        // dd($request->all());
        $slug = SlugService::createSlug(Category::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
