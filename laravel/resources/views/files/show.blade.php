@extends('layouts.app')
 
@section('content')
<table class="table">
                       <thead>
                           <tr>
                                <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
                           </tr>
                       </thead>
                       <tbody>                           
                                                  
                       </tbody>
                   </table>
@endsection