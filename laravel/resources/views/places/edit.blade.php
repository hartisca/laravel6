@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        <tr>
            <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        </tr>
    </thead>
    <tbody>  
                                                              
        <form method="post" action="{{ route('places.update', $place) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf   
    <div class="form-group">
        <label for="upload">Place:</label>
        <input type="file" class="form-control" name="upload"/>
        <br>
        <label for ="longitude">Longitude</label>
        <input type="text" class="form-control" name="longitude" value="{{ $place->logitude}}">
        <br>
        <label for ="latitude" >Latitue:</label>
        <input type="text" class="form-control" name="latitude" value="{{ $place->latitude}}">
    </div>
    <br>
    <div class="form-group">
        
        <textarea name="description" rows="6" cols="60" maxlength="225" placeholder="{{ $place->description}}"> </textarea>
    </div>
        <br>
        <button type="submit" class="btn btn-primary">Save</button>   
        <button type="reset" class="btn btn-secondary">Reset</button>           
    </tbody>
</table>
                   
@endsection