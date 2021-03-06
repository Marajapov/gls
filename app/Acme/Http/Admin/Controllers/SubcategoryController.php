<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\Subcategory\ModelName as Subcategory;

class SubcategoryController extends Controller
{

    public function index()
    {
        $perPage = 10;
        $subcategories = Subcategory::orderBy('id','desc')->paginate($perPage);

        return view('Admin::subcategory.index', [
            'perPage' => $perPage,
            'subcategories' => $subcategories,
        ]);
    }

    public function create()
    {
        $categoryList = \Model\Category\ModelName::lists('name', 'id')->toArray();
        return view('Admin::subcategory.create', [
            'subcategory'  => new Subcategory,
            'categoryList' => $categoryList,
        ]);
    }

    public function store(Request $request)
    {
        Subcategory::create($request->except('q'));

        return redirect()->route('admin.subcategory.index');
    }

    public function show($subcategory)
    {
        
        return view('Admin::subcategory.show', [
            'subcategory' => $subcategory,
        ]);
    }

    public function edit(Subcategory $subcategory)
    {
        $categoryList = \Model\Category\ModelName::lists('name', 'id')->toArray();
        return view('Admin::subcategory.edit', [
            'subcategory' => $subcategory,
            'categoryList' => $categoryList,
        ]);
    }

    public function update(Request $request, $subcategory)
    {
        $subcategory->update($request->except('q'));
        return redirect()->route('admin.subcategory.index');
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategory.index');
    }

    public function deleteItem(Request $request)
    {
        $subcategory = Subcategory::where('id','=',$request->id)->first();
        $subcategory->delete();
        return redirect()->route('admin.order.index');
    }
}