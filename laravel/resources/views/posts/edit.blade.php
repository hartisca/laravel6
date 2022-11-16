@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        <tr>            
<<<<<<< HEAD
        @if (file_exists($file))
            <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        @else
            <img class="img-fluid" src="" alt="Image not found" />
        @endif            
        </tr>
    </thead>
    <tbody>                                                         
=======
        @if (is_null($file))
            <img class="img-fluid" src="" alt="Image not found" />
        @else
            <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        @endif        
        </tr>
    </thead>
    <tbody>                                                        
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
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
<<<<<<< HEAD
    <div class="form-group">   
                <label for="body">Comment: </label> 
=======
    <div class="form-group">  
                <label for="body">Comment: </label>
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
                <br>                
                <textarea name="body" rows="6" cols="60">{{ $post->body }} </textarea>
    </div>
    <div>
        <br>
<<<<<<< HEAD
        <button type="submit" class="btn btn-primary">Save</button>   
        <button type="reset" class="btn btn-secondary">Reset</button>       
=======
        <button type="submit" class="btn btn-primary">Save</button>  
        <button type="reset" class="btn btn-secondary">Reset</button>      
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
    </div>    
    </tbody>
</table>
                   
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
