<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function renderDashboard()
    {
        return view('admin/dashboard');
    }

    //* Product
    public function renderArchiveProduct()
    {
        $p = [
            'products' => Product::all()
        ];

        return view('admin/archive-product')->with($p);
    }

    public function renderSingleProduct($id)
    {
        $p = [
            'product' => Product::where('id', $id)->first()
        ];

        return view('admin/single-product')->with($p);
    }

    public function renderNewProduct()
    {
        $p = [
            'allCategories' => Category::all()
        ];

        return view('admin/new-product')->with($p);
    }

    public function createProduct(Request $request)
    {
        try {
            Product::create([
                'name' => $request->get('name'),
            ]);
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->to('/admin/product');
    }

    //* Category
    public function renderArchiveCategory()
    {
        $p = [
            'categories' => Category::all()
        ];

        return view('admin/archive-category')->with($p);
    }

    public function renderSingleCategory($id)
    {
        $p = [
            'category' => Category::where('id', $id)->first()
        ];

        return view('admin/single-category')->with($p);
    }

    public function createCategory(Request $request)
    {
        $category = new Category;
        $category->name = $request->get('name');
        try {
            $category->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        return response()->json([
            "message" => "Created new category successfully.",
            "category" => [
                "name" => $category->name,
                "id" => $category->id,
                "url" => url("/admin/product/{$category->id}")
            ]
        ], 200);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        try {
            $category->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect('admin/category');
    }

    public function updateCategory(Request $request, $id)
    {
        try {
            Category::find($id)
                ->update($request->all());
        } catch (\Exception $e) {
            throw $e;
        }
        return response()->json([
            "message" => "Category info updated successfully."
        ], 200);
    }
}
