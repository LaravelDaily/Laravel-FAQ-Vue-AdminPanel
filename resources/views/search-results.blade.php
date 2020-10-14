@extends('layouts.front')

@section('content')
    <!-- ARTICLES -->
    <div class="fb-heading">
        <i class="fa fa-folder"></i> {{ $pageTitle }}
        <span class="cat-count">({{ $questions->count() }})</span>
    </div>
    <hr class="style-three">
    <div class="panel panel-default">
        @foreach ($questions as $question)
        <div class="article-heading-abb">
            <a href="{{ route('question', $question) }}">
                <i class="fa fa-pencil-square-o"></i> {{ $question->title }}</a>
        </div>
        <div class="article-content">
            <p class="block-with-text">
                {{ substr($question->answer, 0, 50) }}...
            </p>
        </div>
        <div class="article-read-more">
            <a href="{{ route('question', $question) }}" class="btn btn-default btn-wide">Read more...</a>
        </div>
        @endforeach
    </div>
    <!-- END ARTICLES -->
@endsection
