@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        @foreach($articles as $article)
            <div class="col-4 pb-3">
                <div class="card">
                    <img
                        class="card-img-top"
                        src="{{ $article->image }}"
                        alt="..."
                    >
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $article->title }}
                        </h5>
                        <p class="card-text">
                            {{ $article->content_preview }}
                        </p>
                        <p>
                            {{ $article->created_at_for_humans }}
                        </p>
                        <a
                            class="btn btn-primary"
                            href="{{ route('articles.show', $article->slug)}}"
                        >
                            Подробнее
                        </a>
                        <div class="mt-3">
                            <span class="badge bg-primary">
                                {{ $article->counter->likes }}
                                <i class="far fa-thumbs-up"></i>
                            </span>
                            <span class="badge bg-danger">
                                {{ $article->counter->views }}
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                        <div class="mt-4">
                            Теги:
                            @foreach ($article->tags as $tag)
                                <a
                                    class="badge bg-danger"
                                    href="{{ route('articles.tag', $tag->id) }}"
                                >
                                    {{ $tag->label }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div
        class="mx-auto"
        style="width: max-content;">
        {{ $articles->links() }}
    </div>
@endsection
