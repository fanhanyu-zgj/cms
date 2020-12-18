@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'模板管理'])
        @slot('nav')
            <li class="nav-item"><a href="#" class="nav-link active">模板列表</a> </li>
            <li class="nav-item"><a href="/article/category/create" class="nav-link " >添加模板</a> </li>
        @endslot
        @slot('body')
            <div class="row">
                  @foreach($templates as $template)
                      <div class="card col-sm-3">
                          <div class="card-block">
                              <img src="{{$template['preview']}}"  style="width:100%;height: 180px">
                          </div>
                          @if(\HDModule::config('article.config.template')==$template['name'])
                              <a href="/article/template/set/{{$template['name']}}" class="btn btn-secondary btn-block">默认模板</a>
                          @else
                              <a href="/article/template/set/{{$template['name']}}" class="btn btn-success btn-block">设为默认模板</a>
                          @endif
                      </div>
                      @endforeach
            </div>
        @endslot
    @endcomponent
@endsection


