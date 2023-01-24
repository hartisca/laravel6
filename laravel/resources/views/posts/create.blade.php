@extends('layouts.box-app')
 
@section('box-title')
    {{ __('Add post') }}
@endsection
 
@section('box-content')
    <form method="post" id="create" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        @env(['local', 'developmnet'])
            @vite('resources/js/posts/create.js')
        @endenv
        @env(['production'])
            @php
                $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
        @endphp
        <script type="module" src="/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
        <link rel="stylesheet" href="/build/{{ $manifest['resources/sass/app.scss']['file'] }}">
        @endenv
        <div id="body" class="form-group">
            <label for="body">{{ _('Body') }}</label>
            <textarea id="body" name="body" class="form-control"></textarea>
            <div class="error alert alert-danger alert-dismissible fade"></div>
        </div>

        <div id="upload" class="form-group">
            <label for="upload">{{ _('File') }}</label>
            <input type="file" id="upload" name="upload" class="form-control" />
            <div class="error alert alert-danger alert-dismissible fade"></div>
        </div>

        <div id="latitude" class="form-group">            
                <label for="latitude">{{ _('Latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control"
                    value="41.2310371"/>
            <div class="error alert alert-danger alert-dismissible fade"></div>            
        </div>

        <div id="longitude" class="form-group">            
            <label for="longitude">{{ _('Longitude') }}</label>
            <input type="text" id="longitude" name="longitude" class="form-control"
                    value="1.7282036"/>
            <div  class="error alert alert-danger alert-dismissible fade"></div>                    
        </div>        

        <div class="form-group">
            <label for="visibility">{{ _('Visibility') }}: </label>
               
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="visibility" value="1" checked>
                    <label class="form-check-label" for="visibility">Public</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="visibility" value="2">
                    <label class="form-check-label" for="visibility">Contacts</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="visibility" value="3">
                    <label class="form-check-label" for="visibility">Private</label>
                </div>          
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
    </form>
@endsection
