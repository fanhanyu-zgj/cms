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
                @include('layouts._message')
                <div class="card">
                <div class="card-header">
                    {{$content['title']}}
                </div>
                <div class="card-body">
                    {!! $content['content'] !!}
                </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                评论列表
                            </div>
                            <div class="card-block">
                                <ul class="list-group">
                                    @foreach($content->comment as $comment)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-9">
                                               {{ $comment['content']}}
                                            </div>
                                            <div class="col-sm-3">
                                                <small class="text-secondary">{{$comment->user->name}}</small>
                                                <small class="text-secondary"> / {{$comment->updated_at->diffForhumans()}}</small>
                                            </div>
                                        </div>

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer text-muted">
                            @guest()
                                <div class="text-center">
                                    <a href="/login">登录后发表评论</a>
                                </div>
                                @else
                                <form action="/article/comment" class="form-group" method="post">
                                    @csrf
                                    <input type="text" hidden name="content_id" value="{{$content['id']}}">
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" rows="5" placeholder="输入你的想法"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-secondary">发表评论</button>
                                    </div>
                                </form>
                                @endguest 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-header">
                    热门文章
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