@extends('layouts.front')

@section('content')
            <!-- ARTICLE CATEGORIES SECTION -->
            <div class="row">
                <div class="col-md-12">
                    <div class="fb-heading">
                        Article Categories
                    </div>
                    <hr class="style-three">
                    <div class="row">
                        @foreach ($categories as $category)
                        <div class="col-md-6 margin-bottom-20">
                            <div class="fat-heading-abb">
                                <a href="{{ route('search') }}?category_id={{ $category->id }}">
                                    <i class="fa fa-folder"></i> {{ $category->name }}
                                    <span class="cat-count">({{ $category->questions->count() }})</span>
                                </a>
                            </div>
                            <div class="fat-content-small padding-left-30">
                                <ul>
                                    @foreach ($category->questions as $question)
                                    <li>
                                        <a href="{{ route('question', $question) }}">
                                            <i class="fa fa-file-text-o"></i> {{ $question->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
@endsection
