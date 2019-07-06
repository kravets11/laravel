@extends('master)

@section('title', 'Резудьтати поиска категорий')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Category</div>
                    <div class="panel-body">
                        @if($result->count() > 0)
                            @foreach($result as $res)
                                <div class="title">
                                    <a href="{{route('category', $res->slug)}}">{{$res->title}}</a>
                                </div>
                        @else
                            No category
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection