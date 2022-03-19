<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

class CategoryController extends Controller
{
    public function index()
    {
        // List Categories
        $categories = Category::all();

        // return view('category.index')->with(['categories' => $categories]);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required|unique:categories'
        ]);

        // Crear
        $input = $request->all();
        $input['slug'] = Str::slug($request->name);

        $category = new Category();

        $type = '';
        $message = '';

        if ( $category->fill( $input )->save() ) {
            $type = 'success';
            $message = 'La categoría se guardo con éxito.';
        } else {
            $type = 'danger';
            $message = 'Hubo un error al guardar.';
        }

        // DEvolver vista
        return Redirect::route('categories.index')->with($type, $message);
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $input = $request->all();

        $category->update( $input );

        return Redirect::route('categories.index')->with('success', 'La categoría se actualizó con éxito.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::route('categories.index');
    }
}
