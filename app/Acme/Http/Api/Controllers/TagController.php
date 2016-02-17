<?php
namespace Api\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function Tags(Request $request)
    {
        $tags = \Model\Tag\Tag::where('name', 'LIKE', $request->input('tag').'%')->select('id','name as text')->take(10)->get();
        return response()->json($tags);
    }

}
