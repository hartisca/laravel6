@extends('layouts.box-app')

@section('box-title')
    {{ __('Places') }}
@endsection

@section('box-content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            
            <tbody>
                @foreach ($places as $place)
                <a class="btn" href="{{ route('places.show', $place) }}" role="button">  

<div class="cont333">
    <div class="card mb-3">        
        <h5 class="card-title"> $user->name}}</h5>    
    </div>
    <div class="rating ">

        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>

    </div>
</div>


<img class="img-fluid" src="https://www.cerdanyaecoresort.com/wp-content/uploads/paisatge-fira-cavall-cerdanya-ecoresort-pirineus-2-1024x460.jpg" title ="Image preview"/>

<div class="d-flex mb-3">
  <div class="me-auto p-2"><h5>{{ $place->name }}</h5></div>
  <div class="p-2"><button class="btn me-md-2" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-fill" viewBox="0 0 16 16">
    <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354z"/>
    </svg>
    </button></div>
  <div class="p-2"><button class="btn" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
    </svg>
    </button></div>


</div>


    
    <p class="card-text">{{ $place->description }}</p>
    <p class="card-text">{{ $place->latitude }}.{{ $place->longitude }}</p>
    <p class="card-text"><small class="text-muted">{{ $place->created_at }}.{{ $place->updated_at }}</small></p>
  </div>
  </a>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection