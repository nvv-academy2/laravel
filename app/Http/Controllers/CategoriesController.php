<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'id');
        $order = $request->input('order', 'ASC');
        return response()->json(Category::orderBy($orderBy, $order)->get());
    }

    public function filterCategoriesIds(Request $request)
    {
        $ids = $request->input('ids', []);
        $categories = Category::whereIn('id', $ids)->get();
        return response()->json(['categories' => $categories]);
    }

    public function show($id)
    {
        return response()->json(Category::find($id));
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $weight = $request->input('weight');

        $category = new Category();
        $category->name = $name;
        $category->weight = $weight;
        $category->save();

        Category::insert(
            [
                [
                    'name' => $name.rand(1,111),
                    'weight' => rand(1,11)
                ],
                [
                    'name' => $name.rand(1,111),
                    'weight' => rand(1,11)
                ],
                [
                    'name' => $name.rand(1,111),
                    'weight' => rand(1,11)
                ],
            ]
        );

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name', $category->name);
        $category->weight = $request->input('weight', $category->weight);
        $category->save();
        return response()->json($category, 202);
    }

    public function destroy($id)
    {
        $res = (bool) Category::findOrFail($id)->delete();
        return response()->json(['result' => $res]);
    }
}
