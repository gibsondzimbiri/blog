<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::latest()->paginate(6)->withQueryString()
        ]);
    }

    public function category() {
        return view('admin.categories.create');
    }

    public function categoryEdit(Category $category) {
        return view('admin.categories.edit', [
            'categories' => $category
        ]);
    }

    public function create() {
        $attributes = request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'thumbnail' => 'required|image'
        ]);
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Category::create($attributes);

        return back()->with('success', 'Category submitted');
    }

    public function update(Category $category)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category->id)],
            'thumbnail' => 'image',
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $category->update($attributes);

        return back()->with('success', 'Category updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Category deleted');
    }
}
