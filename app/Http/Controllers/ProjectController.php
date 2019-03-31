<?php

namespace App\Http\Controllers;

use DB;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $projects = DB::table('projects')
            ->where('user_id', auth()->id())
            ->leftJoin('tasks', 'projects.id', '=', 'tasks.project_id')
            ->select(
                'projects.id as id',
                'projects.title as title',
                DB::raw('count(tasks.id) as task_count, tasks.project_id')
            )
            ->groupBy('projects.id')
            ->orderBy('projects.id', 'desk')
            ->get();

        return view('projects.index', compact('projects'));
    }


    public function create()
    {
        $userProjectCount = DB::table('projects')->where('user_id', auth()->id())->count();

        if ($userProjectCount === 6) {
            return back()->with(notify()->warning('Достигнали сте максималният брой проекти, които можете да създадете.'));
        } else {
            return view('projects.create');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:25',
            'description' => 'max:255'
        ]);

        $project = new Project([
            'title' => $request->get('title'),
            'description'=> $request->get('description'),
            'user_id'=> auth()->id()
        ]);

        $project->save();

        return redirect('/projects')->with(notify()->success('Проектът е създаден успешно.'));
    }


    public function show($id)
    {
        $project = Project::findOrFail($id);
        abort_if($project->user_id !== auth()->id(), 403);
        $projectTasks = DB::table('tasks')->where('project_id', $id)->get();

        return view('projects.show', compact('project', 'projectTasks'));
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:25',
            'description' => 'max:255'
        ]);

        $project = Project::find($id);
        $project->title = $request->get('title');
        $project->description = $request->get('description');
        $project->save();

        return redirect('/projects')->with(notify()->success('Проектът е променен успешно.'));
    }


    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        DB::table('tasks')->where('project_id', $id)->delete();
        $project->delete();

        return redirect('/projects')->with(notify()->success('Проектът е изтрит успешно.'));
    }

}
