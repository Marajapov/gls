<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
class MinkiyalController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {
         // return view('Front::channel.minkiyal.comingsoon',[]);
        
        $channel = \Model\Channel\ModelName::name('minkiyal')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $photoGalleries = \Model\PhotoParent\ModelName::where('minkiyal','=','1')->where('published','=',true)->orderBy('id','desc')->get();

        return view('Front::channel.minkiyal.index', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'photoGalleries' => $photoGalleries,
            ]);
    }

    public function Posts()
    {
        $channel = \Model\Channel\ModelName::name('minkiyal')->first();

        return view('Front::channel.minkiyal.posts', ['channel' => $channel]);
    }

    public function Gallery(Request $request, $galleryId)
    {

        $gallery = \Model\PhotoParent\ModelName::where('minkiyal','=','1')->where('id','=',$galleryId)->first();
        $images = json_decode($gallery->images);

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

    
        return view('Front::channel.minkiyal.post',[
            'images' => $images,
            'backgroundMain' => $backgroundMain,
            'gallery' => $gallery,
            ]);
    }


}
