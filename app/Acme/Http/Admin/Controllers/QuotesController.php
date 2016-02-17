<?php

namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\Quote\ModelName as Quote;
use Intervention\Image\ImageManagerStatic as Image;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quote = Quote::get();

        return view('Admin::quote.index', [
            'quote' => $quote,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = \Model\Channel\ModelName::lists('display', 'id')->toArray();
        return view('Admin::quote.create', [
            'quote' => new Quote,
            'channels' => $channels,
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
        $quote = Quote::create($request->except('file','q'));

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $dir  = 'img/quote';
            $name = $quote->id().'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);
            // $storage->put($dir.'/'.$name, $file);

            if($request->channel == 6){
                Image::make($_FILES['file']['tmp_name'])->fit(150, 110)->save($dir.'/'.$name);
            } 

            $quote->file = $dir.'/'.$name;
            $quote->save();
        }

        return redirect()->route('admin.quote.index');
    }

    public function show(Quote $quote)
    {
        return view('Admin::quote.show', [
            'quote' => $quote,
        ]);
    }

    public function edit(Quote $quote)
    {
        $channels = \Model\Channel\ModelName::lists('display', 'id')->toArray();
        return view('Admin::quote.edit', [
            'quote' => $quote,
            'channels' => $channels,
        ]);
    }

    public function update(Request $request, Quote $quote)
    {
        $quote->update($request->except('file','q'));

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $dir  = 'img/quote';
            $name = $quote->id().'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            if($request->channel == 6){
                Image::make($_FILES['file']['tmp_name'])->fit(150, 110)->save($dir.'/'.$name);
            } 

            $quote->file = $dir.'/'.$name;
            $quote->save();
        }

        return redirect()->route('admin.quote.show', $quote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quote)
    {
        $quote->delete();

        return redirect()->route('admin.quote.index');
    }
}
