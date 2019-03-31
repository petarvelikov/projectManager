<?php

namespace App\Http\Controllers;

use DB;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectTasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'description' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('tasks')->where(function ($query) use($id) {
                    return $query->where('project_id', $id);
                })
            ]
        ]);

        $userProjectTaskCount = DB::table('tasks')->where('project_id', $id)->count();

        if ($userProjectTaskCount === 10) {
            return back()->with(notify()->warning('Достигнали сте максималният брой задачи, които можете да създадете за този проект.'));
        } else {
            $task = new Task([
                'description'=> $request->get('description'),
                'completed' => 0,
                'project_id'=> $id
            ]);

            $task->save();

            return back()->with(notify()->success('Задачата е създадена успешно.'));
        }
    }


    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return back()->with(notify()->success('Задачата е изтрита успешно.'));
    }

}
