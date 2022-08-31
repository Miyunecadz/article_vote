@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <form action="{{ route('articles.store') }}" class="col-md-5 card p-3" method="post">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @csrf
                <h6 class="text-center">Create article</h6>
                <div class="form-group">
                    <label for="name">Article Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                    @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" name="description" id="description">
                </div>
                <button class="btn btn-primary mt-2" type="submit">Post Article</button>
            </form>
        </div>
    </div>
@endsection
