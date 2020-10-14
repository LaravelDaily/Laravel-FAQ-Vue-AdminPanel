@extends('layouts.front')

@section('content')
            <div class="row">
                <!-- ARTICLE  -->
                <div class="panel panel-default">
                    <div class="article-heading margin-bottom-5">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i> {{ $question->title }}</a>
                    </div>
                    <div class="article-content">
                        <p>
                            {{ $question->answer }}
                        </p>
                    </div>
                </div>
                <!-- END ARTICLE -->
            </div>
@endsection
