<?php
namespace Front\Controllers;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use \Model\Comment\ModelName as Comment;

class HomeController extends Controller
{
    protected $positionTop, $positionRight, $positionCenter, $positionBottom, $positionLeft;
    
    public function __construct()
    {
        $this->positionTop = \Model\Banner\ModelName::where('positionTop','=','1')->first();
        $this->positionRight = \Model\Banner\ModelName::where('positionRight','=','1')->first();
        $this->positionLeft = \Model\Banner\ModelName::where('positionLeft','=','1')->first();
        $this->positionCenter = \Model\Banner\ModelName::where('positionCenter','=','1')->first();
        $this->positionBottom = \Model\Banner\ModelName::where('positionBottom','=','1')->first();
    }
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function Home()
    {
        $lc = app()->getlocale();

        $channel = \Model\Channel\ModelName::general();

        $channels = \Model\Channel\ModelName::take(8)->skip(1)->get();
       
        if($lc == 'kg'){
            $generalPost1 = \Model\Post\ModelName::general($channel)->published()->having('number','=',1)->languagekg()->first();
            if($generalPost1 == null){
                $generalPost1 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(10)->first();    
            }

            $generalPost2 = \Model\Post\ModelName::general($channel)->published()->having('number','=',2)->languagekg()->first();

            if($generalPost2 == null){
                $generalPost2 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(15)->first();
            }

            $generalPost3 = \Model\Post\ModelName::general($channel)->published()->having('number','=',3)->languagekg()->first();
            if($generalPost3 == null){
                $generalPost3 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(2)->first();
            }
            
            $generalPost4 = \Model\Post\ModelName::general($channel)->published()->having('number','=',4)->languagekg()->first();
            if($generalPost4 == null){
                $generalPost4 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(30)->first();
            }
            
            $generalPost5 = \Model\Post\ModelName::general($channel)->published()->having('number','=',5)->languagekg()->first();
            if($generalPost5 == null){
                $generalPost5 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(40)->first();    
            }
            

            $generalPost6 = \Model\Post\ModelName::general($channel)->published()->having('number','=',6)->languagekg()->first();
            if($generalPost6 == null){
                $generalPost6 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(50)->first();
            }

            $projects = \Model\Project\ModelName::having('name','<>','')->get();
            $directorPosts = \Model\Post\ModelName::where('director','=','1')->orderBy('id','desc')->take(3)->languagekg()->get();
            $reporterPosts = \Model\Post\ModelName::where('reporter','=','1')->orderBy('id','desc')->take(15)->languagekg()->get();
            
        }elseif($lc == 'ru'){
            $generalPost1 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',1)->languageru()->first();
            if($generalPost1 == null){
                $generalPost1 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(32)->first();
            }
            
            $generalPost2 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',2)->languageru()->first();
            if($generalPost2 == null){
                $generalPost2 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(17)->first();
            }
            
            $generalPost3 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',3)->languageru()->first();
            if($generalPost3 == null){
                $generalPost3 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(22)->first();
            }
            
            $generalPost4 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',4)->languageru()->first();
            if($generalPost4 == null){
                $generalPost4 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(33)->first();
            }

            $generalPost5 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',5)->languageru()->first();
            if($generalPost5 == null){
                $generalPost5 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(44)->first();
            }
            
            $generalPost6 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',6)->languageru()->first();
            if($generalPost6 == null){
                $generalPost6 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(51)->first();
            }

            $projects = \Model\Project\ModelName::where('nameRu','<>','')->get();
            $directorPosts = \Model\Post\ModelName::where('director','=','1')->orderBy('id','desc')->take(3)->languageru()->get();
            $reporterPosts = \Model\Post\ModelName::where('reporter','=','1')->orderBy('id','desc')->take(15)->languageru()->get();
        }

        if($lc == 'kg'){
            $latestPosts = \Model\Post\ModelName::general($channel)->published()->having('number','=','99')->where('general','=','1')->where('fbpost','<>','1')->languagekg()->take(6)->skip(0)->orderBy('created_at','desc')->get();
        }elseif($lc == 'ru'){
            $latestPosts = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=','99')->where('general','=','1')->where('fbpost','<>','1')->languageru()->take(6)->skip(0)->orderBy('created_at','desc')->get();
        }

        $dayVideo1 = \Model\Media\ModelName::where('dayVideo','=','1')->first();
        $dayVideoRu1 = \Model\Media\ModelName::where('dayVideo','=','11')->first();
        $dayVideo2 = \Model\Media\ModelName::where('dayVideo','=','2')->first();
        $dayVideo3 = \Model\Media\ModelName::where('dayVideo','=','3')->first();
        $dayVideo4 = \Model\Media\ModelName::where('dayVideo','=','4')->first();

        if($dayVideo1 && $lc=='kg'){
            $dayVideo1 = $dayVideo1;
        } elseif($dayVideoRu1 && $lc=='ru') {
            $dayVideo1 = $dayVideoRu1;
        } else {
            $dayVideo1 = '';
        }
        if($dayVideo2){
            $dayVideo2 = $dayVideo2;
        } else {
            $dayVideo2 = '';
        }
        if($dayVideo3){
            $dayVideo3 = $dayVideo3;
        } else {
            $dayVideo3 = '';
        }
        if($dayVideo4){
            $dayVideo4 = $dayVideo4;
        } else {
            $dayVideo4 = '';
        }

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $peopleReporters = \Model\PeopleReporter\ModelName::where('published','=',true)->get();

        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('extracolumn','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();

        $MediaCategories = \Model\MediaCategory\ModelName::orderBy('id','asc')->get();
        $mediaPosts = \Model\Media\ModelName::orderBy('id','desc')->get();

        $categoriesVideos = array();

        foreach($MediaCategories as $MediaCategory){
            $CategoryVideos = \Model\Media\ModelName::where('videoType','=',$MediaCategory->videoType)->where('published','=','1')->orderBy('id','desc')->take(9)->get();
            $categoriesVideos = array_add($categoriesVideos, $MediaCategory->videoType, $CategoryVideos);
        }

        $mediaLastVideos = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->take(9)->get();

        $defaultVideo = 'rjXSurFi8uQ';

        return view('Front::home', [
//        return view('Front::test', [

            'lc' =>$lc,

            'generalPost1'   => $generalPost1,
            'generalPost2'   => $generalPost2,
            'generalPost3'   => $generalPost3,
            'generalPost4'   => $generalPost4,
            'generalPost5'   => $generalPost5,
            'generalPost6'   => $generalPost6,
            
            'dayVideo1'      => $dayVideo1,
            'dayVideo2'      => $dayVideo2,
            'dayVideo3'      => $dayVideo3,
            'dayVideo4'      => $dayVideo4,
            'defaultVideo'   => $defaultVideo,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionLeft'  => $this->positionLeft,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'peopleReporters' => $peopleReporters,
            'photoGalleries' => $photoGalleries,
            
            'backgroundMain' => $backgroundMain,
            'MediaCategories' => $MediaCategories,
            'categoriesVideos' => $categoriesVideos,
            'mediaLastVideos' => $mediaLastVideos,
            'projects' => $projects,
            'directorPosts' => $directorPosts,
            'reporterPosts' => $reporterPosts,
            'latestPosts' => $latestPosts,

            'channels' => $channels,
            ]);
    }

    public function Test()
    {
        $lc = app()->getlocale();

        $channel = \Model\Channel\ModelName::general();

        $channels = \Model\Channel\ModelName::take(8)->skip(1)->get();

        if($lc == 'kg'){
            $generalPost1 = \Model\Post\ModelName::general($channel)->published()->having('number','=',1)->languagekg()->first();
            if($generalPost1 == null){
                $generalPost1 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(10)->first();
            }

            $generalPost2 = \Model\Post\ModelName::general($channel)->published()->having('number','=',2)->languagekg()->first();

            if($generalPost2 == null){
                $generalPost2 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(15)->first();
            }

            $generalPost3 = \Model\Post\ModelName::general($channel)->published()->having('number','=',3)->languagekg()->first();
            if($generalPost3 == null){
                $generalPost3 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(2)->first();
            }

            $generalPost4 = \Model\Post\ModelName::general($channel)->published()->having('number','=',4)->languagekg()->first();
            if($generalPost4 == null){
                $generalPost4 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(30)->first();
            }

            $generalPost5 = \Model\Post\ModelName::general($channel)->published()->having('number','=',5)->languagekg()->first();
            if($generalPost5 == null){
                $generalPost5 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(40)->first();
            }


            $generalPost6 = \Model\Post\ModelName::general($channel)->published()->having('number','=',6)->languagekg()->first();
            if($generalPost6 == null){
                $generalPost6 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languagekg()->orderBy('id','desc')->take(1)->skip(50)->first();
            }

            $projects = \Model\Project\ModelName::having('name','<>','')->get();
            $directorPosts = \Model\Post\ModelName::where('director','=','1')->orderBy('id','desc')->take(3)->languagekg()->get();
            $reporterPosts = \Model\Post\ModelName::where('reporter','=','1')->orderBy('id','desc')->take(15)->languagekg()->get();

        }elseif($lc == 'ru'){
            $generalPost1 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',1)->languageru()->first();
            if($generalPost1 == null){
                $generalPost1 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(32)->first();
            }

            $generalPost2 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',2)->languageru()->first();
            if($generalPost2 == null){
                $generalPost2 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(17)->first();
            }

            $generalPost3 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',3)->languageru()->first();
            if($generalPost3 == null){
                $generalPost3 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(22)->first();
            }

            $generalPost4 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',4)->languageru()->first();
            if($generalPost4 == null){
                $generalPost4 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(33)->first();
            }

            $generalPost5 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',5)->languageru()->first();
            if($generalPost5 == null){
                $generalPost5 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(44)->first();
            }

            $generalPost6 = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=',6)->languageru()->first();
            if($generalPost6 == null){
                $generalPost6 = \Model\Post\ModelName::general($channel)->published()->where('general','=','1')->languageru()->orderBy('id','desc')->take(1)->skip(51)->first();
            }

            $projects = \Model\Project\ModelName::where('nameRu','<>','')->get();
            $directorPosts = \Model\Post\ModelName::where('director','=','1')->orderBy('id','desc')->take(3)->languageru()->get();
            $reporterPosts = \Model\Post\ModelName::where('reporter','=','1')->orderBy('id','desc')->take(15)->languageru()->get();
        }

        if($lc == 'kg'){
            $latestPosts = \Model\Post\ModelName::general($channel)->published()->having('number','=','99')->where('general','=','1')->languagekg()->take(6)->skip(0)->orderBy('created_at','desc')->get();
        }elseif($lc == 'ru'){
            $latestPosts = \Model\Post\ModelName::general($channel)->published()->having('numberRu','=','99')->where('general','=','1')->languageru()->take(6)->skip(0)->orderBy('created_at','desc')->get();
        }

        $dayVideo1 = \Model\Media\ModelName::where('dayVideo','=','1')->first();
        $dayVideo2 = \Model\Media\ModelName::where('dayVideo','=','2')->first();
        $dayVideo3 = \Model\Media\ModelName::where('dayVideo','=','3')->first();
        $dayVideo4 = \Model\Media\ModelName::where('dayVideo','=','4')->first();
        $dayVideo5 = \Model\Media\ModelName::where('dayVideo','=','5')->first();

        if($dayVideo1){
            $dayVideo1 = $dayVideo1;
        } else {
            $dayVideo1 = '';
        }
        if($dayVideo2){
            $dayVideo2 = $dayVideo2;
        } else {
            $dayVideo2 = '';
        }
        if($dayVideo3){
            $dayVideo3 = $dayVideo3;
        } else {
            $dayVideo3 = '';
        }
        if($dayVideo4){
            $dayVideo4 = $dayVideo4;
        } else {
            $dayVideo4 = '';
        }

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $peopleReporters = \Model\PeopleReporter\ModelName::where('published','=',true)->get();

        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('extracolumn','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();

        $MediaCategories = \Model\MediaCategory\ModelName::orderBy('id','asc')->get();
        $mediaPosts = \Model\Media\ModelName::orderBy('id','desc')->get();

        $categoriesVideos = array();

        foreach($MediaCategories as $MediaCategory){
            $CategoryVideos = \Model\Media\ModelName::where('videoType','=',$MediaCategory->videoType)->where('published','=','1')->orderBy('id','desc')->take(9)->get();
            $categoriesVideos = array_add($categoriesVideos, $MediaCategory->videoType, $CategoryVideos);
        }

        $mediaLastVideos = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->take(9)->get();

        $defaultVideo = 'rjXSurFi8uQ';

//        return view('Front::home', [
        return view('Front::test', [

            'generalPost1'   => $generalPost1,
            'generalPost2'   => $generalPost2,
            'generalPost3'   => $generalPost3,
            'generalPost4'   => $generalPost4,
            'generalPost5'   => $generalPost5,
            'generalPost6'   => $generalPost6,

            'dayVideo1'      => $dayVideo1,
            'dayVideo2'      => $dayVideo2,
            'dayVideo3'      => $dayVideo3,
            'dayVideo4'      => $dayVideo4,
            'defaultVideo'   => $defaultVideo,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionLeft'  => $this->positionLeft,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'peopleReporters' => $peopleReporters,
            'photoGalleries' => $photoGalleries,

            'backgroundMain' => $backgroundMain,
            'MediaCategories' => $MediaCategories,
            'categoriesVideos' => $categoriesVideos,
            'mediaLastVideos' => $mediaLastVideos,
            'projects' => $projects,
            'directorPosts' => $directorPosts,
            'reporterPosts' => $reporterPosts,
            'latestPosts' => $latestPosts,

            'channels' => $channels,
        ]);
    }

    public function Post(\Model\Post\ModelName $post, $locale = "kg", $title = "")
    {
        $post->incrementViewed();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $lc = in_array($locale, ['kg', 'ru'])? $locale : 'kg';
        
        app()->setlocale($lc);
        
        $categories = \Model\Category\ModelName::where('general','=','1')->get();

        $parent = \Model\PhotoParent\ModelName::where('id','=',$post->parentId)->first();
        if($parent){
            $images = json_decode($parent->images);    
        }else{
            $images = null;
        }

        if($lc == 'kg'){

            $contentOriginal = $post->getContent();

            $relatedPosts = \Model\Post\ModelName::where('category_id','=',$post->category_id)->where('general','=','1')->languagekg()->take(6)->skip(0)->orderBy('id', 'desc')->get();

            $contentFinal = $contentOriginal;

            if($post->related1)
            {
                if(strpos($contentFinal, 'POST1LEFT') != false)
                {
                    $post1Pos = strripos($contentFinal, 'POST1LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionLeft($post->related1), $post1Pos, 9);
                }
                elseif(strpos($contentFinal, 'POST1RIGHT') != false)
                {
                    $post1Pos = strripos($contentFinal, 'POST1RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionRight($post->related1), $post1Pos, 10);
                }
            }

            if($post->related2)
            {
                if(strpos($contentFinal, 'POST2LEFT') != false)
                {
                    $post2Pos = strripos($contentFinal, 'POST2LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionLeft($post->related2), $post2Pos, 9);
                }
                elseif(strpos($contentFinal, 'POST2RIGHT') != false)
                {
                    $post2Pos = strripos($contentFinal, 'POST2RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionRight($post->related2), $post2Pos, 10);
                }
            }

            if($post->related3)
            {
                if(strpos($contentFinal, 'POST3LEFT') != false)
                {
                    $post3Pos = strripos($contentFinal, 'POST3LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionLeft($post->related3), $post3Pos, 9);
                }
                elseif(strpos($contentFinal, 'POST3RIGHT') != false)
                {
                    $post3Pos = strripos($contentFinal, 'POST3RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionRight($post->related3), $post3Pos, 10);
                }
            }

            if($post->relatedMedia1)
            {
                if(strpos($contentFinal, 'MEDIA1LEFT') != false)
                {
                    $media1Pos = strripos($contentFinal, 'MEDIA1LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionLeft($post->relatedMedia1), $media1Pos, 10);
                }
                elseif(strpos($contentFinal, 'MEDIA1RIGHT') != false)
                {
                    $media1Pos = strripos($contentFinal, 'MEDIA1RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionRight($post->relatedMedia1), $media1Pos, 11);
                }
            }

            if($post->relatedMedia2)
            {
                if(strpos($contentFinal, 'MEDIA2LEFT') != false)
                {
                    $media2Pos = strripos($contentFinal, 'MEDIA2LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionLeft($post->relatedMedia2), $media2Pos, 10);
                }
                elseif(strpos($contentFinal, 'MEDIA2RIGHT') != false)
                {
                    $media2Pos = strripos($contentFinal, 'MEDIA2RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionRight($post->relatedMedia2), $media2Pos, 11);
                }
            }

            if($post->relatedMedia3)
            {
                if(strpos($contentFinal, 'MEDIA3LEFT') != false)
                {
                    $media3Pos = strripos($contentFinal, 'MEDIA3LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionLeft($post->relatedMedia3), $media3Pos, 10);
                }
                elseif(strpos($contentFinal, 'MEDIA3RIGHT') != false)
                {
                    $media3Pos = strripos($contentFinal, 'MEDIA3RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionRight($post->relatedMedia3), $media3Pos, 11);
                }
            }

            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('number','=','88')->orderBy('updated_at','desc')->take(6)->get();

            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }

        }elseif($lc == 'ru'){
            $contentOriginal = $post->getContent();

            $relatedPosts = \Model\Post\ModelName::where('category_id','=',$post->category_id)->where('general','=','1')->languageru()->take(6)->skip(0)->orderBy('id', 'desc')->get();

            $contentFinal = $contentOriginal;
            if($post->relatedRu1)
            {
                if(strpos($contentFinal, 'POST1LEFT') != false)
                {
                    $post1Pos = strripos($contentFinal, 'POST1LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionLeft($post->relatedRu1), $post1Pos, 9);
                }
                elseif(strpos($contentFinal, 'POST1RIGHT') != false)
                {
                    $post1Pos = strripos($contentFinal, 'POST1RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionRight($post->relatedRu1), $post1Pos, 10);
                }
            }

            if($post->relatedRu2)
            {
                if(strpos($contentFinal, 'POST2LEFT') != false)
                {
                    $post2Pos = strripos($contentFinal, 'POST2LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionLeft($post->relatedRu2), $post2Pos, 9);
                }
                elseif(strpos($contentFinal, 'POST2RIGHT') != false)
                {
                    $post2Pos = strripos($contentFinal, 'POST2RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionRight($post->relatedRu2), $post2Pos, 10);
                }
            }

            if($post->relatedRu3)
            {
                if(strpos($contentFinal, 'POST3LEFT') != false)
                {
                    $post3Pos = strripos($contentFinal, 'POST3LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionLeft($post->relatedRu3), $post3Pos, 9);
                }
                elseif(strpos($contentFinal, 'POST3RIGHT') != false)
                {
                    $post3Pos = strripos($contentFinal, 'POST3RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedFunctionRight($post->relatedRu3), $post3Pos, 10);
                }
            }

            if($post->relatedMediaRu1)
            {
                if(strpos($contentFinal, 'MEDIA1LEFT') != false)
                {
                    $media1Pos = strripos($contentFinal, 'MEDIA1LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionLeft($post->relatedMediaRu1), $media1Pos, 10);
                }
                elseif(strpos($contentFinal, 'MEDIA1RIGHT') != false)
                {
                    $media1Pos = strripos($contentFinal, 'MEDIA1RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionRight($post->relatedMediaRu1), $media1Pos, 11);
                }
            }

            if($post->relatedMediaRu2)
            {
                if(strpos($contentFinal, 'MEDIA2LEFT') != false)
                {
                    $media2Pos = strripos($contentFinal, 'MEDIA2LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionLeft($post->relatedMediaRu2), $media2Pos, 10);
                }
                elseif(strpos($contentFinal, 'MEDIA2RIGHT') != false)
                {
                    $media2Pos = strripos($contentFinal, 'MEDIA2RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionRight($post->relatedMediaRu2), $media2Pos, 11);
                }
            }

            if($post->relatedMediaRu3)
            {
                if(strpos($contentFinal, 'MEDIA3LEFT') != false)
                {
                    $media3Pos = strripos($contentFinal, 'MEDIA3LEFT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionLeft($post->relatedMediaRu3), $media3Pos, 10);
                }
                elseif(strpos($contentFinal, 'MEDIA3RIGHT') != false)
                {
                    $media3Pos = strripos($contentFinal, 'MEDIA3RIGHT');
                    $contentFinal = substr_replace($contentFinal, $post->relatedMediaFunctionRight($post->relatedMediaRu3), $media3Pos, 11);
                }
            }

            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('numberRu','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }

        $comments = Comment::where('resourceType','=','post')->where('resourceId','=',$post->id)->where('approved','=','1')->orderBy('id','desc')->get();

        return view('Front::post.post',[
            'lc' => $lc,
            'post' => $post,
            'topArticles' => $topArticles,
            'popArticles' => $popArticles,

            'relatedPosts' => $relatedPosts,

            'images' => $images,
            'content' => $contentFinal,
            'comments' => $comments,

            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
            ]);

    }

     public function Posts()
    {        
        $lc = app()->getlocale();
        if($lc == 'kg'){
            $postAll = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->orderBy('id','desc')->get();

        }elseif($lc == 'ru'){
            $postAll = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->orderBy('id','desc')->get();
        }

        if($lc == 'kg'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('number','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }

        }elseif($lc == 'ru'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('numberRu','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }

        $categories = \Model\Category\ModelName::where('general','=','1')->where('published','=','1')->where('order','>','0')->orderBy('order','asc')->get();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $leftCategories = array();
        $middleCategories = array();
        $rightCategories = array();
        $posts = array();
        $headerPosts = array();

        foreach($categories as $key=>$category){

            if($lc == 'kg'){

                $categoryHeaderPosts = \Model\Post\ModelName::where('general','=','1')->where('category_id','=',$category->id)->where('published','=','1')->where('title','<>','')->orderBy('id','desc')->take(1)->get();
                foreach($categoryHeaderPosts as $categoryHeaderPost){
                    $headerPosts[] = $categoryHeaderPost;
                }
                if(count($categoryHeaderPosts) == 0 ){
                    unset($categories[$key]);
                }

                $categoryPosts = \Model\Post\ModelName::where('general','=','1')->where('category_id','=',$category->id)->where('published','=','1')->where('title','<>','')->orderBy('id','desc')->take(2)->skip(1)->get();
                foreach($categoryPosts as $categoryPost){
                    $posts[] = $categoryPost;
                }

            } elseif($lc == 'ru') {

                $categoryHeaderPosts = \Model\Post\ModelName::where('general','=','1')->where('category_id','=',$category->id)->where('published','=','1')->where('titleRu','<>','')->orderBy('id','desc')->take(1)->get();
                foreach($categoryHeaderPosts as $categoryHeaderPost){
                    $headerPosts[] = $categoryHeaderPost;
                }
                if(count($categoryHeaderPosts) == 0 ){
                    unset($categories[$key]);
                }

                $categoryPosts = \Model\Post\ModelName::where('general','=','1')->where('category_id','=',$category->id)->where('published','=','1')->where('titleRu','<>','')->orderBy('id','desc')->take(2)->skip(1)->get();
                foreach($categoryPosts as $categoryPost){
                    $posts[] = $categoryPost;
                }

            }
        }

        session(['categories'=>$categories]);

        foreach (session('categories') as $key1=>$category1) {
            $key1 = $key1+1;
            if($key1 % 3 == 1){
                $leftCategories[] = $category1;
            } else if($key1 % 3 == 2){
                $middleCategories[] = $category1;
            } else if($key1 % 3 == 0){
                $rightCategories[] = $category1;
            }
        }

        return view('Front::post.posts',[
            'postAll' => $postAll,
            'headerPosts' => $headerPosts,
            'posts' => $posts,
            'topArticles' => $topArticles,
            'popArticles' => $popArticles,
            'categories'=>$categories,
            'leftCategories'=>$leftCategories,
            'middleCategories'=>$middleCategories,
            'rightCategories'=>$rightCategories,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
            ]);

    }


    public function Balastan()
    {
        $channel = \Model\Channel\ModelName::name('balastan')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.balastan.index', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,

            ]);
    }

    public function Muzkanal()
    {
        $channel = \Model\Channel\ModelName::name('muzkanal')->first();

        return view('Front::channel.muzkanal.index', ['channel' => $channel]);
    }

    public function Ktr()
    {
        $channel = \Model\Channel\ModelName::name('ktr')->first();

        return view('Front::channel.ktr.index', ['channel' => $channel]);
    }
    public function Page(\Model\Page\ModelName $page)
    {
        $page->incrementViewed();

        return view('Front::page',['page' => $page]);
    }

    public function searchResult(Request $request)
    {
        $lc = app()->getlocale();
        $key = $request->input('search');

        $perPage = 15;

        $tag = \Model\Tag\Tag::where('name', '=', $key)->first();
        $posts = \Model\Post\ModelName::search($key)->orderBy('id','desc')->get();
         
//        $posts = \Model\Post\ModelName::search($request->input('search'))->paginate($perPage);
//        $pages = \Model\Page\ModelName::search($request->input('search'))->get();
        $searchKey = $request->input('search');

        $categories = \Model\Category\ModelName::where('general','=','1')->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        if($lc == 'kg'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('number','=','88')->orderBy('updated_at','desc')->take(6)->get();

            if(count($topArticles) > 0){
                $topArticles = $topArticles;
            }else{
                $topArticles = null;
            }
            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }

        } else {
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('numberRu','=','88')->orderBy('updated_at','desc')->take(6)->get();

            if(count($topArticles) > 0){
                $topArticles = $topArticles;
            }else{
                $topArticles = null;
            }
            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }

        return view('Front::result', [
            'posts' => $posts,
            'tag' => $tag,
            'perPage' => $perPage,
//            'pages' => $pages,
            'searchKey'=>$searchKey,

            'topArticles' =>$topArticles,
            'popArticles' =>$popArticles,
            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
            ]);
    }

    // Category Page
    public function categoryPage(\Model\Category\ModelName $category)
    {
        $lc = app()->getlocale();
        $perPage = 10;
        $category_id = $category->id;

        if($lc == 'kg'){
            $posts = \Model\Post\ModelName::where('general','=','1')->where('published','=','1')->where('category_id','=',$category_id)->where('title','<>','')->orderBy('id','desc')->paginate($perPage);
        }else{
            $posts = \Model\Post\ModelName::where('general','=','1')->where('published','=','1')->where('category_id','=',$category_id)->where('titleRu','<>','')->orderBy('id','desc')->paginate($perPage);
        }

        if($lc == 'kg'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('number','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }
            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }elseif($lc == 'ru'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('numberRu','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }
            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }

        $categories = \Model\Category\ModelName::where('general','=','1')->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::category.index',[
            'perPage'=> $perPage,
            'posts' => $posts,
            'category' => $category,
            'topArticles' => $topArticles,
            'popArticles' => $popArticles,

            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);


        
    }

    public function mediaPage(\Model\Media\ModelName $media)
    {
        
        /*$mediaPost = \Model\Media\ModelName::where('id','=',$media);
        dd($mediaPost);*/


        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $categories = \Model\Category\ModelName::where('general','=','1')->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $mediaPop = \Model\Media\ModelName::where()->get();

        return view('Front::media.index',[
            'mediaPost' => $media,
            
            'mainBanner'   => $mainBanner,
            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,

        ]);
    }

    public function filterResult(Request $request)
    {
        $lc = app()->getlocale();
        $df = $request->dateFrom;
        $dt = $request->dateTo;

        $dateFrom = date('Y-m-d',strtotime($df));
        $dateTo = date('Y-m-d',strtotime($dt));

        $perPage = 10;

        $categories = \Model\Category\ModelName::where('general','=','1')->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        if($lc == 'kg'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('number','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }elseif($lc == 'ru'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('numberRu','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }
        
        if($lc == 'kg' AND $df != '' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->datefromkg($df)->datetokg($dt)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'kg' AND $df != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->datefromkg($df)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'kg' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->datetokg($dt)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'ru' AND $df != '' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->datefromru($df)->datetoru($dt)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'ru' AND $df != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->datefromru($df)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'ru' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->datetoru($dt)->orderBy('id', 'desc')->paginate($perPage);
        }else{
            $postAllFromTo = \Model\Post\ModelName::published()->orderBy('id', 'desc')->paginate($perPage);
        }
        
        return view('Front::post.posts',[
            'perPage'=> $perPage,
            'postAll' => $postAllFromTo,
            'topArticles' => $topArticles,
            'popArticles' => $popArticles,
            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function filterResultCategory(Request $request)
    {
        $category_id = $request->category;
        $category = \Model\Category\ModelName::where('id','=',$category_id)->first();
        $lc = app()->getlocale();
        $df = $request->dateFrom;
        $dt = $request->dateTo;

        $dateFrom = date('Y-m-d',strtotime($df));
        $dateTo = date('Y-m-d',strtotime($dt));

        $perPage = 10;
        
        $categories = \Model\Category\ModelName::where('general','=','1')->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        if($lc == 'kg'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('number','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('title','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }elseif($lc == 'ru'){
            $topArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('numberRu','=','88')->orderBy('updated_at','desc')->take(6)->get();
            if(count($topArticles) > 0){
                $topArticles = $topArticles;   
            }else{
                $topArticles = null;
            }

            $weekFromNow = date('Y-m-d H:i', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('general','=','1')->where('titleRu','<>','')->where('created_at','>',$weekFromNow)->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }
        
        if($lc == 'kg' AND $df != '' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->datefromkg($df)->datetokg($dt)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'kg' AND $df != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->datefromkg($df)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'kg' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->datetokg($dt)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'ru' AND $df != '' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->datefromru($df)->datetoru($dt)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'ru' AND $df != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->datefromru($df)->orderBy('id', 'desc')->paginate($perPage);
        }elseif($lc == 'ru' AND $dt != ''){
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->datetoru($dt)->orderBy('id', 'desc')->paginate($perPage);
        }else{
            $postAllFromTo = \Model\Post\ModelName::published()->where('category_id','=',$category_id)->orderBy('id', 'desc')->paginate($perPage);
        }

        return view('Front::category.index',[
            'perPage'=> $perPage,
            'category'=> $category,
            'posts' => $postAllFromTo,
            'topArticles' => $topArticles,
            'popArticles' => $popArticles,
            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function Galleries()
    {
        $lc = app()->getlocale();
        $perPage = 15;
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $galleries = \Model\PhotoParent\ModelName::where('extracolumn','=','1')->where('published','=',true)->orderBy('id','desc')->paginate($perPage);

        return view('Front::gallery.galleries',[
            'lc' => $lc,
            'perPage'=> $perPage,
            'backgroundMain' => $backgroundMain,
            'galleries' => $galleries,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function Gallery(Request $request, $galleryId)
    {
        $lc = app()->getlocale();

        $gallery = \Model\PhotoParent\ModelName::where('id','=',$galleryId)->first();
        $images = json_decode($gallery->images);

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::gallery.gallery',[
            'lc' => $lc,
            'images' => $images,
            'backgroundMain' => $backgroundMain,
            'gallery' => $gallery,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function Reporter()
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

//        $galleries = \Model\PhotoParent\ModelName::where('extracolumn','=','1')->where('published','=',true)->orderBy('id','desc')->get();

        return view('Front::reporter.index',[
            'lc' => $lc,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function ReporterAdd(Request $request)
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $reporter = \Model\PeopleReporter\ModelName::create($request->except('images','video','q'));

        $images = $request->file('images');
        $rules = array(
            'image' => 'image'
        );

        $result = array();

        if($request->hasFile('images'))
        {
            foreach($images as $key=>$image)
            {
                $target = array('image' => $image);
                $validator = Validator::make($target, $rules);

                if ($validator->fails())
                {
                    return redirect()->route('front.reporter');
                }
                else
                {
                    $storage = \Storage::disk('public');
                    $destinationPath = 'froala/uploads';
                    $storage->makeDirectory($destinationPath);

                    $filename = time().$key.'.'.$image->getClientOriginalExtension();

                    Image::make($_FILES['images']['tmp_name'][$key])->heighten(600)->save($destinationPath.'/'.$filename);

                    $files_array = array();
                    $files_array = array_collapse([$files_array, [
                        'id' => $key+1,
                        'name' => $filename
                    ]]);

                    $result = array_add($result, $key , $files_array);
                    $jsonresult = json_encode($result);

                    $reporter->thumbnail = $jsonresult;
                    $reporter->save();
                }
            }
        }

        $video = $request->file('video');
        $video_rules = array(
            'video' => 'mimes:mimes:m4v,avi,flv,mp4,mov,3gp | max:51200'
        );

        if($request->hasFile('video')){
            $targetVideo = array(
                'video' => $video
            );
            $validator = Validator::make($targetVideo, $video_rules);

            if ($validator->fails())
            {
                return redirect()->route('front.reporter');
            }
            else
            {
                $storage = \Storage::disk('public');
                $destinationPath = 'froala/videos';
                $storage->makeDirectory($destinationPath);

                $filename = time().'.'.$video->getClientOriginalExtension();
                $video->move($destinationPath, $filename);

                $reporter->video = $filename;
                $reporter->save();
            }
        }

        return redirect()->route('front.reporter');
    }
}

