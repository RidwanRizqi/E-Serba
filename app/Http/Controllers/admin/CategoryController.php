<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::when(request('search'), function ($category) {
            $category->where('name', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(5);

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create-edit', [
            'category' => new Category(),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('/admin/categories')->with('add', 'Berhasil Menambah Kategori!');
    }

    public function edit(Category $category)
    {
        return view('admin.category.create-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
            'description' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/categories')->with('add', 'Berhasil Update Kategori!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('del', 'Berhasil Hapus Kategori!');
    }
}
