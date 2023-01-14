@extends('layouts.box-app')

@section('box-title')
    {{ __('Posts') }}
@endsection

@section('box-content')
<div class="table-responsive ">
  <table class="table table-striped table-hover">
    <tbody>
@foreach ($posts as $post)
       
      <div class="card mb-3">
        <div class="cont333">
          <div class="cont444">
              <h5 class="card-title"> {{$post->author->name }} </h5>
          </div>         
        </div>
        <a class="btn" href="{{ route('posts.show', $post) }}" role="button"> 
        @foreach ($files as $file)
          @if ($file->id == $post->file_id)
            <img class="img-fluid" src="{{asset("storage/{$file->filepath}") }}" title ="Image preview"/>
          @endif
        @endforeach
        </a>
        <div class = "info">
          <p class="card-text">{{ $post->body }}</p>
          <p class="card-text">{{ $post->latitude }}</p>
          <p class="card-text"><small class="text-muted">{{ $post->created_at }}.{{ $post->updated_at }}</small></p>                
        </div>  
      </div>
        
@endforeach
    </tbody>
  </table>
</div>
    
@endsection