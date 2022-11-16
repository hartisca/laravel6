@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
<<<<<<< HEAD
        @if (is_null($file->filepath))
=======
        @if (is_null($file))
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
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
<<<<<<< HEAD
            <!--<td scope="col">Updated</td>-->         
=======
            <!--<td scope="col">Updated</td>-->        
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
        </tr>        
    </thead>
    <tbody>  
    <tr>
<<<<<<< HEAD
        <td><a href="{{ route('posts.show',$post) }}" height="10" width="10">{{ $post->id }}</a></td>                               
=======
        <td><a href="{{ route('posts.show',$post) }}" height="10" width="10">{{ $post->id }}</a></td>                              
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
        <td>{{ $post->longitude }}</td>
        <td>{{ $post->latitude }}</td>
        <td>{{ $post->author_id }}</td>
        <td>{{ $post->created_at }}</td>
        <!--<td>{{ $post->updated_at }}</td>-->
<<<<<<< HEAD
        
    </tr>      
    <br>  
        <tr>
            <td>    
                <label for="body">Comment: </label> 
                <br>                
                <text>{{ $post->body }} </text>
            </td>
        </tr>     
=======
       
        </tr>      
    <br>  
        <tr>
            <td>    
                <label for="body">Comment: </label>
                <br>                
                <text>{{ $post->body }} </text>
            </td>
        </tr>    
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
        <tr>
            <td>    
                <a href="{{ route('posts.index')}}" class="btn btn-primary">Back</a>  
            </td>                
<<<<<<< HEAD
        </tr>       
=======
        </tr>      
>>>>>>> 67012caf376bfb4eb41463277057951a2cf90b59
    </tbody>
</table>
@endsection
