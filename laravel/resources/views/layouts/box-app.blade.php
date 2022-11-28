@extends('layouts.app')

@section('content')
<<<<<<< HEAD
  
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
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

=======
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
>>>>>>> a7559ad133f0c194bd8d530cd590d04f6d56d6ea
@endsection