<?php
namespace Front\Controllers;
use Illuminate\Http\Request;
class BirinchiController extends Controller
{
    public function __construct()
    {
    }


    public function Home()
    {
        $channel = \Model\Channel\ModelName::name('birinchi')->first();
        $lc = app()->getlocale();
        $posts = array();

        $categories = \Model\Category\ModelName::where('birinchi','=','1')->where('published','=','1')->where('orderBirinchi','<>','0')->orderBy('orderBirinchi','asc')->get();

        if($lc == 'kg'){
            $generalPosts = \Model\Post\ModelName::where('birinchi','=',1)->where('general','=','1')->languagekg()->take(3)->orderBy('id','desc')->get();
            $lentaNews = \Model\Post\ModelName::where('birinchi','=',1)->languagekg()->take(20)->orderBy('id','desc')->get();

            foreach($categories as $category){
                $categoryPosts = \Model\Post\ModelName::where('birinchi','=','1')->where('category_id','=',$category->id)->where('published','=','1')->where('title','<>','')->orderBy('id','desc')->take(3)->get();
                foreach($categoryPosts as $categoryPost){
                    $posts[] = $categoryPost;
                }
            }

            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->take(6)->get();

        }else{
            $generalPosts = \Model\Post\ModelName::where('birinchi','=',1)->where('general','=','1')->languageru()->take(3)->orderBy('id','desc')->get();
            $lentaNews = \Model\Post\ModelName::where('birinchi','=',1)->languageru()->take(20)->orderBy('id','desc')->get();


            foreach($categories as $category){
                $categoryPosts = \Model\Post\ModelName::where('birinchi','=','1')->where('category_id','=',$category->id)->where('published','=','1')->where('titleRu','<>','')->orderBy('id','desc')->take(3)->get();
                foreach($categoryPosts as $categoryPost){
                    $posts[] = $categoryPost;
                }
            }

            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->take(6)->get();
        }

        $topCategories = \Model\Category\ModelName::where('birinchi','=','1')->where('published','=','1')->where('orderBirinchi','<>','0')->orderBy('orderBirinchi','asc')->take(4)->get();
        $bottomCategories = \Model\Category\ModelName::where('birinchi','=','1')->where('published','=','1')->where('orderBirinchi','<>','0')->orderBy('orderBirinchi','asc')->take(4)->skip(4)->get();

        $photoGalleries = \Model\PhotoParent\ModelName::where('birinchi','=','1')->where('published','=',true)->take('6')->orderBy('id','desc')->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.birinchi.index', [
            'channel' => $channel,
            'photoGalleries' => $photoGalleries,
            'backgroundMain' => $backgroundMain,

            'generalPosts' => $generalPosts,
            'lentaNews' => $lentaNews,
            'birinchiProjects' => $birinchiProjects,

            'posts' => $posts,
            'topCategories' => $topCategories,
            'bottomCategories' => $bottomCategories
        ]);
    }

    public function allbroadcasts()
    {
        $channel = \Model\Channel\ModelName::name('birinchi')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }

           return view('Front::channel.birinchi.allbroadcasts', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'birinchiProjects' => $birinchiProjects
            ]);
    }
    public function about()
    {
        $channel = \Model\Channel\ModelName::name('birinchi')->first();
         $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }

           return view('Front::channel.birinchi.about', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'birinchiProjects' => $birinchiProjects,
            ]);
    }

    public function news(\Model\Post\ModelName $post)
    {
        $post->incrementViewed();
        $lc = app()->getlocale();

        if($lc == 'kg')
        {
            if($post->title == '')
            {
                app()->setlocale('ru');
                $lc = 'ru';
            }
            else
            {
                app()->setlocale('kg');
                $lc = 'kg';
            }
        } 
        elseif($lc == 'ru') 
        {
            if($post->titleRu == '')
            {
                app()->setlocale('kg');
                $lc = 'kg';
            }
            else
            {
                app()->setlocale('ru');
                $lc = 'ru';
            }
        }

        if($lc == 'kg'){

            $contentOriginal = $post->getContent();
            

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



            


        }elseif($lc == 'ru'){
            $contentOriginal = $post->getContent();
            
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

        }

        $channel = \Model\Channel\ModelName::name('birinchi')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
            $allPost = \Model\Post\ModelName::where('birinchi','=',1)->where('birinchiProgram','<>','1')->languagekg()->take(10)->skip(0)->published()->orderBy('id','desc')->get();    
            $relatedNews = \Model\Post\ModelName::where('id','<>',$post->id)->where('published','=',true)->where('birinchi','=','1')->languagekg()->where('category_id','=',$post->category_id)->orderBy('id','desc')->take(8)->get();
            
            $weekFromNow = date('Y-m-d', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('birinchi','=','1')->where('created_at','>',$weekFromNow)->languagekg()->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
            $allPost = \Model\Post\ModelName::where('birinchi','=',1)->where('birinchiProgram','<>','1')->languageru()->take(10)->skip(0)->published()->orderBy('id','desc')->get();
            $relatedNews = \Model\Post\ModelName::where('id','<>',$post->id)->where('published','=',true)->where('birinchi','=','1')->languageru()->where('category_id','=',$post->category_id)->orderBy('id','desc')->take(8)->get();

            $weekFromNow = date('Y-m-d', strtotime('-7 days'));
            $popArticles = \Model\Post\ModelName::where('birinchi','=','1')->where('created_at','>',$weekFromNow)->languageru()->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }

        $categories = \Model\Category\ModelName::where('birinchi','=','1')->get();            

           return view('Front::channel.birinchi.news', [
            'channel' => $channel,
            'post' => $post,
            'content' => $contentFinal,
            'backgroundMain' => $backgroundMain,
            'birinchiProjects' => $birinchiProjects,
            'categories'=>$categories,
            'relatedNews' => $relatedNews,            
            'popArticles' => $popArticles,            
            ]);
    }

    public function categoryPage(\Model\Category\ModelName $category)
    {
        $lc = app()->getlocale();
        $perPage = 12;
        $category_id = $category->id;

        if($lc == 'kg'){
            $posts = \Model\Post\ModelName::where('birinchi','=','1')->where('published','=','1')->where('category_id','=',$category_id)->where('title','<>','')->orderBy('id','desc')->paginate($perPage);
        }else{
            $posts = \Model\Post\ModelName::where('birinchi','=','1')->where('published','=','1')->where('category_id','=',$category_id)->where('titleRu','<>','')->orderBy('id','desc')->paginate($perPage);
        }

        $categories = \Model\Category\ModelName::where('birinchi','=','1')->get();  
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }
        
        return view('Front::channel.birinchi.category',[
            'perPage'=> $perPage,
            'posts' => $posts,
            'category' => $category,
            'categories'=>$categories,
            'backgroundMain' => $backgroundMain,
            'birinchiProjects' => $birinchiProjects,

        ]);
        
    }

        public function allnews()
    {
        
        $channel = \Model\Channel\ModelName::name('birinchi')->first();

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $perPage = 10;
        $lc = app()->getlocale();

        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();
            $postAll = \Model\Post\ModelName::where('birinchi','=',1)->where('title','<>','')->published()->orderBy('id','desc')->paginate($perPage);      
            $popArticles = \Model\Post\ModelName::where('birinchi','=','1')->languagekg()->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }  
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
            $postAll = \Model\Post\ModelName::where('birinchi','=',1)->where('titleRu','<>','')->published()->orderBy('id','desc')->paginate($perPage);

            $popArticles = \Model\Post\ModelName::where('birinchi','=','1')->languageru()->orderBy('viewed','desc')->take(6)->get();
            if(count($popArticles) > 0){
                $popArticles = $popArticles;
            }else{
                $popArticles = null;
            }
        }
        $categories = \Model\Category\ModelName::where('birinchi','=','1')->get();

        return view('Front::channel.birinchi.allnews', [
            'perPage' => $perPage,
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'postAll' => $postAll,
            'birinchiProjects' => $birinchiProjects,
            'categories'=>$categories,
            'popArticles'=>$popArticles,


            ]);
    }


    public function broadcast(\Model\Post\ModelName $post)
    {
        $lc = app()->getlocale();
        if($lc == 'kg' && ($post->title != '')){          
        }elseif($lc == 'ru' && ($post->titleRu != '')){        
        }else{
            return redirect()->route('birinchi.home');
        }
        $post->incrementViewed();

        $channel = \Model\Channel\ModelName::name('birinchi')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }        

           return view('Front::channel.birinchi.broadcast', [
            'channel' => $channel,
            'post' => $post,
            'backgroundMain' => $backgroundMain,
            'birinchiProjects' => $birinchiProjects,        
            ]);
    }
    public function broadcasts(\Model\Project\ModelName $project)
    {
        $lc = app()->getlocale();
        if($lc == 'kg' && ($project->name != '')){         
        }elseif($lc == 'ru' && ($project->nameRu != '')){           
        }else{
            return redirect()->route('birinchi.home');
        }

        $projectList = \Model\Project\ModelName::get();
//        $MediaCategory = \Model\MediaCategory\ModelName::get();
        $mediaAll = \Model\Media\ModelName::get();

        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $relatedNews = \Model\Post\ModelName::where('published','=',true)->where('birinchi','=','1')->where('birinchiProgram','=',$project->id)->get();

        // dd($relatedNews);

        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }



        return view('Front::channel.birinchi.broadcasts',[
                
            'project' => $project,
    //      'MediaCategories'       => $MediaCategories,
            'mainBanner'   => $mainBanner,
            'categories'=>$categories,
            'projectList' => $projectList,
            'backgroundMain' => $backgroundMain,
            'relatedNews' => $relatedNews,
            'birinchiProjects' => $birinchiProjects,                

            ]
        );
    }



    public function photos()
    {
        $channel = \Model\Channel\ModelName::name('birinchi')->first();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi', '=', 1)->get();

           return view('Front::channel.birinchi.photos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'birinchiProjects' => $birinchiProjects,
            ]);
    }

    public function broadcastsprogramm()
    {
        $channel = \Model\Channel\ModelName::where('name','=','birinchi')->first();
        $lc = app()->getlocale();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();
        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }

        date_default_timezone_set('Asia/Bishkek');
        $now = date("d-m-Y H:i");
        $currentDate = date('d-m-Y');
        $currentTime = date('H:i');
        $weekDay = date('N', strtotime($now));

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
                foreach($schedules as $schedule){
                    $scheduleWeek = date('N',strtotime($schedule->date));
                    for($j=0; $j<count($week);$j++){;
                        if(strtotime($week[$j]) == strtotime($schedule->date)){
                            $program = json_decode($schedule->program);
                            $programNew = array_add($program, 'date', $schedule->date);
                            $programs[] =$programNew;
                        }
                    }
                }
                $programs = array_reverse($programs);
            }
        }

