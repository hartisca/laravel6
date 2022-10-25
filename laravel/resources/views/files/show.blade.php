@extends('layouts.app')
 
@section('content')
<table class="table">
                       <thead>
                           <tr>
                                <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
                           </tr>
                       </thead>
                       <tbody>                           
                           <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    <form method="POST" action="{{route('files.destroy', [$file->id])}}"> 
                                    @csrf
                                    @method('DELETE')               
                                    <button type="sumbit" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                              
                           </tr>                          
                       </tbody>
                   </table>
@endsection