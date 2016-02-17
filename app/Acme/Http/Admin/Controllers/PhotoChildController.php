<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\PhotoChild\ModelName as PhotoChild;
use Intervention\Image\ImageManagerStatic as Image;

class PhotoChildController extends Controller
{

    public function index()
    {
        $photoChilds = PhotoChild::orderBy('id','desc')->get();

        return view('Admin::photoChild.index', [
            'photoChilds' => $photoChilds,
        ]);
    }

    public function create()
    {
        $tags = \Model\Tag\Tag::lists('name', 'id');

        $PhotoParentList = \Model\PhotoParent\ModelName::lists('name', 'id')->toArray();

        return view('Admin::photoChild.create', [
            'PhotoParentList' => $PhotoParentList,
            'photoChild' => new PhotoChild,
            'tags' => $tags,
        ]);
    }

    public function store(Request $request)
    {
        $photoChild = PhotoChild::create($request->except('file','tag_kg','tag_ru','q'));

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

            $photoChild->tags()->attach($tags);

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

            $photoChild->tags()->attach($tags2);

        }// end if

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $time = time();
            $dir  = 'froala/uploads';
            $name = $photoChild->id().$time.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['file']['tmp_name'])->heighten(600)->save($dir.'/'.$name);

            $photoChild->file = $dir.'/'.$name;
            $photoChild->save();
        }

        return redirect()->route('admin.photoChild.index');
    }

    public function show(PhotoChild $photoChild)
    {
        $PhotoParentList = \Model\PhotoParent\ModelName::lists('name', 'id')->toArray();

        return view('Admin::photoChild.show', [
            'PhotoParentList' => $PhotoParentList,
            'photoChild' => $photoChild,
        ]);
    }

    public function edit(PhotoChild $photoChild)
    {
        $tags = \Model\Tag\Tag::lists('name', 'id');
        $PhotoParentList = \Model\PhotoParent\ModelName::lists('name', 'id')->toArray();
        return view('Admin::photoChild.edit', [
            'photoChild' => $photoChild,
            'PhotoParentList' => $PhotoParentList,
            'tags' => $tags,
        ]);
    }

    public function update(Request $request, PhotoChild $photoChild)
    {
        $photoChild->update($request->except('file','tag_kg','tag_ru','q'));

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
                    $tag->save();
                    $tags2[$key] = $tag->id();
                }
            }

//            $post->tags()->sync($tags2);

        }// end if

        $tagsCommon = array_collapse([$tags, $tags2]);
        $photoChild->tags()->sync($tagsCommon);

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $time = time();
            $dir  = 'froala/uploads';
            $name = $photoChild->id().$time.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['file']['tmp_name'])->heighten(600)->save($dir.'/'.$name);

            $photoChild->file = $dir.'/'.$name;
            $photoChild->save();
        }

        return redirect()->route('admin.photoChild.show', $photoChild);
    }

    public function destroy(PhotoChild $photoChild)
    {
        $photoChild->delete();

        return redirect()->route('admin.photoChild.index');
    }
}
