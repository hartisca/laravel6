@extends('layouts.app')
 
@section('content')

           <div class="card">
               <div class="card-header">{{ __('places') }}</div>
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
                           @foreach ($places as $place)
                           <tr>
                               <td><a href="{{ route('places.show',$place) }}">{{ $place->id }}</a></td>                               
                               <td>{{ $place->latitude }}</td>
                               <td>{{ $place->longitude }}</td>
                               <td>{{ $place->author_id }}</td>
                               <td>{{ $place->created_at }}</td>
                               <td>{{ $place->updated_at }}</td>
                               <td>                                   
                                    <form action="{{route('places.edit', $place->id )}}">                                                      
                                        <button type="sumbit" class="btn btn-primary">Edit</button>
                                    </form>
                               </td>
                               <td>
                                    <form method="POST" action="{{route('places.destroy', $place->id )}}"> 
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
           <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">Add new place</a>
      
@endsection
