@extends('layouts.app')
@include('layouts.navbar')
@section('content')
    <div class="container">
        <div class="d-flex w-100 mt-3">
            <a href="{{ route('articles.create') }}" class="ms-auto btn btn-primary">Create Article</a>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">

            @foreach ($articles as $article)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex">
                                <h5 class="card-title">{{ $article->name }}</h5>
                                <div class="d-flex ms-auto gap-2">
                                    <a href="" class="btn btn-outline-primary">-</a>
                                    <span class="">{{ $article->vote }}</span>
                                    <a href="{{ route('articles.upvote', ['article' => $article]) }}"
                                        class="btn btn-outline-primary">+</a>
                                </div>
                            </div>
                            <p class="card-text">{{ $article->description }}</p>
                        </div>
                        <div class="card-footer d-flex">
                            <small class="text-muted">Owner: {{ $article->user->name }}</small>
                            @if (auth()->user()->id == $article->user->id)
                                <div class="ms-auto d-flex gap-2">
                                    <a href="{{ route('articles.edit', ['article' => $article]) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <a href="" class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
