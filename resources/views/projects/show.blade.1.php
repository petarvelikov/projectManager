@extends('layout')

@section('content')

    <div>
        <h1 class="text-center">{{ $project[0]->title }}</h1>
        <br>
        <div class="col-md-10 col-md-offset-1">
            <p>{{ $project[0]->description }}</p>
        </div>
    </div>

    <br>

    <div class="card border-primary mb-3">
        <div class="card-header text-center" style="padding: 5px;"><h3 style="margin: 0;">Добавяне на нова задача</h3></div>
        <div class="card-body" style="padding: 10px;">
            <form action="/projects/{{ $project[0]->id }}/tasks" method="POST">
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
        <table id="project-tasks-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 50px;">Ид</th>
                    <th style="width: 100px;">Изпълнена</th>
                    <th>Описание на задачата</th>
                    <th style="width: 100px;">Действие</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="text-right" colspan="3">Общо задачи:</th>
                    <th class="text-left">{{ $projectTasks->count() }}</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($projectTasks as $projectTask)
                    <tr>
                        <td>{{ $projectTask->id }}</td>
                        <td>
                            <form method="POST" action="/tasks/{{ $projectTask->id }}">
                                @method('PATCH')
                                @csrf

                                <label class="checkbox {{ $projectTask->completed ? 'is-complete' : '' }}" for="completed">
                                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $projectTask->completed ? 'checked' : '' }} />
                                </label>
                            </form>
                        </td>
                        <td>{{ $projectTask->description }}</td>
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
