@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{asset('templates/default/css/index.css')}}">
    <script src="https://cdn.bootcdn.net/ajax/libs/Swiper/6.4.1/swiper-bundle.min.js"></script>
    <link href="https://cdn.bootcdn.net/ajax/libs/Swiper/6.4.1/swiper-bundle.min.css" rel="stylesheet">
    @endsection
@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                热门新闻
            </div>
            <div class="card-block">
                <ul class="list-group">
                    @list(['is_hot'=>1,'limit'=>5])
                    <li class="list-group-item">
                        <a href="{{$field['url']}}">{{$field['title']}}</a></li>
                    @endList
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
@slide()
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header">
                置顶文章
            </div>
            <div class="card-block">
                <ul class="list-group">
                    @list(['is_top'=>1,'limit'=>5])
                    <li class="list-group-item">
                        <a href="{{$field['url']}}">{{$field['title']}}</a></li>
                    @endList
                </ul>
            </div>
        </div>
    </div>
    </div>
</div>

    <div class="container mt-3">
        <div class="row">
            @category
            <div class="col-sm-6 mb-3">
                <div class="card-header">
                    {{$field['name']}}
                </div>
                <div class="card-block">
                    <ul class="list-group">
                        @list(['cid'=>[$field['id']],'limit'=>5])
                    <li class="list-group-item "><a href="{{$field['url']}}">{{$field['title']}}</a></li>
                        @endList
                    </ul>
                </div>
            </div>
            @endCategory
        </div>
    </div>
@include('layouts._footer')
@endsection