@extends('layout')

@section('content')

    <div>
        <h1 class="text-center">{{ $project->title }}</h1>
        <div class="col-md-10 col-md-offset-1">
            <p class="text-center">{{ $project->description }}</p>
        </div>
    </div>

    <br>

    <div class="card border-primary mb-3">
        <div class="card-header text-center" style="padding: 5px;"><h3 style="margin: 0;">Добавяне на нова задача</h3></div>
        <div class="card-body" style="padding: 10px;">
            <form action="/projects/{{ $project->id }}/tasks" method="POST">
                <div class="form-group row" style="margin: 0;">
                    @csrf
                    <div class="col-md-10">
                        <input id="task-description" type="text" class="form-control p-3{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" placeholder="Описание на задачата" autocomplete="off" required />
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-2 text-center">
                        <button class="btn btn-success" type="submit">Запиши</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <br>

    <div class="row">
        <table id="project-tasks-table" class="table table-bordered">
            <thead>
                <tr>
                    <th class="d-none" style="width: 50px;">Ид</th>
                    <th style="width: 125px;">Изпълнена</th>
                    <th>Описание на задачата</th>
                    <th style="width: 100px;">Действие</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-right" colspan="2">Общо задачи:</th>
                    <th class="text-left">{{ $projectTasks->count() }}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($projectTasks as $projectTask)
                    <tr class="{{ $projectTask->completed === 1 ? 'bg-success' : '' }}">
                        <td class="d-none">{{ $projectTask->id }}</td>
                        <td class="text-center">
                            @if ($projectTask->completed === 0)
                                <button class="btn btn-sm btn-success btn-incomplete" data-task-id="{{ $projectTask->id }}">Изпълни я</button>
                            @else
                                <button class="btn btn-sm btn-warning btn-complete" data-task-id="{{ $projectTask->id }}">Не е изпълнена</button>
                            @endif
                        </td>
                        <td>
                            {{ $projectTask->description }}
                        </td>
                        <td class="text-center">
                            <form action="{{ url('/tasks/' . $projectTask->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Изтрий</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
