<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\MediaCategory\ModelName as MediaCategory;

class MediaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mediaCategories = mediaCategories::categories()->published()->get();
        $mediaCategories = MediaCategory::all();

        return view('Admin::mediaCategory.index', ['mediaCategories' => $mediaCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::mediaCategory.create', ['mediaCategory' => new MediaCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MediaCategory::create($request->except('q'));

        return redirect()->route('admin.mediaCategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MediaCategory $mediaCategory)
    {
        return view('Admin::mediaCategory.show', ['mediaCategory' => $mediaCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaCategory $mediaCategory)
    {
        return view('Admin::mediaCategory.edit', ['mediaCategory' => $mediaCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaCategory $mediaCategory)
    {
        $mediaCategory->update($request->except('q'));

        return redirect()->route('admin.mediaCategory.show', $mediaCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaCategory $mediaCategory)
    {
        $mediaCategory->delete();

        return redirect()->route('admin.mediaCategory.index');
    }
}
