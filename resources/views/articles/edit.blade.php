@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3">
            <form action="{{ route('articles.update', ['article' => $article]) }}" class="col-md-5 card p-3" method="post">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @method('PUT')
                @csrf
                <h6 class="text-center">Edit article</h6>
                <div class="form-group">
                    <label for="name">Article Name</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $article->name }}">
                    @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" name="description" id="description"
                        value="{{ $article->description }}">
                </div>
                <button class="btn btn-primary mt-2" type="submit">Update Article</button>
            </form>
        </div>
    </div>
@endsection
