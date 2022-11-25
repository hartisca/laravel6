@extends('layouts.box-app')

@section('box-title')
    {{ __('Add post') }}
@endsection

@section('box-content')
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="body">{{ _('Body') }}</label>
            <textarea id="body" name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">{{ _('File') }}</label>
            <input type="file" id="upload" name="upload" class="form-control" />
        </div>
        <div class="form-group">            
                <label for="latitude">{{ _('Latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control"
                    value="41.2310371"/>
        </div>
        <div class="form-group">            
            <label for="longitude">{{ _('Longitude') }}</label>
            <input type="text" id="longitude" name="longitude" class="form-control"
                    value="1.7282036"/>
        </div>
        <div class="form-group">
            <label for="visibility">{{ _('Visibility') }}: </label>
                
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="visibility" value="1" checked>
                    <label class="form-check-label" for="visibility">Public</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="visibility" value="2">
                    <label class="form-check-label" for="visibility">Private</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="radio" name="visibility" value="3">
                    <label class="form-check-label" for="visibility">Contacts</label>
                </div>          
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
    </form>
@endsection

