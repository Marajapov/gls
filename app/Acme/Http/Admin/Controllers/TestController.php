<?php
namespace Admin\Controllers;
use Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

use Model\Test\ModelName as Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Admin::test', [
            'test' => new Test,
            ]);
    }

    public function store(Request $request)
    {
        $test = Test::create($request->except('images','q'));
        // getting all of the post data
        $files = Input::file('images');
        $result = array();

        $file_count = count($files);

        // start count how many uploaded
        $uploadcount = 0;

        foreach($files as $key=>$file) {

          // $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
          // $validator = Validator::make(array('file'=> $file), $rules);
          // if($validator->passes()){
            $storage = \Storage::disk('public');
            $destinationPath = 'uploads';
            $storage->makeDirectory($destinationPath);
            $filename = time().$key.'.'.$file->getClientOriginalExtension();

            $upload_success = $file->move($destinationPath, $filename);

            $file_array = array();
            $file_array = array_collapse([$file_array, [
                    'id' => $key+1,
                    'name' => $filename
                ]]);

            $result = array_add($result, $key , $file_array);
            $jsonresult = json_encode($result);
            // $files_ser = serialize($result);
            $test->images = $jsonresult;
            $test->save();

            $uploadcount ++;

          // }
        }

        // dd($test);

        return redirect()->route('admin.show', $test);
    }

    public function show()
    {
        $test = \Model\Test\ModelName::where('id','=','30')->first();
        $images = json_decode($test->images);
        
        return view('Admin::show', [
            'test' => $test,
            'images' => $images,
        ]);
    }
}
