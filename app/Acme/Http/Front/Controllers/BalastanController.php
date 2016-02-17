<?php
namespace Front\Controllers;
use Illuminate\Http\Request;

class BalastanController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $balastanProjects = \Model\Project\ModelName::where('balastan','=','1')->orderBy('id','desc')->get();

        $firstMedia = \Model\Media\ModelName::where('balastan','=','1')->orderBy('id','desc')->first();
        $medias = \Model\Media\ModelName::where('balastan','=','1')->take(6)->orderBy('id','desc')->get();

        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('balastan','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();

        if(count($medias) > 0){ $medias = $medias;
        }else{ $medias = null; }
        if(count($photoGalleries) > 0){
            $photoGalleries = $photoGalleries;
        }else{ $photoGalleries = null; }
        if(count($firstMedia)){ $firstMedia = $firstMedia;
        }else{ $firstMedia = null; }

        $anons = \Model\Anons\ModelName::where('channel','=','4')->where('published','=','1')->orderBy('id','=','desc')->take(2)->get();

        return view('Front::channel.balastan.index', [
            'channel' => $channel,
            'anons' => $anons,
            'backgroundMain' => $backgroundMain,
            
            'balastanProjects' => $balastanProjects,

            'firstMedia' => $firstMedia,
            'medias' => $medias,
            'photoGalleries' => $photoGalleries,
            ]);
    }

    public function Posts()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();

        return view('Front::channel.balastan.posts', ['channel' => $channel]);
    }
  public function about()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.balastan.about', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }

    public function world()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.balastan.world', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }
    public function photos()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.balastan.photos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            ]);
    }   
    public function video($media)
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $balastanLastVideo = \Model\Media\ModelName::where('id','=',$media)->take(1)->orderBy('id','desc')->first();
        $balastanProjects = \Model\Project\ModelName::where('balastan','=','1')->orderBy('id','desc')->get();
        
        $balastanMedias = \Model\Media\ModelName::where('program','=',$balastanLastVideo->hasProject()->first()->id)->where('id', '<>', $media)->orderBy('id','desc')->get();

        return view('Front::channel.balastan.video', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,

            'balastanLastVideo' => $balastanLastVideo,
            'balastanProjects' => $balastanProjects,
            'balastanMedias' => $balastanMedias,
            ]);
    }
    // For photos page One gallery 
     public function Gallery($galleryId)
    {
        $lc = app()->getlocale();

        $gallery = \Model\PhotoParent\ModelName::where('balastan','=','1')->where('id','=',$galleryId)->first();
        $images = json_decode($gallery->images);

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.balastan.photos',[
            'lc' => $lc,
            'images' => $images,
            'backgroundMain' => $backgroundMain,
            'gallery' => $gallery,
            ]);
    }

    public function projectVideos($project)
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $programId = $project->id;
        


        $balastanProjects = \Model\Project\ModelName::where('balastan','=','1')->orderBy('id','desc')->get();
        $balastanMedias = \Model\Media\ModelName::where('program','=',$programId)->take(8)->skip(0)->orderBy('id','desc')->get();

        return view('Front::channel.balastan.videos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'balastanProjects' => $balastanProjects,
            'balastanMedias' => $balastanMedias,
            'project' => $project,
        ]);
    }

    public function videos(Request $request)
    {

        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();


        $balastanProjects = \Model\Project\ModelName::where('balastan','=','1')->orderBy('id','desc')->get();
        $balastanMedias = \Model\Media\ModelName::where('balastan','=','1')->orderBy('id','desc')->get();

        return view('Front::channel.balastan.videos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'balastanProjects' => $balastanProjects,
            'balastanMedias' => $balastanMedias,

            'project' => '',
            ]);
    }

      public function allphotos()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $perPage = 24;

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $postAll = \Model\Media\ModelName::where('published','=',true)->where('balastan','=','1')->orderBy('id', 'desc')->paginate($perPage);        


        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('balastan','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();        
        return view('Front::channel.balastan.allphotos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'photoGalleries' => $photoGalleries,
            'postAll' => $postAll,
            'perPage' => $perPage,

            ]);
    }

    public function vertex()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $firstMedia = \Model\Media\ModelName::where('balastan','=','1')->orderBy('id','desc')->first();
        $medias = \Model\Media\ModelName::where('balastan','=','1')->take(6)->orderBy('id','desc')->get();

        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('balastan','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();

        if(count($medias) > 0){ $medias = $medias;
        }else{ $medias = null; }
        if(count($photoGalleries) > 0){
            $photoGalleries = $photoGalleries;
        }else{ $photoGalleries = null; }
        if(count($firstMedia)){ $firstMedia = $firstMedia;
        }else{ $firstMedia = null; }

        return view('Front::channel.balastan.vertex', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,

            'firstMedia' => $firstMedia,
            'medias' => $medias,
            'photoGalleries' => $photoGalleries,
            ]);
    }    

}
