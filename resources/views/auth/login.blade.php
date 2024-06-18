@extends('layout')
@section('main')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mt-5 ms-auto me-auto w-25">
        <div class="card-body">
            <div class="card-title text-center border-bottom pb-3">
                Login
            </div>
            <div>
                <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" required class="form-control">
                </div>

                <input type="submit" value="Submit" class="btn btn-primary mt-3">

                </form>
            </div>
        </div>
    </div>    
@endsection