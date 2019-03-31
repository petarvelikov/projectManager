@extends('layout')

@section('content')

    <h1 class="text-center text-primary">Проекти на {{ auth()->user()->username }}</h1>

    <br>

    @if($projects->count() == 0)
        <h3 class="text-info text-center">В момента нямате никакви проекти. <a href="/projects/create">Създайте първия.</a></h3>
    @else
        <div class="row">
            @foreach($projects as $project)
                <div class="col-md-4" style="margin-bottom: 25px;">
                    <div class="card border-primary">
                        <div class="card-header card-title bg-gradient-primary info-box-text" style="padding: 5px; color: aliceblue;">
                            {{ $project->title }}
                        </div>
                        <div class="card-body" style="padding: 0 3px;">
                            <div style="display: inline-block; margin-left: -3px;">
                                <a class="" href="{{ url('/projects/' . $project->id) }}" title="Преглеждане на проекта и задачите"><i class="info-box-icon bg-aqua fas fa-3x fa-tasks"></i></a>
                            </div>
                            <div style="display: inline-block;">
                                <span class="info-box-text" style="margin-bottom: 25px;">Задачи: <strong>{{ $project->task_count }}</strong></span>
                            </div>
                            <div style="display: inline-block; margin-left: 36px;">
                                <a class="btn btn-primary btn-sm" href="{{ route('projects.edit', $project->id) }}">Промени</a>
                                <form action="{{ url('/projects/' . $project->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete-project btn btn-sm btn-danger" type="submit">Изтрий</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a class="btn btn-success create-button" href="/projects/create" title="Създай нов проект"><i class="fas fa-plus fa-3x"></i></a>

@endsection
