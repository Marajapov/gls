<?php
namespace Front\Controllers;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Input;
use Response;

class PageController extends Controller
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
    public function historyPage()
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::pages.history', [
            'lc' => $lc,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function directorPage()
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        if($lc == 'kg'){
            $directorPosts = \Model\Post\ModelName::where('director','=','1')->languagekg()->orderBy('id','desc')->get();
        }else{
            $directorPosts = \Model\Post\ModelName::where('director','=','1')->languageru()->orderBy('id','desc')->get();
        }
        $fbpost = \Model\Post\ModelName::where('director','<>','1')->where('fbpost','=','1')->orderBy('id','desc')->get();
        if($fbpost){
            $fbpost = $fbpost;
        }else {
            $fbpost = null;
        }
        return view('Front::pages.director', [
            'backgroundMain' => $backgroundMain,
            'directorPosts' => $directorPosts,
            'lc' => $lc,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
            'fbpost' => $fbpost,
        ]);
    }

    public function leadersPage()
    {
        $lc = app()->getlocale();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.leaders', [
            'backgroundMain' => $backgroundMain,
            'categories'=>$categories,
            'lc' => $lc,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);

    }

//    public function leaderPage($leader)
//    {
//        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
//        return view('Front::pages.leader', [
//            'leader' => $leader,
//            'backgroundMain' => $backgroundMain,
//        ]);
//    }

    public function strategyPage()
    {
        $lc = app()->getlocale();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.strategy', [
            'lc' => $lc,
            'backgroundMain' => $backgroundMain,
            'categories' => $categories,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function normalbasePage()
    {
        $lc = app()->getlocale();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.normalbase', [
            'lc' => $lc,
            'backgroundMain' => $backgroundMain,
            'categories' => $categories,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function rrtsPage()
    {
        $lc = app()->getlocale();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.rrts', [
            'lc' => $lc,
            'backgroundMain' => $backgroundMain,
            'categories' => $categories,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function reportPage()
    {
        $lc = app()->getlocale();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.report', [
            'lc' => $lc,
            'backgroundMain' => $backgroundMain,
            'categories' => $categories,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function TeleprogramPage(Request $request)
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $channels = \Model\Channel\ModelName::where('published','=','1')->get();

        date_default_timezone_set('Asia/Bishkek');
        $now = date("d-m-Y H:i");
        $currentDate = date('d-m-Y');
        $currentTime = date('H:i');
        $weekDay = date('N', strtotime($now));

        $programs = array();
        $schedules = array();
        $channel = '';

        return view('Front::pages.teleprogram', [
            'lc' => $lc,
            'currentDate' => $currentDate,
            'currentTime' => $currentTime,
            'backgroundMain' => $backgroundMain,
            'channels' => $channels,
            'schedules' => $schedules,
            'programs' => $programs,
            'channel' => $channel,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function ChannelTeleprogram($channel)
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $channels = \Model\Channel\ModelName::where('published','=','1')->get();
        date_default_timezone_set('Asia/Bishkek');
        $now = date("d-m-Y H:i");
        $currentDate = date('d-m-Y');
        $currentTime = date('H:i');
        $weekDay = date('N', strtotime($now));

        $channel = \Model\Channel\ModelName::where('id','=',$channel->id)->first();

        if($channel){
            $schedules = \Model\Schedule\ModelName::where('channel_id','=',$channel->id)->orderBy('date', 'desc')->get();

            for($i=1; $i<=7; $i++){
                if($i < $weekDay){
                    $weekDayNew = date('d-m-Y', strtotime('-'.($weekDay - $i).' day'));
                    $week[] = $weekDayNew;
                } elseif ($i > $weekDay) {
                    $weekDayNew = date('d-m-Y', strtotime('+'.($i - $weekDay).' day'));
                    $week[] = $weekDayNew;
                } else {
                    $weekDayNew = date('d-m-Y', strtotime($now));
                    $week[] = $weekDayNew;
                }
            }

            if(!empty($schedules)){
                $programs = array();
                for($j=0; $j<count($week);$j++){
                    foreach($schedules as $schedule){
                        if(strtotime($week[$j]) == strtotime($schedule->date)){
                            $program = json_decode($schedule->program);
                            $programNew = array_add($program, 'date', $schedule->date);
                            $programs[] =$programNew;
                        }
                    }
                }
            }
        }

//        dd($programs);
        return view('Front::pages.teleprogram', [
            'lc' => $lc,
            'currentDate' => $currentDate,
            'currentTime' => $currentTime,
            'backgroundMain' => $backgroundMain,
            'schedules' => $schedules,
            'programs' => $programs,
            'week' => $week,
            'channels' => $channels,
            'channel' => $channel,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);

    }

    public function keneshPage()
    {
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.ns', [
            'backgroundMain' => $backgroundMain,
            'categories' => $categories,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function editionkeneshPage()
    {
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        return view('Front::pages.editionkenesh', [
            'backgroundMain' => $backgroundMain,
            'categories' => $categories,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }


    // Director Post Function
    public function directorPost(\Model\Post\ModelName $post)
    {
        $lc = app()->getlocale();

        $post->incrementViewed();

        $categories = \Model\Category\ModelName::all();
        $positionTop = \Model\Banner\ModelName::top()->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();


        if(($post->parentId != '0') && ($post->parentId != null))
        {
            $parentId = $post->parentId;
            $parentId = \Model\PhotoParent\ModelName::where('id','=',$parentId)->first();
            $photoChilds = \Model\PhotoChild\ModelName::where('parentId','=',$parentId->id)->get();

        }else{
            $parentId = '0';
            $photoChilds = '0';
        }

        if($post->related1 != null){
            $related1Post = \Model\Post\ModelName::where('id','=',$post->related1)->first();
        }else{
            $related1Post = null;
        }

        if($post->related2 != null){
            $related2Post = \Model\Post\ModelName::where('id','=',$post->related2)->first();
        }else{
            $related2Post = null;
        }

        if($post->related3 != null){
            $related3Post = \Model\Post\ModelName::where('id','=',$post->related3)->first();
        }else{
            $related3Post = null;
        }
        if($lc == 'kg'){
            $relatedPosts = \Model\Post\ModelName::where('category_id','=',$post->category_id)->languagekg()->take(6)->skip(0)->orderBy('id', 'desc')->get();
        }elseif($lc == 'ru'){
            $relatedPosts = \Model\Post\ModelName::where('category_id','=',$post->category_id)->languageru()->take(6)->skip(0)->orderBy('id', 'desc')->get();
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

        return view('Front::pages.directorPost',[
            'post' => $post,

            'related1Post' => $related1Post,
            'related2Post' => $related2Post,
            'related3Post' => $related3Post,

            'relatedPosts' => $relatedPosts,
            'topArticles' => $topArticles,
            'popArticles' => $popArticles,

            'parentId'=> $parentId,
            'photoChilds'=> $photoChilds,

            'categories'=>$categories,
            'positionTop'    => $positionTop,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);

    }

    public function Reklama()
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::pages.reklama',[
            'lc'            => $lc,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }

    public function Contacts()
    {
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::pages.contacts',[
            'lc'            => $lc,
            'backgroundMain' => $backgroundMain,
            'positionTop'    => $this->positionTop,
            'positionRight'  => $this->positionRight,
            'positionCenter' => $this->positionCenter,
            'positionBottom' => $this->positionBottom,
            'positionLeft'  => $this->positionLeft,
        ]);
    }
}

