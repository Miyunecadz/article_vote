@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <form action="{{ route('authenticateUser') }}" class="col-md-5 card p-3" method="post">
                @csrf
                <h6 class="text-center">Login User</h6>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                    @error('username')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="d-flex gap-1">
                    <span>Don't have account register </span> <a href="{{ route('register') }}"> here</a>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
