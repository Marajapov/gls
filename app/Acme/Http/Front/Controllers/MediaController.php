<?php
namespace Front\Controllers;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use \Model\MediaCategory\ModelName as MediaCategory;

class MediaController extends Controller
{
    protected $positionTop, $positionRight, $positionCenter, $positionBottom, $positionLeft;

    public function __construct()
    {
        $this->positionTop = \Model\Banner\ModelName::where('positionTop','=','1')->first();
        $this->positionRight = \Model\Banner\ModelName::where('positionRight','=','1')->first();
        $this->positionleft = \Model\Banner\ModelName::where('positionLeft','=','1')->first();
        $this->positionCenter = \Model\Banner\ModelName::where('positionCenter','=','1')->first();
        $this->positionBottom = \Model\Banner\ModelName::where('positionBottom','=','1')->first();
    }
    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    public function mediaIndex(Request $request) // list of videos
    {
        $MediaCategories = \Model\MediaCategory\ModelName::get();
        $mediaAll = \Model\Media\ModelName::get();

        $categoriesVideos = array();
        $topCategoriesVideos = array();

        foreach($MediaCategories as $MediaCategory){

            $CategoryVideos = \Model\Media\ModelName::where('published','=','1')->where('videoType','=',$MediaCategory->videoType)->orderBy('id','desc')->take(9)->get();
            $TopCategoryVideos = \Model\Media\ModelName::where('published','=','1')->where('videoType','=',$MediaCategory->videoType)->orderBy('viewed','desc')->take(9)->get();

            $categoriesVideos = array_add($categoriesVideos, $MediaCategory->videoType, $CategoryVideos);
            $topCategoriesVideos = array_add($topCategoriesVideos, $MediaCategory->videoType, $TopCategoryVideos);
        }
//        dd($topCategoriesVideos);

        $mediaLastVideos = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->take(9)->get();

        $mediaPops = \Model\Media\ModelName::where('published','=','1')->orderBy('viewed','desc')->take(9)->get();

        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $projectList = \Model\Project\ModelName::where('extracolumn','=','1')->orderBy('id','desc')->get();

        $anons = \Model\Anons\ModelName::where('channel','=','2')->where('published','=','1')->get();

        return view('Front::media.index',[
            'mediaAll' => $mediaAll,
            'anons' => $anons,
            'mediaLastVideos' => $mediaLastVideos,
            'MediaCategories' => $MediaCategories,
            'mainBanner'   => $mainBanner,
            'projectList' => $projectList,
            'mediaCategories'=>$MediaCategories,
            'backgroundMain' => $backgroundMain,
            'categoriesVideos' => $categoriesVideos,
            'topCategoriesVideos' => $topCategoriesVideos,
            'mediaPops' => $mediaPops,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft' => $this->positionLeft,
            ]);
    }

    public function video($media)
    {
        $lc = app()->getlocale();

        $video = \Model\Media\ModelName::where('id','=',$media)->first(); // full video array

        $video->incrementViewed();

        $projectId = $video->program; // 0

        $videoType = $video->videoType; // serials
        $videoName = $video->name;

        $MediaCategory = \Model\MediaCategory\ModelName::where('videoType','=',$videoType)->first();

        if($lc == 'kg'){
            $result = \Model\Project\ModelName::where('id','=',$projectId)->first();
            if($result){
                $videoProject = $result->getName();
            }else{
                $videoProject = '';
            }
            
            
            $result1 = \Model\MediaCategory\ModelName::where('videoType','=',$videoType)->first();    
            $getVideoTypeName = $result1->getName();

            if($projectId > 0){
                $relatedVideos = \Model\Media\ModelName::where('published','=','1')->where('id','<>',$video->id)->where('program','=',$projectId)->orderBy('id','desc')->get();
            } elseif($projectId  == 0) {
                $relatedVideos = \Model\Media\ModelName::where('published','=','1')->where('id','<>',$video->id)->where('videoType','=',$videoType)->orderBy('id','desc')->get();
            }


        }elseif($lc == 'ru'){
            $result = \Model\Project\ModelName::where('id','=',$projectId)->first();
            if($result != null){
                $videoProject = $result->getNameRu();    
            }else{
                $videoProject = '';
            }

            $result = \Model\MediaCategory\ModelName::where('videoType','=',$videoType)->first();
            $getVideoTypeName = $result->getNameRu();

            if($projectId > 0){
                $relatedVideos = \Model\Media\ModelName::where('published','=','1')->where('id','<>',$video->id)->where('program','=',$projectId)->orderBy('id','desc')->get();
            } else {
                $relatedVideos = \Model\Media\ModelName::where('published','=','1')->where('id','<>',$video->id)->where('videoType','=',$videoType)->orderBy('id','desc')->get();
            }

        }

        $MediaCategories = \Model\MediaCategory\ModelName::get();

        $projectList = \Model\Project\ModelName::where('extracolumn','=','1')->orderBy('id','desc')->get();

        $mediaAll = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->get();

        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::media.video',[
            'video' => $video,
            'videoName' => $videoName,
            'videoProject' => $videoProject,
            'getVideoTypeName'=> $getVideoTypeName,
            'relatedVideos' => $relatedVideos,

            'mediaAll' => $mediaAll,
            'MediaCategories' => $MediaCategories,
            'MediaCategory' => $MediaCategory,

            'mainBanner'   => $mainBanner,
            'projectList' => $projectList,
            'backgroundMain' => $backgroundMain,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft' => $this->positionLeft,
        ]);
    }

    public function project(\Model\Project\ModelName $project)
    {
        $projectList = \Model\Project\ModelName::where('extracolumn','=','1')->orderBy('id','desc')->get();
//        $MediaCategory = \Model\MediaCategory\ModelName::get();
        $mediaAll = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->get();

        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $relatedVideos = \Model\Media\ModelName::where('published','=','1')->where('program','=',$project->id)->orderBy('id','desc')->get();


        return view('Front::media.project',[
                
                'project' => $project,

                'mainBanner'   => $mainBanner,
                'projectList' => $projectList,
                'backgroundMain' => $backgroundMain,
                'relatedVideos' => $relatedVideos,

                'positionTop'    => $this->positionTop,
                'positionRight'  => $this->positionRight,
                'positionCenter' => $this->positionCenter,
                'positionBottom' => $this->positionBottom,
                'positionLeft' => $this->positionLeft,

            ]
        );
    }

    public function allVideos()
    {
        $projectList = \Model\Project\ModelName::where('extracolumn','=','1')->orderBy('id','desc')->get();
        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $perPage = 15;

        $allVideos = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->paginate($perPage);

        return view('Front::media.all',[
            'perPage'=> $perPage,
            'mainBanner'   => $mainBanner,
            'projectList' => $projectList,
            'backgroundMain' => $backgroundMain,
            'allVideos' => $allVideos,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft' => $this->positionLeft,
        ]);
    }

    public function categoryVideos($mediaCategory)
    {
        $projectList = \Model\Project\ModelName::where('extracolumn','=','1')->orderBy('id','desc')->get();
        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $perPage = 15;

        $allVideos = \Model\Media\ModelName::where('published','=','1')->where('videoType','=',$mediaCategory->videoType)->orderBy('id','desc')->paginate($perPage);

        return view('Front::media.category',[
            'perPage'=> $perPage,
            'mainBanner'   => $mainBanner,
            'projectList' => $projectList,
            'backgroundMain' => $backgroundMain,
            'allVideos' => $allVideos,
            'mediaCategory' => $mediaCategory,

            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft' => $this->positionLeft,
        ]);
    }

}

