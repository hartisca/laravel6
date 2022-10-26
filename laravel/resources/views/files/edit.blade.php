@extends('layouts.app')
 
@section('content')
<table class="table">
                       <thead>
                           <tr>
                                <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" />
                           </tr>
                       </thead>
                       <tbody>                          
                                                       
                           <form method="post" action="{{ route('files.update', $file) }}" enctype="multipart/form-data">
                               @method('PUT')
                                @csrf
                        <div class="form-group">
                            <label for="upload">File:</label>
                            <input type="file" class="form-control" name="upload"/>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Create</button>   
                        <button type="reset" class="btn btn-secondary">Reset</button>   
                        </form>
                       </tbody>
                   </table>
                   
@endsection