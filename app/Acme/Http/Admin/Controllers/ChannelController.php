<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\Channel\ModelName as Channel;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::get();

        return view('Admin::channel.index', ['channels' => $channels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::channel.create', ['channel' => new Channel()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $channel = Channel::create($request->except('file','q'));

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $dir  = 'img/icons';
            $name = $channel->id().'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);
            // $storage->put($dir.'/'.$name, $file);

            $channel->file = $dir.'/'.$name;
            $channel->save();
            $file->move($dir, $name);
        }

       



        return redirect()->route('admin.channel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('Admin::channel.show', ['channel' => $channel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('Admin::channel.edit', ['channel' => $channel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $channel->update($request->except('file','q'));

        if($request->hasFile('file'))
        {
            $file = $request->file('file');

            $dir  = 'img/icons';
            $name = $channel->id().'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            $channel->file = $dir.'/'.$name;
            $channel->save();
            $file->move($dir, $name);
        }


        return redirect()->route('admin.channel.show', $channel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();

        return redirect()->route('admin.channel.index');
    }
}
