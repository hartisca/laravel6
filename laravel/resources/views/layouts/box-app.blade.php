@extends('layouts.app')

@section('content')
<div class="container" bg>    
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    @yield('box-title')
                </div>
                <div class="card-body">
                    @yield('box-content')
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <div class="card">
                <h1>Comentaris</h1>
            </div>
        </div>
    </div>
</div>
@endsection