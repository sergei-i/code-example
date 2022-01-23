@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        @foreach($articles as $article)
            @include('app.partials.article_card', ['article' => $article, 'columns' => 6])
        @endforeach
    </div>
@endsection
