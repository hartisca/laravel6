@extends('layouts.box-app')

@section('box-title')
    {{ __('Add place') }}
@endsection
 
@section('box-content')

    <form method="post" action="{{ route('places.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">{{ _('Name') }}</label>
            <input type="text" id="name" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label for="description">{{ _('Description') }}</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="upload">{{ _('File') }}</label>
            <input type="file" id="upload" name="upload" class="form-control" />
        </div>
        <div class="form-group">            
                <label for="latitude">{{ _('Latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control"
                    value="41.2310371"/>
        </div>
        <div class="form-group">            
            <label for="longitude">{{ _('Longitude') }}</label>
            <input type="text" id="longitude" name="longitude" class="form-control"
                    value="1.7282036"/>
        </div>
        <div class="cont222">  <div>
          
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
        </div>
        <div class="form-check form-switch">
        
        <label class="form-check-label" for="visibility">Mode privat</label>
        <input class="form-check-input" type="checkbox" id="visibility" value="Private"/>
        </div>
    </form>


        <div class="rating">
  
            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
        </div>
    



@endsection