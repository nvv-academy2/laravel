<?php

namespace App\Services;


use App\Category;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class CategoryService
{
    /** @var Category */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function createCategory(CreateCategory $request)
    {
        $this->save($request);
        return $this->category;
    }

    public function updateCategory(UpdateCategory $request): Category
    {
        $this->save($request);
        return $this->category;
    }

    private function save(FormRequest $request)
    {
        $data = $request->validated();
        $this->category->fill($data);
        $this->category->save();
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;
        return $this;
    }
}