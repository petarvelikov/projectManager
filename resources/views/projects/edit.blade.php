@extends('layout')

@section('content')

    <br>
    <br>
    <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary mb-3">
                    <div class="card-header text-center bg-primary text-secondary"><h4>Промяна на проекта</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('projects.update', $project->id) }}">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Име на проекта:</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control p-3{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $project->title }}" autocomplete="off" required />
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Описание:</label>
                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control p-3{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $project->description }}" autocomplete="off" />
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row m-0 justify-content-center">
                                <a class="btn btn-info" href="/projects"><i class="fas fa-long-arrow-alt-left">&nbsp;</i>Отказ</a>
                                &nbsp;
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save">&nbsp;</i>
                                    Запази
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

@endsection
