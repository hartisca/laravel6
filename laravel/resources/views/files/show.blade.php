@extends('layouts.app')
 
@section('content')
<table class="table">
    <thead>
        <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
        <tr>
            <td scope="col">ID</td>
            <td scope="col">Filepath</td>
            <td scope="col">Filesize</td>
            <td scope="col">Created</td>
            <td scope="col">Updated</td>            
        </tr>        
    </thead>
    <tbody>  
    <tr>
        <td><a href="{{ route('files.show',$file) }}">{{ $file->id }}</a></td>                               
        <td>{{ $file->filepath }}</td>
        <td>{{ $file->filesize }}</td>
        <td>{{ $file->created_at }}</td>
        <td>{{ $file->updated_at }}</td>
        
    </tr>
        <tr>
            <td>    
                <a href="{{ route('files.index')}}" class="btn btn-primary">Back</a>  
            </td>                                          
                
        </tr>       
    </tbody>
</table>
@endsection