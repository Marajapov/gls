<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\Post\ModelName as Post;
use Intervention\Image\ImageManagerStatic as Image;

// use Model\Channel\ModelName as Channel;
// use Model\Category\ModelName as Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->where('fbpost','<>','1')->get();
        
        return view('Admin::post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = \Model\Tag\Tag::lists('name', 'id');
        $tags2 = \Model\Tag\Tag::lists('name', 'id');

        $userOnline = auth()->user()->getRole();
        
        $channelList = \Model\Channel\ModelName::lists('display', 'id')->toArray();    
        $categoryList = \Model\Category\ModelName::lists('titleRu', 'id')->toArray();
        $PhotoParentList = \Model\PhotoParent\ModelName::lists('name', 'id')->toArray();

        $relatedPosts = \Model\Post\ModelName::where('published','=','1')->where('title','<>','')->orderBy('id','desc')->lists('title', 'id')->toArray();
        $relatedPosts2 = \Model\Post\ModelName::where('published','=','1')->where('titleRu','<>','')->orderBy('id','desc')->lists('titleRu', 'id')->toArray();
        $relatedMedias = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->lists('name', 'id')->toArray();

        $dostukProgramList = \Model\Project\ModelName::where('dostuk','=','1')->lists('name', 'id')->toArray();
        $birinchiProgramList = \Model\Project\ModelName::where('birinchi','=','1')->lists('name', 'id')->toArray();
        $kyrgyzradioProgramList = \Model\Project\ModelName::where('kyrgyzradio','=','1')->lists('name', 'id')->toArray();

        return view('Admin::post.create', [
            'post' => new Post, 
            'tags' => $tags,
            'tags2' => $tags2,
            'channelList' => $channelList,
            'categoryList' => $categoryList,
            'PhotoParentList' => $PhotoParentList,
            'relatedPosts' => $relatedPosts,
            'relatedPosts2' => $relatedPosts2,
            'relatedMedias' => $relatedMedias,
            'dostukProgramList' => $dostukProgramList,
            'birinchiProgramList' => $birinchiProgramList,
            'kyrgyzradioProgramList' => $kyrgyzradioProgramList,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = Post::create($request->except('tag_kg','tag_ru','thumbnail','q','channel_id','created_at','number','time'));
        $thumb_author = ($request->input('thumb_author'));

        $post->number = 99;
        $post->numberRu = 99;
        $post->save();

        $tag_kg_string = $request->input('tag_kg');
        $tags = explode("; ",$tag_kg_string);

        $tag_ru_string = $request->input('tag_ru');
        $tags2 = explode("; ",$tag_ru_string);

        if(!empty($tags)){
            foreach ($tags as $key => $name)
            {
                if(!is_numeric($name) && !empty($name))
                {
                    $tag = \Model\Tag\Tag::firstOrNew(['name' => $name]);
                    $tag->name = $name;
                    $tag->lang = 'kg';
                    $tag->save();
                    $tags[$key] = $tag->id();
                }
            }// end foreach

        $post->tags()->attach($tags);

        }// end if

        if(!empty($tags2)){
            foreach ($tags2 as $key => $name)
            {
                if(!is_numeric($name) && !empty($name))
                {
                    $tag = \Model\Tag\Tag::firstOrNew(['name' => $name]);
                    $tag->name = $name;
                    $tag->lang = 'ru';
                    $tag->save();
                    $tags2[$key] = $tag->id();
                }
            }// end foreach

        $post->tags()->attach($tags2);

        }// end if

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'img/thumbnail';
            $btw = time();

            $name = $post->id().$btw.'.'.$file->getClientOriginalExtension();
            $name2 = $post->id().$btw.'_big.'.$file->getClientOriginalExtension();

//            $manager = new ImageManager(array('driver' => 'imagick'));

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['thumbnail']['tmp_name'])->fit(250, 150)->save($dir.'/'.$name);

            if($request->input('thumb_author')){
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(500, 300)->insert('http://ktrk.kg/stringtoimg.php?string='.urlencode($thumb_author).'&font_size=4&R=FF&G=FF&B=FF', 'bottom-right', 0, 0)->save($dir.'/'.$name2);
            } else {
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(500, 300)->save($dir.'/'.$name2);
            }

            $post->thumbnail = $dir.'/'.$name;
            $post->thumbnail_big = $dir.'/'.$name2;
            $post->save();
        }

        if($request->input('channel_id') == null){
            $channel_id = 1;
            $post->channel_id = $channel_id;
        }

        if($request->input('created_at') != null){
            if($request->input('time')){
                $time = $request->input('time');
            } else
            {
                $time = date('H:i:s');
            }
            $postDate = $request->input('created_at');
            $timeToSave = date('H:i:s', strtotime($time));
            $saveDate = date('Y-m-d', strtotime($postDate));
            $result = $saveDate.' '.$timeToSave;
            $post->created_at = $result;
            $post->save();
        }else{
            $post->created_at = date('Y-m-d H:i:s');
            $post->save();
        }

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $relatedPosts = \Model\Post\ModelName::lists('title', 'id')->toArray();

        return view('Admin::post.show', [
            'post' => $post,
            'relatedPosts'=> $relatedPosts,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $channelList = \Model\Channel\ModelName::lists('display', 'id')->toArray();    
        $categoryList = \Model\Category\ModelName::lists('titleRu', 'id')->toArray();
        $PhotoParentList = \Model\PhotoParent\ModelName::lists('name', 'id')->toArray();

        $relatedPosts = \Model\Post\ModelName::where('title','<>','')->where('id','<>',$post->id)->lists('title', 'id')->toArray();
        $relatedPosts2 = \Model\Post\ModelName::where('titleRu','<>','')->where('id','<>',$post->id)->lists('titleRu', 'id')->toArray();
        $relatedMedias = \Model\Media\ModelName::where('published','=','1')->orderBy('id','desc')->lists('name', 'id')->toArray();

        $dostukProgramList = \Model\Project\ModelName::where('dostuk','=','1')->lists('name', 'id')->toArray();
        $birinchiProgramList = \Model\Project\ModelName::where('birinchi','=','1')->lists('name', 'id')->toArray();
        $kyrgyzradioProgramList = \Model\Project\ModelName::where('kyrgyzradio','=','1')->lists('name', 'id')->toArray();

        $tags = \Model\Tag\Tag::lists('name', 'id');
        $tags2 = \Model\Tag\Tag::lists('name', 'id');

        return view('Admin::post.edit', [
            'post' => $post, 
            'tags' => $tags,
            'tags2' => $tags2,
            'relatedPosts' => $relatedPosts,
            'relatedPosts2' => $relatedPosts2,
            'relatedMedias' => $relatedMedias,
            'channelList' => $channelList,
            'categoryList' => $categoryList,
            'PhotoParentList' => $PhotoParentList,
            'dostukProgramList' => $dostukProgramList,
            'birinchiProgramList' => $birinchiProgramList,
            'kyrgyzradioProgramList' => $kyrgyzradioProgramList,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->except('tag_kg','tag_ru','thumbnail','q','channel_id','created_at','time'));
        $thumb_author = ($request->input('thumb_author'));

        $tag_kg_string = $request->input('tag_kg');
        $tags = explode("; ",$tag_kg_string);

        $tag_ru_string = $request->input('tag_ru');
        $tags2 = explode("; ",$tag_ru_string);

        if(!empty($tags)){

            foreach ($tags as $key => $name)
            {
                if(!is_numeric($name) && !empty($name))
                {
                    $tag = \Model\Tag\Tag::firstOrNew(['name' => $name]);
                    $tag->name = $name;
                    $tag->lang = 'kg';
                    $tag->save();
                    $tags[$key] = $tag->id();
                }
            }

//            $post->tags()->sync($tags);
        }// end if

        if(!empty($tags2)){
            foreach ($tags2 as $key => $name)
            {
                if(!is_numeric($name) && !empty($name))
                {
                    $tag = \Model\Tag\Tag::firstOrNew(['name' => $name]);
                    $tag->name = $name;
                    $tag->lang = 'ru';
                    $tag->save();
                    $tags2[$key] = $tag->id();
                }
            }

//            $post->tags()->sync($tags2);

        }// end if

        $tagsCommon = array_collapse([$tags, $tags2]);
        $post->tags()->sync($tagsCommon);

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'img/thumbnail';
            $btw = time();

            $name = $post->id().$btw.'.'.$file->getClientOriginalExtension();
            $name2 = $post->id().$btw.'_big.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['thumbnail']['tmp_name'])->fit(250, 150)->save($dir.'/'.$name);
            if($request->input('thumb_author')){
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(500, 300)->insert('http://ktrk.kg/stringtoimg.php?string='.urlencode($thumb_author).'&font_size=4&R=FF&G=FF&B=FF', 'bottom-right', 0, 0)->save($dir.'/'.$name2);
            } else {
                Image::make($_FILES['thumbnail']['tmp_name'])->fit(500, 300)->save($dir.'/'.$name2);
            }

            $post->thumbnail = $dir.'/'.$name;
            $post->thumbnail_big = $dir.'/'.$name2;
            $post->save();
        }

        if($request->input('channel_id') == null){
            $channel_id = 1;
            $post->channel_id = $channel_id;
        }
        if($request->input('created_at') != null){

            if($request->input('time')){
                $time = $request->input('time');
            } else
            {
                $time = date('H:i:s');
            }
            
            $postDate = $request->input('created_at');
            $timeToSave = date('H:i:s', strtotime($time));
            $saveDate = date('Y-m-d', strtotime($postDate));
            $result = $saveDate.' '.$timeToSave;
            $post->created_at = $result;
            $post->save();
        }else{
            $today = date('Y-m-d H:i:s');
            dd($today);
            $post->created_at = date('Y-m-d H:i:s');
            $post->save();
        }

        return redirect()->route('admin.post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.post.index');
    }

    // Number for list the rating
    public function number(Request $request, $number)
    {
        $postId = $number; // Post id
        $number = $request->number; // Number posted to be rating number

        $row = \Model\Post\ModelName::where('id','=',$postId)->first();
        $title = $row->title;
        $titleRu = $row->titleRu;
        
        if(($title != '') && ($titleRu != '')){
            $allPostKg = \Model\Post\ModelName::where('number','=',$number)->get();
            if($allPostKg != null){
                foreach($allPostKg as $post){
                    $post->number = '88';
                    $post->save();    
                }
            }
            $allPostRu = \Model\Post\ModelName::where('numberRu','=',$number)->get();
            if($allPostRu != null){
                foreach($allPostRu as $post){
                    $post->numberRu = '88';
                    $post->save();    
                }
            }
            $row->number = $number;
            $row->numberRu = $number;
            $row->save();
        }elseif($title != ''){
            $allPostKg = \Model\Post\ModelName::where('title','<>','')->where('number','=',$number)->get();
            if($allPostKg != null){
                foreach($allPostKg as $post){
                    $post->number = '88';
                    $post->save();    
                }
            }

            $row->number = $number;
            $row->save();

        }elseif($titleRu != ''){
            $allPostRu = \Model\Post\ModelName::where('titleRu','<>','')->where('numberRu','=',$number)->get();
            if($allPostRu != null){
                foreach($allPostRu as $post){
                    $post->numberRu = '88';
                    $post->save();    
                }
            }
            $row->numberRu = $number;
            $row->save();
            
        }else{
            $allPostRu = \Model\Post\ModelName::where('titleRu','<>','')->where('number','=',$number)->get();
            if($allPostRu != null){
                foreach($allPostRu as $post){
                    $post->number = '88';
                    $post->save();    
                }
                
            }
        }
        
        return redirect()->route('admin.post.index');
    }

    // Unnumber for list the rating
    public function unnumber(Request $request, $number)
    {
        $postId = $number;

        $row = \Model\Post\ModelName::where('id','=',$postId)->first();
        $row->number = 99;
        $row->numberRu = 99;
        $row->save();
        return redirect()->route('admin.post.index');
    }
}
