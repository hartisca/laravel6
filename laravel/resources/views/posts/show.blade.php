@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        @if (is_null($file->filepath))
            <img class="img-fluid" src="" alt="Image not found" />
        @else
            <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        @endif
        <tr>
            <td scope="col">ID</td>
            <td scope="col">Longitude</td>
            <td scope="col">Latitude</td>
            <td scope="col">Autor</td>
            <td scope="col">Created</td>
            <!--<td scope="col">Updated</td>-->         
        </tr>        
    </thead>
    <tbody>  
    <tr>
        <td><a href="{{ route('posts.show',$post) }}" height="10" width="10">{{ $post->id }}</a></td>                               
        <td>{{ $post->longitude }}</td>
        <td>{{ $post->latitude }}</td>
        <td>{{ $post->author_id }}</td>
        <td>{{ $post->created_at }}</td>
        <!--<td>{{ $post->updated_at }}</td>-->
        
    </tr>      
    <br>  
        <tr>
            <td>    
                <label for="body">Comment: </label> 
                <br>                
                <text>{{ $post->body }} </text>
            </td>
        </tr>     
        <tr>
            <td>    
                <a href="{{ route('posts.index')}}" class="btn btn-primary">Back</a>  
            </td>                
        </tr>       
    </tbody>
</table>
@endsection