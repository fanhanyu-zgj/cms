@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">模块管理</div>
        <ul role="tablist" class="nav nav-tabs">
            <li class="nav-item"><a href="/admin/module" class="nav-link">模块列表</a></li>
            <li class="nav-item"><a href="#" class="nav-link active">添加模块</a></li>
        </ul>
        <form action="/admin/module" method="post">
            <div class="card-body card-body-contrast">
                @csrf
                <div class="form-group row">
    <label for="title" class="col-12 col-sm-3 col-form-label text-md-right">模块名称</label>
    <div class="col-12 col-md-9">
        <input id="title" name="title" type="text"
               value="{{ $module['title']??old('title') }}"
               class="form-control form-control-sm form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-12 col-sm-3 col-form-label text-md-right">模块标识</label>
    <div class="col-12 col-md-9">
        <input id="name" name="name" type="text"
               value="{{ $module['name']??old('name') }}"
               class="form-control form-control-sm form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary offset-sm-2">保存提交</button>
            </div>
        </form>
    </div>
@endsection