//        dd($programs);

        return view('Front::channel.birinchi.broadcastsprogramm', [
            'lc' => $lc,
            'currentDate' => $currentDate,
            'currentTime' => $currentTime,
            'backgroundMain' => $backgroundMain,
            'schedules' => $schedules,
            'programs' => $programs,
            'week' => $week,
            'birinchiProjects' => $birinchiProjects,
        ]);

    }

    public function project(\Model\Project\ModelName $project)
    {
        $projectList = \Model\Project\ModelName::get();
//        $MediaCategory = \Model\MediaCategory\ModelName::get();
        $mediaAll = \Model\Media\ModelName::get();

        $mainBanner = \Model\Background\ModelName::where('name','=','main')->first();
        $categories = \Model\Category\ModelName::all();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $relatedNews = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',$project->id)->get();

        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }


        return view('Front::channel.birinchi.project',[
                
            'project' => $project,
    //                'MediaCategories'       => $MediaCategories,

            'mainBanner'   => $mainBanner,
            'categories'=>$categories,
            'projectList' => $projectList,
            'backgroundMain' => $backgroundMain,
            'relatedNews' => $relatedNews,
            'birinchiProjects' => $birinchiProjects,                

            ]
        );
    }

    public function allphotos()
    {
        $channel = \Model\Channel\ModelName::name('birinchi')->first();
        $perPage = 24;

        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        $postAll = \Model\Media\ModelName::where('published','=',true)->where('birinchi','=','1')->orderBy('id', 'desc')->paginate($perPage);        
        $lc = app()->getlocale();
        if($lc == 'kg'){
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('name','<>','' )->get();    
        }else{
            $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi','=',1)->where('nameRu','<>','' )->get();
        }
        // Photo Gallery
        $photoGalleries = \Model\PhotoParent\ModelName::where('birinchi','=','1')->where('published','=',true)->take('10')->orderBy('id','desc')->get();        
        return view('Front::channel.birinchi.allphotos', [
            'channel' => $channel,
            'backgroundMain' => $backgroundMain,
            'photoGalleries' => $photoGalleries,
            'postAll' => $postAll,
            'perPage' => $perPage,
            'birinchiProjects' => $birinchiProjects,  

            ]);
    }

    public function Gallery(Request $request, $galleryId)
    {

        $gallery = \Model\PhotoParent\ModelName::where('birinchi','=','1')->where('id','=',$galleryId)->first();
        if($gallery != null){

        $images = json_decode($gallery->images);
    }else{
        $images = null;
    }
        $birinchiProjects = \Model\Project\ModelName::where('published','=',true)->where('birinchi', '=', 1)->get();
        $backgroundMain = \Model\Background\ModelName::where('published','=',true)->first();

        return view('Front::channel.birinchi.photos',[
            'images' => $images,
            'backgroundMain' => $backgroundMain,
            'gallery' => $gallery,
            'birinchiProjects' => $birinchiProjects,
            ]);
    }

}
