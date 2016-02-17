<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\Category\ModelName as Category;
use PhpParser\Comment;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = Category::categories()->published()->get();
        $categories = Category::all();

        return view('Admin::category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dostukProgramList = \Model\Project\ModelName::where('dostuk','=','1')->lists('name', 'id')->toArray();
        $birinchiProgramList = \Model\Project\ModelName::where('birinchi','=','1')->lists('name', 'id')->toArray();
        $kyrgyzradioProgramList = \Model\Project\ModelName::where('kyrgyzradio','=','1')->lists('name', 'id')->toArray();

        $birinchiCategories = \Model\Category\ModelName::where('birinchi','=','1')->where('published','=','1')->get();

        return view('Admin::category.create', [
            'category' => new Category,
            'dostukProgramList' => $dostukProgramList,
            'birinchiProgramList' => $birinchiProgramList,
            'kyrgyzradioProgramList' => $kyrgyzradioProgramList,

            'birinchiCategories' => $birinchiCategories,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->except('q'));

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('Admin::category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $birinchiCategories = \Model\Category\ModelName::where('birinchi','=','1')->where('published','=','1')->get();
        return view('Admin::category.edit', [
            'category' => $category,
            'birinchiCategories' => $birinchiCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('q'));

        return redirect()->route('admin.category.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
