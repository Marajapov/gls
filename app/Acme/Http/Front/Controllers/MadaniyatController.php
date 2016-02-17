<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
class MadaniyatController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {

//         return view('Front::channel.madaniyat.comingsoon',[]);
       
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.madaniyat.index', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }

    public function Posts()
    {
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();

        return view('Front::channel.madaniyat.posts', ['channel' => $channel]);
    }

    public function about()
    {
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.madaniyat.about', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }
    public function photos()
    {
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $madaniyatProjects = \Model\Project\ModelName::where('published','=',true)->where('madaniyat', '=', 1)->get();

        return view('Front::channel.madaniyat.photos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'madaniyatProjects' => $madaniyatProjects,
            ]);
    }
    public function broadcasts()
    {
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.madaniyat.broadcasts', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }

    public function ComingSoon()
    {
        $lc = app()->getlocale();
        return view('Front::channel.madaniyat.comingsoon',[
            'lc' => $lc
        ]);
    }

    public function Gallery(Request $request, $galleryId)
    {

        $gallery = \Model\PhotoParent\ModelName::where('madaniyat','=','1')->where('id','=',$galleryId)->first();
        if($gallery != null){

        $images = json_decode($gallery->images);
    }else{
        $images = null;
    }
        $madaniyatProjects = \Model\Project\ModelName::where('published','=',true)->where('madaniyat', '=', 1)->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.madaniyat.photos',[
            'images' => $images,
            'backgroundMain' => $backgroundMain,
            'gallery' => $gallery,
            'madaniyatProjects' => $madaniyatProjects,
            ]);
    }
     public function allphotos()
    {
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();
        $perPage = 24;

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $postAll = \Model\Media\ModelName::where('published','=',true)->where('madaniyat','=','1')->orderBy('id', 'desc')->paginate($perPage);        
        $lc = app()->getlocale();
        if($lc == 'kg'){
            $madaniyatProjects = \Model\Project\ModelName::where('published','=',true)->where('madaniyat','=',1)->where('name','<>','' )->get();    
        }else{
            $madaniyatProjects = \Model\Project\ModelName::where('published','=',true)->where('madaniyat','=',1)->where('nameRu','<>','' )->get();
        }
        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('madaniyat','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();        
        return view('Front::channel.madaniyat.allphotos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'photoGalleries' => $photoGalleries,
            'postAll' => $postAll,
            'perPage' => $perPage,
            'madaniyatProjects' => $madaniyatProjects,  

            ]);
    }
    public function videos()
    {
        $channel = \Model\Channel\ModelName::name('madaniyat')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        
        return view('Front::channel.madaniyat.videos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
        ]);
    }

        public function video()
    {

        $channel = \Model\Channel\ModelName::where('name','=','madaniyat')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
       

        return view('Front::channel.madaniyat.video', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,           
            ]);
    }

}
