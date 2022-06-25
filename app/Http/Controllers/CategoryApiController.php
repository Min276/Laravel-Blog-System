<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
   //GET /api/categories
    public function index()
    {
        return Category::all();
    }

   //POST /api/categories
    public function store()
    {
        $validator = validator(request()->all(), [
            "name" => "required"
        ]);

        if($validator->fails()) return abort(400);

        $category = new Category;
        $category->name = request()->name;
        $category->save();

        return $category;
    }

   //GET /api/categories/id
    public function show($id)
    {
        return Category::find($id);
    }

    //PUT /api/categories/id
    public function update($id)
    {
        $category = Category::find($id);
        $category->name = request()->name;
        $category->save();

        return $category;
    }

    //DELETE /api/categories/id
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return $category;
    }
}
