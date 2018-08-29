<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Services\CategoryService;
use App\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

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

    public function store(CreateCategory $request)
    {
        $this->categoryService->createCategory($request);
        return redirect()->route('dashboard');
    }

    public function update(UpdateCategory $request, Category $category)
    {
        $this->categoryService->setCategory($category)->updateCategory($request);
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $res = (bool) Category::findOrFail($id)->delete();
        return redirect()->route('dashboard');
    }

    public function upd()
    {
        dd("This is PUT REQUEST");
    }
}
