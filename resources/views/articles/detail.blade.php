@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">
                    {{ $article -> title}}
                </h2>
                <small class="text-muted">
                    {{ $article -> created_at->diffForHumans()}},
                    Category: <strong>{{ $article->category->name }}</strong>
                </small>
                <p class="card-text">
                    {{ $article -> body }}
                </p>
                <a href=' {{ url("/articles/delete/$article->id") }}'
                    class="btn btn-danger">
                    Delete
                </a>
            </div>
        </div>
        <ul class="mt-4 list-group">
            <li class="list-group-item active">
               <strong>{{ count( $article->comments )}} Comments</strong>
            </li>
            @foreach($article->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>
        <form action="{{ url("/comments/add") }}" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea name="content" class="form-control mt-2 mb-4"
            placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment" class="btn btn-secondary">
        </form>

    </div>
@endsection