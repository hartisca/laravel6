@extends('layouts.box-app')

@section('box-title')

{{ __('Post') }}

@endsection

@section('box-content')
<div class="card mb-3">
        <div class="cont333">
        <div class="cont444">
            <img class="circular " src="https://www.cerdanyaecoresort.com/wp-content/uploads/paisatge-fira-cavall-cerdanya-ecoresort-pirineus-2-1024x460.jpg" title ="Image preview"/>
 
            <h5 class=" fontGuay card-title">{{$post->author->name }}</h5>
          </div>
          
        </div>
        <img class="img-fluid" src="{{asset("storage/{$file->filepath}") }}" title ="Image preview"/>
        <div class="d-flex mb-3">
        <div class=" fontTitol me-auto p-2"></div>
        <div class="p-2">

          @if($like == 1)         
          <div class ="botonsdreta">
              <form method="POST" action="{{ route('posts.unlike', $post) }}" enctype="multipart/form-data">
                  @csrf
                  @method("DELETE")
                  <button class="btn me-md-2" type="submit">{{ $numlikes }} <i class="bi bi-heartbreak-fill"></i></button>
              </form>
          </div>           
          @else        
          <div class ="botonsdreta">
              <form method="POST" action="{{ route('posts.like', $post) }}" enctype="multipart/form-data">
                  @csrf
                  <button class="btn me-md-2" type="submit">{{ $numlikes }} <i class="bi bi-heart-fill"></i></button>
              </form>
          </div> 
          @endif

        </div>
        <div class="p-2">
        </div>
        </div>
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
          <p class="card-text bg-1" >{{ $post->body }} </p>
        </div>
        <div class="cont333">
          <p class="card-text">Lat: {{ $post->latitude }} Long: {{ $post->longitude }}</p>
          <p class="card-text"><small class="text-muted">{{ $post->created_at }}.{{ $post->updated_at }}</small></p>
        </div>

           <!-- Buttons -->

    <!--si no ets el creador no has de veure editar ni detele-->

    <div class="container" style="margin-bottom:20px">

@if ($post->author_id == auth()->user()->id) 
        <a class="btn btn-warning" href="{{ route('posts.edit', $post) }}" role="button">📝 {{ _('Edit') }}</a>
        <form id="form" method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
            @csrf
            @method("DELETE")
            <button id="destroy" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">🗑️ {{ _('Delete') }}</button>
        </form>
@endif

        <a class="btn" href="{{ route('places.index') }}" role="button">⬅️ {{ _('Back to list') }}</a>
    </div>

    
    <div class="col-md-12 col-lg-12">
    <div class="card shadow-0 border" style="background-color: #f0f2f5;">
      <div class="card-body p-4">
        <div class="form-outline mb-4">
          <input type="text" id="addANote" class="form-control" placeholder="+ Add a comment..." />          
        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  Click here to see the comments!
                </button>
              </h2>
              <div id="flush-collapseOne" class="card mb-3 accordion-collapse collapse">
                <div class="card-body">
                <p>Hello i am not a bot!</p>

                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img class="circular" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                        height="25" />
                      <p class="small mb-0 ms-2">Martha</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                      <p class="small text-muted mb-0">{{ $post->updated_at }}</p>                
                      <i class="bi bi-heart-fill"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div id="flush-collapseOne" class="card mb-3 accordion-collapse collapse">
                <div class="card-body">
                <p>Hello i am not a bot!</p>

                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img class="circular" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                        height="25" />
                      <p class="small mb-0 ms-2">Johny</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                      <p class="small text-muted mb-0">{{ $post->updated_at }}</p>                
                      <i class="bi bi-heart-fill"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div id="flush-collapseOne" class="card mb-3 accordion-collapse collapse">
                <div class="card-body">
                <p>Hello i am not a bot!</p>

                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img class="circular" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="avatar" width="25"
                        height="25" />
                      <p class="small mb-0 ms-2">Mary Kate</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                      <p class="small text-muted mb-0">{{ $post->updated_at }}</p>
                      <i class="bi bi-heart-fill"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div id="flush-collapseOne" class="card mb-3 accordion-collapse collapse">
                <div class="card-body">
                  <p>Hello i am not a bot!</p>

                  <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                      <img  class="circular" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="25"
                        height="25" />
                      <p class="small mb-0 ms-2">Johny</p>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                      <p class="small text-muted mb-0">{{ $post->updated_at }}</p>
                      <i class="bi bi-heart-fill"></i>          
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ _('Are you sure?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $post->id }}</p>
                    <p>{{ _('This action cannot be undone!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="confirm" type="button" class="btn btn-primary">{{ _('Confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/delete-modal.js')

@endsection


