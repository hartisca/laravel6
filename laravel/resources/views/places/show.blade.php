@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        @if (is_null($file))
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
            <!--<td scope="col">Updated</td> -->           
        </tr>        
    </thead>
    <tbody>  
    <tr>
        <td><a href="{{ route('places.show',$place) }}">{{ $place->id }}</a></td>                               
        <td>{{ $place->longitude }}</td>
        <td>{{ $place->latitude }}</td>
        <td>{{ $place->author_id }}</td>
        <td>{{ $place->created_at }}</td>
        <!--<td>{{ $place->updated_at }}</td>-->
        
    </tr>
        <td><a href="{{route('places.show', $place)}}" height="10" width="10">{{$place->id}}</a></td>
        <td>{{ $place->longitude}}</td>
        <td>{{ $place->latitude}}</td>
        <td>{{ $place->author_id}}</td>
        <td>{{ $place->created_at}}</td>
        <!--<td>{{ $place->updated_at}}</td>-->

    <tr>
    <tr>
        <td>
            <label for="description">Review: </label>
            <br>
            <textarea name="description" rows="6" cols="60">{{ $place->description}}</textarea>
        </td>
    </tr>    
    <tr>
        <td>    
            <a href="{{ route('places.index')}}" class="btn btn-primary">Back</a>  
        </td>                                          
    </tr>       
    </tbody>
</table>
@endsection