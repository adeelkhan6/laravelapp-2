<?php

namespace App\Http\Controllers;
use App\Events\ProjectCreated;
use App\Project;
use App\Mail\ProjectCreated as MailProjectCreated;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth')->only(['store', 'update']);
       // $this->middleware('auth')->except(['show']);

        $this->middleware('auth');
    }

    public function index() {
        
        // return $project = App\project::all();

        // $projects = project::all();

        // auth()->id() // 4
        // auth()->user() // user who currently logged in
        // auth()->check() // boolean
        // auth()->guest() // 

        // $projects = Project::where('owner_id', auth()->id())->get(); // SELECT *FROM PROJECTS WHERE OWNER_ID = 4;

        /* $projects = auth()->user()->projects; 
         return view('projects.index', compact('projects'));
         */

        return view('projects.index', [

            'projects' => auth()->user()->projects
        ]);

    }

    public function create() {

        return view('projects.create');
    }

    public function show(Project $project) {
      
        // $project = Project::findorFail($id);
        // if($project->owner_id !== auth()->id()) {  // autharization first way
        //     abort(403);
        // }

        // abort_if($project->owner_id !== auth()->id(), 403); // 2nd way of autherization
        
        // auth()->user()->can('update', '$project');     // another way
        // auth()->user()->cannot('update', '$project'); // another way

        $this->authorize('update', $project);  // 3rd way

        // if(\Gate::denies('update', $project)) {  // 4th way
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update', $project), 403);  // 5th way 
        // abort_unless(\Gate::allows('update', $project), 403);  // 6th way to authorize

       return view('projects.show')->with('project', $project);
           
       }

    public function edit(Project $project) {

        //  $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
        
    }

    public function update(Project $project) {

        // $project = Project::findOrFail($id);

        // request()->validate([

        //     'title'       => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']

        // ]);
        // $project->update(request(['title', 'description']));

        $project->update($this->validateProject());


        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();

        return redirect('/projects');

    }

    public function destroy(Project $project) {
        
        // $project = Project::findOrFail($id);

        $project->delete();
        return redirect('/projects');
    }

    public function store() {
        // $store = request()->validate([

        //     'title'       => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']

        // ]);

            
         $store = $this->validateProject();

        
        // Project::create($store + ['owner_id' => auth()->id()]);
        $store['owner_id'] = auth()->id();

        // $project = Project::create($store);
        $project = Project::create($store);
        event(new ProjectCreated($project));
        // \Mail::to('hamza@yahoo.com')->send(
        //     new ProjectCreated($project)
        // );

        // \Mail::to($project->owner->email)->send(
        //     new ProjectCreated($project)
        // );
        return redirect('projects');

        // Project::create(
        // request()->validate([

        //     'title'       => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']

        // ])
       // );

        // Project::create(request(['title', 'description']));
        // return request()->all();

        // $project = new Project();
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();
        // dd(request(['title', 'description']));
        

        // project::create(request()->all());
        // return "done";

        // dd(request()->all());

        // dd(request(['title']));

        // dd(request('title'));
        
        // dd(request(['title', 'description']));

        // dd([
        //     'title'       => request('title'),
        //     'description' => request('description') 
        // ]);

        // return [
        //     'title'       => request('title'),
        //     'description' => request('description') 
        // ];


        // Project::create([

        //     'title'       => request('title'),
        //     'description' => request('description') 
        // ]);
       
    }

    protected function validateProject()
    {
        return request()->validate([

            'title'       => ['required', 'min:3'],
            'description' => ['required', 'min:3']

        ]);
    }
}
