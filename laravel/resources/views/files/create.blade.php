@extends('layouts.box-app')

@section('box-title')
    {{ __('Add file') }}
@endsection

@section('box-content')
    <form method="post" id="create" action="{{ route('files.store') }}" enctype="multipart/form-data">
        @csrf
        @vite('resources/js/files/create.js')
<<<<<<< HEAD
=======
        
>>>>>>> a7559ad133f0c194bd8d530cd590d04f6d56d6ea
        <div class="form-group">
            <label for="upload">{{ _('File') }}:</label>
            <input type="file" class="form-control" name="upload"/>
        </div>
        <br>
<<<<<<< HEAD
        <div id="error"></div>
=======
        <div id="error"> </div>
>>>>>>> a7559ad133f0c194bd8d530cd590d04f6d56d6ea
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
    </form>
@endsection