@extends('layouts.box-app')

@section('box-title')
    {{ __('Place') . " " . $place->id }}
@endsection

@section('box-content')
<h5 class="title">{{ $user->name }}</h5><div class="rating ">


<input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
<input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
<input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
<input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
<input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>

</div>
    <img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" title ="Image preview"/>
    <table class="table">
<tr>
    
    
    <td>{{ substr($place->description,0,10) . "..." }}</td>
    <td>{{ $place->file_id }}</td>
    <td>{{ $place->latitude }}</td>
    <td>{{ $place->longitude }}</td>
    <td>{{ $place->created_at }}</td>
    <td>{{ $place->updated_at }}</td>
    <td>
        <a title="{{ _('View') }}" href="{{ route('places.show', $place) }}">👁️</a>
        <a title="{{ _('Edit') }}" href="{{ route('places.edit', $place) }}">📝</a>
        <a title="{{ _('Delete') }}" href="{{ route('places.show', [$place, 'delete' => 1]) }}">🗑️</a>
    </td>
</tr>
</table>

    <!-- Buttons -->
    <div class="container" style="margin-bottom:20px">
        <a class="btn btn-warning" href="{{ route('places.edit', $place) }}" role="button">📝 {{ _('Edit') }}</a>
        <form id="form" method="POST" action="{{ route('places.destroy', $place) }}" style="display: inline-block;">
            @csrf
            @method("DELETE")
            <button id="destroy" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">🗑️ {{ _('Delete') }}</button>
        </form>
        <a class="btn" href="{{ route('places.index') }}" role="button">⬅️ {{ _('Back to list') }}</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ _('Are you sure?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $place->id }}</p>
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
