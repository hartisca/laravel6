@extends('layouts.box-app')

@section('box-title')
    {{ __('Places') }}
@endsection

@section('box-content')


<div class="table-responsive ">
  <table class="table table-striped table-hover">
    <tbody>
@foreach ($places as $place)

     
      <div class="card mb-3">
        <div class="cont333">
          <div class="cont444">
            <img class="circular " src="https://www.cerdanyaecoresort.com/wp-content/uploads/paisatge-fira-cavall-cerdanya-ecoresort-pirineus-2-1024x460.jpg" title ="Image preview"/>
 
            <h5 class="card-title"> {{$place->author->name }} </h5>
          </div>
          <div class="rating ">
            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
          </div>
        </div>
        <a class="btn" href="{{ route('places.show', $place) }}" role="button"> 
      @foreach ($files as $file)
        @if ($file->id == $place->file_id)
          <img class="img-fluid" src="{{asset("storage/{$file->filepath}") }}" title ="Image preview"/>
        @endif
      @endforeach
        </a>
        <div class="d-flex mb-3">
        <div class="me-auto p-2"><h5>{{ $place->name }}</h5></div>
        <div class="p-2">


      @if (!Auth::User()->user_id == $place->place_id ) 
         
         
        <form  method="POST" action="{{ route('places.unfav', $place) }}"  >
                @csrf
            <button class="btn me-md-2" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
           <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
          </svg>
            </button>
            </form>
          @else
          <form  method="POST" action="{{ route('places.fav', $place) }}"  >
                @csrf
            <button class="btn me-md-2" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-fill" viewBox="0 0 16 16">
            <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354z"/>
            </svg></button>
            </form>
        @endif
        



        </div>
        <div class="p-2"><button class="btn" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
          <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
          </svg></button>
        </div>
        </div class="block">

          <p class="card-text">{{ $place->description }}.{{$place->visibility}}</p>
          <p class="card-text">{{ $place->latitude }}</p>
          <p class="card-text"><small class="text-muted">{{ $place->created_at }}.{{ $place->updated_at }}</small></p>
        </div>



        
        

@endforeach
    </tbody>
  </table>
</div>
    
@endsection