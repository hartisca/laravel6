@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Posts') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Latitude</td>
                               <td scope="col">Longitude</td>
                               <td scope="col">Autor</td>
                               <td scope="col">Created</td>
                               <td scope="col">Updated</td>
                               <td scope="col" colspan = 2>Actions</td>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($posts as $post)
                           <tr>
                               <td><a href="{{ route('posts.show',$post) }}">{{ $post->id }}</a></td>                               
                               <td>{{ $post->Latitude }}</td>
                               <td>{{ $post->Longitude }}</td>
                               <td>{{ $post->author_id->name }}</td>
                               <td>{{ $post->created_at }}</td>
                               <td>{{ $post->updated_at }}</td>
                               <td>                                   
                                    <form action="{{route('posts.edit', $post->id )}}">                                                      
                                        <button type="sumbit" class="btn btn-primary">Edit</button>
                                    </form>
                               </td>
                               <td>
                                    <form method="POST" action="{{route('posts.destroy', $post->id )}}"> 
                                        @csrf
                                        @method('DELETE')               
                                        <button type="sumbit" class="btn btn-danger">Delete</button>
                                    </form>
                               </td>      

                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   
               </div>
           </div>
           <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Add new post</a>
       </div>
   </div>
</div>
@endsection