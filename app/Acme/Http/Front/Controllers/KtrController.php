<?php
namespace Front\Controllers;
//use Illuminate\Http\Request;
class KtrController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {
        $channel = \Model\Channel\ModelName::name('ktr')->first();

        return view('Front::channel.ktr.index', ['channel' => $channel]);
    }

    public function Posts()
    {
        $channel = \Model\Channel\ModelName::name('ktr')->first();

        return view('Front::channel.ktr.posts', ['channel' => $channel]);
    }


}
