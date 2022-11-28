@extends('layouts.app')

@section('content')
<div class="container" bg> 
    
    <div class="row ">
        <div class="col-md-2">    
            <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-High-Quality-Image.png" class="rounded-circle img-thumbnail" alt="Profile image" width="120px">
 
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="bi bi-people-fill"></i> Contactes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-eye-fill"></i> Seguidors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-pin-fill"></i> Preferits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-globe-americas"></i> Xat Global</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-images"></i> Crear</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-search"></i> Filtrar</a>
                </li>
            </ul>
        </div>
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
        
    </div>
</div>
@endsection