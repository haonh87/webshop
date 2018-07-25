<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::paginate(PAGINATE);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();

        $category->name_en = $request->input("name_en");
        $category->name_ru = $request->input("name_ru");

        $category->save();

        return redirect()->action('Admin\CategoryController@index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name_en = $request->input("name_en");
        $category->name_ru = $request->input("name_ru");
        $category->description_en = $request->input("description_en");
        $category->description_ru = $request->input("description_ru");
        $category->parent_id = $request->input("parent_id");

        $category->save();

        return redirect()->action('Admin\CategoryController@index')->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->action('Admin\CategoryController@index')->with('message', 'Item deleted successfully.');
    }

}
