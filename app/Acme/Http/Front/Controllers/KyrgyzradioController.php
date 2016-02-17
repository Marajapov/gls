<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
class KyrgyzradioController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {


     // return view('Front::channel.kyrgyzradio.comingsoon',[]);

        $channel = \Model\Channel\ModelName::name('kyrgyzradio')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        
         // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('kyrgyzradio','=','1')->where('published','=',true)->take('6')->orderBy('id','desc')->get();

        $kyrgyzradioProjects = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio', '=', 1)->take('4')->orderBy('id','desc')->get();

        $anons = \Model\Anons\ModelName::where('channel','=','6')->where('published','=','1')->orderBy('id','=','desc')->take(2)->get();
       
        $quoteTopLeft = \Model\Quote\ModelName::where('published','=','1')->where('channel', '=', '6')->orderBy('id','=','desc')->take(2)->skip(0)->get();
        $quoteTopRight = \Model\Quote\ModelName::where('published','=','1')->where('channel', '=', '6')->orderBy('id','=','desc')->take(2)->skip(2)->get();
        $quoteMiddleLeft = \Model\Quote\ModelName::where('published','=','1')->where('channel', '=', '6')->orderBy('id','=','desc')->take(2)->skip(2)->get();
        $quoteMiddleRight = \Model\Quote\ModelName::where('published','=','1')->where('channel', '=', '6')->orderBy('id','=','desc')->take(2)->skip(2)->get();
//        dd($quote);
        return view('Front::channel.kyrgyzradio.index', [
            'channel' => $channel,
            'anons' => $anons,
            'backgroundMain' => $backgroundMain,
            'photoGalleries' => $photoGalleries,
            'kyrgyzradioProjects' => $kyrgyzradioProjects,
            'quoteTopLeft' => $quoteTopLeft,
            'quoteTopRight' => $quoteTopRight,
            'quoteMiddleLeft' => $quoteMiddleLeft,
            'quoteMiddleRight' => $quoteMiddleRight,
            ]);
    }

    public function Posts()
    {
        $channel = \Model\Channel\ModelName::name('kyrgyzradio')->first();

        return view('Front::channel.kyrgyzradio.posts', ['channel' => $channel]);
    }

    public function project(\Model\Project\ModelName $project)
    {
        $projectList = \Model\Project\ModelName::get();
//        $MediaCategory = \Model\MediaCategory\ModelName::get();
        $mediaAll = \Model\Media\ModelName::get();

        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $relatedNews = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio','=',$project->id)->get();

        $kyrgyzradioProjects = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio', '=', 1)->get();


        return view('Front::channel.kyrgyzradio.project',[
                
            'project' => $project,
    //      'MediaCategories'       => $MediaCategories,
            'mainBanner'   => $mainBanner,
            'categories'=>$categories,
            'projectList' => $projectList,
            'backgroundMain' => $backgroundMain,
            'relatedNews' => $relatedNews,
            'kyrgyzradioProjects' => $kyrgyzradioProjects,
            ]
        );
    }

    public function news(\Model\Post\ModelName $post)
    {
        $post->incrementViewed();

        $channel = \Model\Channel\ModelName::name('kyrgyzradio')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        
        $kyrgyzradioProjects = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio', '=', 1)->get();

        $parent = \Model\PhotoParent\ModelName::where('id','=',$post->parentId)->first();
        
        if($parent != null){
            $images = json_decode($parent->images);    
        }else{
            $images = null;
        }   

        $weekFromNow = date('Y-m-d', strtotime('-17 days'));
        $popArticles = \Model\Post\ModelName::where('kyrgyzradio','=','1')->where('created_at','>',$weekFromNow)->languagekg()->orderBy('viewed','desc')->take(6)->get();
        if(count($popArticles) > 0){
            $popArticles = $popArticles;
        }else{
            $popArticles = null;
        }


        return view('Front::channel.kyrgyzradio.news', [
            'channel' => $channel,
            'post' => $post,
            'backgroundMain' => $backgroundMain,
            'kyrgyzradioProjects' => $kyrgyzradioProjects,
            'images' => $images,
            'popArticles' => $popArticles,  
            ]);
    }

    public function allnews()
    {
        
        $channel = \Model\Channel\ModelName::name('kyrgyzradio')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();       
        
        $perPage = 10;  
        
        $postAll = \Model\Post\ModelName::where('kyrgyzradio','=',1)->published()->orderBy('id','desc')->paginate($perPage);         
        
        $kyrgyzradioProjects = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio', '=', 1)->get();

        return view('Front::channel.kyrgyzradio.allnews', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'perPage' => $perPage,
            'postAll' => $postAll,
            'kyrgyzradioProjects' => $kyrgyzradioProjects,
            ]);
    }

        
    public function allphotos()
    {
        $channel = \Model\Channel\ModelName::name('kyrgyzradio')->first();
        $perPage = 24;

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $postAll = \Model\Media\ModelName::where('published','=',true)->where('kyrgyzradio','=','1')->orderBy('id', 'desc')->paginate($perPage);        

        $kyrgyzradioProjects = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio', '=', 1)->get();    

        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('kyrgyzradio','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();        
        return view('Front::channel.kyrgyzradio.allphotos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'kyrgyzradioProjects' => $kyrgyzradioProjects,
            'photoGalleries' => $photoGalleries,
            'postAll' => $postAll,
            'perPage' => $perPage,

            ]);
    }

   // For photos page Dostuk 
    public function Gallery(Request $request, $galleryId)
    {

        $gallery = \Model\PhotoParent\ModelName::where('kyrgyzradio','=','1')->where('id','=',$galleryId)->first();
        $images = json_decode($gallery->images);

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $kyrgyzradioProjects = \Model\Project\ModelName::where('published','=',true)->where('kyrgyzradio', '=', 1)->get();

        return view('Front::channel.kyrgyzradio.photos',[
            'images' => $images,
            'backgroundMain' => $backgroundMain,
            'gallery' => $gallery,
            'kyrgyzradioProjects' => $kyrgyzradioProjects,
            ]);
    }


}
