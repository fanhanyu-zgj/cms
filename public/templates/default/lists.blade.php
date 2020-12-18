@extends('layouts.app')
@section('heads')
    <link rel="stylesheet" href="{{asset('templates/default/css/index.css')}}">
    <script src="https://cdn.bootcdn.net/ajax/libs/Swiper/6.4.1/swiper-bundle.min.js"></script>
    <link href="https://cdn.bootcdn.net/ajax/libs/Swiper/6.4.1/swiper-bundle.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        {{$category['name']}}
                    </div>
                    <div class="card-block">
                        @foreach($data as $field)
                        <ul class="list-group">

                            <li class="list-group-item">
                                <a href="/article/content/{{$field['id']}}.html">{{$field['title']}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                {{$data->links()}}
            </div>
            <div class="col-sm-3">
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
    @include('layouts._footer')
@endsection