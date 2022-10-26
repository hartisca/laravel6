@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Files') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Filepath</td>
                               <td scope="col">Filesize</td>
                               <td scope="col">Created</td>
                               <td scope="col">Updated</td>
                               <td scope="col" colspan = 2>Actions</td>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($files as $file)
                           <tr>
                               <td><a href="{{ route('files.show',$file) }}">{{ $file->id }}</a></td>                               
                               <td>{{ $file->filepath }}</td>
                               <td>{{ $file->filesize }}</td>
                               <td>{{ $file->created_at }}</td>
                               <td>{{ $file->updated_at }}</td>
                               <td>
                                    <a href="{{ route('files.edit', $file->id) }}"> Editar </a> <!-- Cambiar boton -->
                                    
                               </td>

                               <td>
                                    <form method="POST" action="{{route('files.destroy', $file->id )}}"> 
                                        @csrf
                                        @method('DELETE')               
                                        <button type="sumbit" class="btn btn-primary">Delete</button>
                                    </form>
                               </td>
                                

                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">Add new file</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
