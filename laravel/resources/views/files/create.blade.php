@extends('layouts.box-app')

@section('box-title')
    {{ __('Add file') }}
@endsection

@section('box-content')
    <form method="post" id="create" action="{{ route('files.store') }}" enctype="multipart/form-data">
        @csrf
        @env(['local', 'developmnet'])
            @vite('resources/js/files/create.js')
        @endenv
        @env(['production'])
            @php
                $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
        <link rel="stylesheet" href="/build/{{ $manifest['resources/sass/app.scss']['file'] }}">
        @endenv

        
        <div class="form-group">
            <label for="upload">{{ _('File') }}:</label>
            <input type="file" class="form-control" name="upload"/>
        </div>
        <br>
        <div id="error" class="alert alert-danger alert-dismissible fade"></div>
        
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
    </form>
@endsection