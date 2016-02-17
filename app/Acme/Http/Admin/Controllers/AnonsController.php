<?php

namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Model\Anons\ModelName as Anons;
use Intervention\Image\ImageManagerStatic as Image;

class AnonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anons = Anons::get();

        return view('Admin::anons.index', [
            'anons' => $anons,
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
        return view('Admin::anons.create', [
            'anons' => new Anons,
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
        $anons = Anons::create($request->except('thumbnail','owner_id','q'));

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'images/anons';
            $btw = time();

            $name = $anons->id().$btw.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            if($request->channel == 2){
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(1170, 400)->save($dir.'/'.$name);
            } elseif($request->channel == 3) {
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(1170, 360)->save($dir.'/'.$name);
            } elseif($request->channel == 4) {
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(1110, 680)->save($dir.'/'.$name);
            } elseif($request->channel == 6) {
              Image::make($_FILES['thumbnail']['tmp_name'])->fit(1600, 358)->save($dir.'/'.$name);
            } elseif($request->channel == 8) {
              Image::make($_FILES['thumbnail']['tmp_name'])->fit(1600, 358)->save($dir.'/'.$name);
            }

            $anons->thumbnail = $dir.'/'.$name;
            $anons->save();
        }

        return redirect()->route('admin.anons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anons $anons)
    {
        return view('Admin::anons.show', [
            'anons' => $anons,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($anons)
    {
        $channels = \Model\Channel\ModelName::lists('display', 'id')->toArray();
        return view('Admin::anons.edit', [
            'anons' => $anons,
            'channels' => $channels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anons $anons)
    {
        $anons->update($request->except('thumbnail','owner_id','q'));

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'images/anons';
            $btw = time();

            $name = $anons->id().$btw.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            if($request->channel == 2){
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(1170, 400)->save($dir.'/'.$name);
            } elseif($request->channel == 3) {
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(1170, 360)->save($dir.'/'.$name);
            } elseif($request->channel == 4) {
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(1110, 680)->save($dir.'/'.$name);
            }elseif($request->channel == 6) {
              Image::make($_FILES['thumbnail']['tmp_name'])->fit(1600, 358)->save($dir.'/'.$name);
            }elseif($request->channel == 8) {
              Image::make($_FILES['thumbnail']['tmp_name'])->fit(1600, 358)->save($dir.'/'.$name);
            }

            $anons->thumbnail = $dir.'/'.$name;
            $anons->save();
        }

        return redirect()->route('admin.anons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($anons)
    {
        $anons->delete();

        return redirect()->route('admin.anons.index');
    }
}
