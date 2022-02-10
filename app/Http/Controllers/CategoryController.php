<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Client\ResponseSequence;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return response()->json($category, 200);
    }

    public function store()
    {
        $attr = request()->all();
        $category = Category::create($attr);

        return response()->json($category, 200);
    }

    public function update($id)
    {
        $category = Category::find($id);
        $attr = request()->all();

        $category->fill($attr);
        $category->save;

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
        $message = ['message' => 'delete successfully', 'Category_id' => $id];
        return response()->json($message, 200);
    }
}
