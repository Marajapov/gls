<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\Media\ModelName as Media;
use Intervention\Image\ImageManagerStatic as Image;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::orderby('id','desc')->get();

        return view('Admin::media.index', ['medias' => $medias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = \Model\Tag\Tag::lists('name', 'id');
        $projectList = \Model\Project\ModelName::lists('name', 'id')->toArray();
        

        return view('Admin::media.create', [
            'media' => new Media,
            'projectList' => $projectList,
            'tags' => $tags,
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

        $media = Media::create($request->except('tag_kg','tag_ru','q', 'thumbnail','hitnumber'));

        if($request->input('hitnumber')){
            $hitnumber = $request->input('hitnumber');
            $allMedias = \Model\Media\ModelName::where('hitnumber','=',$hitnumber)->get();
            foreach ($allMedias as $key => $value) {
                $value->hitnumber = 0;
            }

            $media->hitnumber = $hitnumber;
            $media->save();
        }

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

            $media->tags()->attach($tags);

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

            $media->tags()->attach($tags2);

        }// end if

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'img/thumbnail';
            $btw = time();

            $name = $media->id().$btw.'.'.$file->getClientOriginalExtension();
            $name2 = $media->id().$btw.'_big.'.$file->getClientOriginalExtension();

//            $manager = new ImageManager(array('driver' => 'imagick'));

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['thumbnail']['tmp_name'])->fit(250, 150)->save($dir.'/'.$name);
            Image::make($_FILES['thumbnail']['tmp_name'])->fit(1000, 600)->save($dir.'/'.$name2);

            $media->thumbnail = $dir.'/'.$name;
            $media->thumbnail_big = $dir.'/'.$name2;
            $media->save();
        }

        return redirect()->route('admin.media.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        if($media->videoType)
        {
            $mediaCategory = \Model\MediaCategory\ModelName::where('videoType','=',$media->videoType)->first();
        }
        else
        {
            $mediaCategory = '';
        }

        if($media->program)
        {
            $project = \Model\Project\ModelName::where('id','=',$media->program)->first();
        }
        else
        {
            $project = '';
        }

        return view('Admin::media.show', [
            'media' => $media,
            'mediaCategory' => $mediaCategory,
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        $tags = \Model\Tag\Tag::lists('name', 'id');
        $projectList = \Model\Project\ModelName::lists('name', 'id')->toArray();
        
        return view('Admin::media.edit', [
            'media' => $media,
            'projectList' => $projectList,
            'tags' => $tags,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        $media->update($request->except('tag_kg','tag_ru','q', 'thumbnail','hitnumber'));

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
        $media->tags()->sync($tagsCommon);

        if($request->input('hitnumber')){
            $hitnumber = $request->input('hitnumber');

            $allMedias = \Model\Media\ModelName::where('hitnumber','=',$hitnumber)->get();
            foreach ($allMedias as $key => $value) {
                $value->hitnumber = 0;
                $value->save();
            }

            $media->hitnumber = $hitnumber;
            $media->save();
        }

       if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'img/thumbnail';
            $btw = time();

            $name = $media->id().$btw.'.'.$file->getClientOriginalExtension();
            $name2 = $media->id().$btw.'_big.'.$file->getClientOriginalExtension();

//            $manager = new ImageManager(array('driver' => 'imagick'));

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['thumbnail']['tmp_name'])->fit(250, 150)->save($dir.'/'.$name);
            Image::make($_FILES['thumbnail']['tmp_name'])->fit(500, 300)->save($dir.'/'.$name2);

            $media->thumbnail = $dir.'/'.$name;
            $media->thumbnail_big = $dir.'/'.$name2;
            $media->save();
        }
        return redirect()->route('admin.media.show', $media);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Media $media)
    {
        $media->delete();

        return redirect()->route('admin.media.index');
    }

    // video1
    public function dayVideo1(Request $request)
    {
        $id = $request->media;
        $mediaStars = \Model\Media\ModelName::where('dayVideo','=','1')->get();
        foreach($mediaStars as $mediaStar)
        {
            $mediaStar->dayVideo = 0;
            $mediaStar->save();
        }

        $row = \Model\Media\ModelName::where('id','=',$id)->first();
        $row->dayVideo = 1;
        $row->save();
        return redirect()->route('admin.media.index');
    }

    public function dayVideoRu1(Request $request)
    {
        $id = $request->media;
        $mediaStars = \Model\Media\ModelName::where('dayVideo','=','11')->get();
        foreach($mediaStars as $mediaStar)
        {
            $mediaStar->dayVideo = 0;
            $mediaStar->save();
        }

        $row = \Model\Media\ModelName::where('id','=',$id)->first();
        $row->dayVideo = 11;
        $row->save();
        return redirect()->route('admin.media.index');
    }

    // video2
    public function dayVideo2(Request $request)
    {
        $id = $request->media;
        $mediaStars = \Model\Media\ModelName::where('dayVideo','=','2')->get();
        foreach($mediaStars as $mediaStar)
        {
            $mediaStar->dayVideo = 0;
            $mediaStar->save();
        }

        $row = \Model\Media\ModelName::where('id','=',$id)->first();
        $row->dayVideo = 2;
        $row->save();
        return redirect()->route('admin.media.index');
    }

    // video3
    public function dayVideo3(Request $request)
    {
        $id = $request->media;
        $mediaStars = \Model\Media\ModelName::where('dayVideo','=','3')->get();
        foreach($mediaStars as $mediaStar)
        {
            $mediaStar->dayVideo = 0;
            $mediaStar->save();
        }

        $row = \Model\Media\ModelName::where('id','=',$id)->first();
        $row->dayVideo = 3;
        $row->save();
        
        return redirect()->route('admin.media.index');
    }

    // video4
    public function dayVideo4(Request $request)
    {
        $id = $request->media;
        $mediaStars = \Model\Media\ModelName::where('dayVideo','=','4')->get();
        foreach($mediaStars as $mediaStar)
        {
            $mediaStar->dayVideo = 0;
            $mediaStar->save();
        }

        $row = \Model\Media\ModelName::where('id','=',$id)->first();
        $row->dayVideo = 4;
        $row->save();
        
        return redirect()->route('admin.media.index');
    }

     // Number for list the rating
    public function number(Request $request, $number)
    {
        $postId = $number;
        $number = $request->number;

        $row = \Model\Post\ModelName::where('id','=',$postId)->first();
        $row->number = $number;
        $row->save();
        return redirect()->route('admin.media.index');
    }

    // Unnumber for list the rating
    public function unnumber(Request $request, $number)
    {
        $postId = $number;

        $row = \Model\Post\ModelName::where('id','=',$postId)->first();
        $row->number = 99;
        $row->save();
        return redirect()->route('admin.media.index');
    }
}
