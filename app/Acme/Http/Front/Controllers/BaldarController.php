<?php
namespace Front\Controllers;
//use Illuminate\Http\Request;
class BaldarController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {
        $channel = \Model\Channel\ModelName::name('baldar')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.baldar.index', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }

    public function Posts()
    {
        $channel = \Model\Channel\ModelName::name('baldar')->first();

        return view('Front::channel.baldar.posts', ['channel' => $channel]);
    }


}
