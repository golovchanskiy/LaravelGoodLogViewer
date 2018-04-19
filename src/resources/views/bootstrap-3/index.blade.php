<?php /** @var array $pathList */ ?>
<?php /** @var string $currentPath */ ?>
<?php /** @var array $fileList */ ?>
<?php /** @var string $currentFile */ ?>

@extends('good-log-viewer::bootstrap-3.master')

@section('title', trans('good-log-viewer::general.your-logs'))

@section('content')

    {{ Form::open([
        'role' => 'form',
        'autocomplete' => 'off',
        'class' => 'form-inline',
        'id' => 'logs-form',
    ]) }}

    <div class="form-group">
        {{ Form::label('path', trans('good-log-viewer::general.path')) }}
        {{ Form::select('path', $pathList, $currentPath, ['class' => 'form-control', 'id' => 'path-input']) }}
    </div>

    <div class="form-group">
        {{ Form::label('file', trans('good-log-viewer::general.file')) }}
        {{ Form::select('file', $fileList, $currentFile, ['class' => 'form-control logs-input']) }}
    </div>

    {{ Form::close() }}

    <br>
    <div id="log-container">

    </div>

@endsection

@section('scripts')
    <script>
        $('#path-input').on('change', function () {
            document.location.href = '{{ route(config('good-log-viewer.routes.prefix') . '.index') }}' + '?path=' + $('#path-input').val();
        });

        function showLog() {
            $.ajax({
                url: '{{ route(config('good-log-viewer.routes.prefix') . '.data') }}',
                method: "GET",
                data: $('#logs-form').serialize(),
                success: function (response) {
                    $('#log-container').html(response);
                }
            });
        }

        showLog();
        $('.logs-input').on('change', function () {
            showLog();
        });
    </script>
@endsection