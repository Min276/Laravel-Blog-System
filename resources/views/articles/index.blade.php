@extends("layouts.app")

@section("content")
    <div class="container">

        @if(session("message"))
            <div class="alert alert-warning">
                {{session("message") }}
            </div>
        @endif

        {{ $articles-> links() }}

        @foreach($articles as $article)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">
                        {{$article -> title}}
                    </h2>
                    <small class="text-muted">
                        {{$article -> created_at->diffForHumans()}},
                        Category: <strong>{{ $article->category->name }}</strong>
                    </small>
                    <p>
                        Author: <strong>{{ $article->user->name }}</strong>
                    </p>
                    <p class="card-text">
                        {{ Str::limit($article -> body, 300)}}
                    </p>
                    <a href="{{ url("/articles/detail/$article->id") }}" 
                        class="btn btn-outline-secondary">
                        View Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection