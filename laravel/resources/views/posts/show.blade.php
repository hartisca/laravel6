@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        <tr>
            <td scope="col">ID</td>
            <td scope="col">Longitude</td>
            <td scope="col">Latitude</td>
            <td scope="col">Autor</td>
            <td scope="col">Created</td>
            <td scope="col">Updated</td>            
        </tr>        
    </thead>
    <tbody>  
    <tr>
        <td><a href="{{ route('posts.show',$post) }}">{{ $post->id }}</a></td>                               
        <td>{{ $post->longitude }}</td>
        <td>{{ $post->latitude }}</td>
        <td>{{ $post->author_id }}</td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->updated_at }}</td>
        
    </tr>
        <tr>
            <td>    
                <a href="{{ route('posts.index')}}" class="btn btn-primary">Back</a>  
            </td>                                          
                
        </tr>       
    </tbody>
</table>
@endsection