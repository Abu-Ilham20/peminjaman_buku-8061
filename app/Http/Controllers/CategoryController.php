<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function add()
    {
        
        return view('category-add');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Successfully');
    }
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Successfully');
    }
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('delete-category', ['category' => $category]);
        // $category->delete();
        // return redirect('categories')->with('delete', 'Category Deleted Successfully');
    }
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('delete', 'Category Deleted Successfully');
    }
    public function show()
    {
        $deletedCategory = Category::onlyTrashed()->get();
        return view('deleted_category_list', ['deletedCategory' => $deletedCategory]);
    }
    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restore Successfully');
    }
}
