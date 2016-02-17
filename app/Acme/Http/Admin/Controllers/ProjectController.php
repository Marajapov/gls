<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\File;
use Model\Project\ModelName as Project;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('Admin::project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::project.create', ['project' => new Project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create($request->except('q','thumbnail'));

        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'img/thumbnail/projects';
            $btw = time();

            $name = $project->id().$btw.'.'.$file->getClientOriginalExtension();

            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['thumbnail']['tmp_name'])->fit(250, 150)->save($dir.'/'.$name);

            $project->thumbnail = $dir.'/'.$name;
            $project->save();
        }

        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('Admin::project.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('Admin::project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->except('q','thumbnail'));
        
        if($request->hasFile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $dir  = 'img/thumbnail/projects';
            $btw = time();

            File::delete($project->thumbnail);

            $name = $project->id().$btw.'.'.$file->getClientOriginalExtension();
            
            $storage = \Storage::disk('public');
            $storage->makeDirectory($dir);

            Image::make($_FILES['thumbnail']['tmp_name'])->fit(250, 150)->save($dir.'/'.$name);

            $project->thumbnail = $dir.'/'.$name;
            $project->save();
        }

        return redirect()->route('admin.project.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index');
    }
}
