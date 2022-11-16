@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        <tr>            
        @if (file_exists($file))
            <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        @else
            <img class="img-fluid" src="" alt="Image not found" />
        @endif            
        </tr>
    </thead>
    <tbody>                                                         
        <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
    <div class="form-group">
            <label for="upload">File:</label>
            <input type="file" class="form-control" name="upload"/>
        <br>
            <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" name="longitude" value="{{ $post->longitude }}"/>
        <br>
            <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" name="latitude" value="{{ $post->latitude }}">
    </div>
    <div class="form-group">   
                <label for="body">Comment: </label> 
                <br>                
                <textarea name="body" rows="6" cols="60">{{ $post->body }} </textarea>
    </div>
    <div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>   
        <button type="reset" class="btn btn-secondary">Reset</button>       
    </div>    
    </tbody>
</table>
                   
@endsection