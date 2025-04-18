@extends('layout.guest')

@section('content')
   <div class="container mt-5 col-md-4">
        <h1 class="text-center">Login</h1>
        @if (@errors-any())
            <div class="alert alert-danger">
                
            </div>
            
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
        
            <div class='form-group'>
                <label >username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class='form-group'>
                <label >password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class='form-group'>
                <button type="submit" class="btn btn-primary mt-3">Login</button>
                <p class="mt-3 text-center">not have account <a href="{{ route('register') }}"></a>   </p>      

   </div>

@endsection