@extends('admin::layouts.master')
@section('content')
   @component('components.tabs',['title'=>'角色管理'])
       @slot('nav')
           <li class="nav-item"><a href="#" class="nav-link active">角色列表</a> </li>
           <li class="nav-item"><a  class="nav-link " data-toggle="modal" data-target="#addRole">角色添加</a> </li>
           @component('components.modal',['id'=>'addRole','url'=>'/admin/role','title'=>'添加角色'])
               <div class="form-group">
                   <label for="">角色名称</label>
                   <input type="text" name="title" value="{{old('title')}}" class="form-control">
                   <label for="">角色描述</label>
                   <input type="text" name="name" value="{{old('name')}}"  class="form-control">
               </div>
           @endcomponent
           @endslot
       @slot('body')
           <table class="table table-nowrap">
               <thead>
               <tr>
                   <th scope="col">角色编号</th>
                   <th scope="col">角色名称</th>
                   <th scope="col">角色标识</th>
                   <th scope="col">创建时间</th>
                   <th scope="col">操作</th>

               </tr>
               </thead>
               <tbody>
               @foreach($roles as $role)
                   <tr>
                       <td>{{$role->id}}</td>
                       <td>{{$role->title}}</td>
                       <td>{{$role->name}}</td>
                       <td>{{$role->created_at}}</td>
                       <td>
                           <div class="btn-group btn-space">
                               <button type="button" data-toggle="modal" data-target="#editRole{{$role->id}}" class="btn btn-light">编辑</button>
                               {{--<button type="button" class="btn btn-primary">权限</button>--}}
                               <button type="button"  onclick="delRole({{$role['id']}},this)" class="btn btn-danger">删除</button>
                               <form action="/admin/role/{{$role['id']}}" method="post">
                                   @csrf
                                   @method('DELETE')
                               </form>
                               <a class="btn btn-primary" href="/admin/role/permission/{{$role->id}}">权限</a>
                           </div>
                           @component('components.modal',['id'=>"editRole{$role->id}",'url'=>"/admin/role/{$role->id}",'title'=>"编辑{$role->title}",'method'=>'PUT'])
                               <div class="form-group">
                                   <label for="">角色名称</label>
                                   <input type="text" name="title" value="{{$role->title}}" class="form-control">
                                   <label for="">角色描述</label>
                                   <input type="text" name="name" value="{{$role->name}}" class="form-control">
                               </div>
                           @endcomponent
                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
           @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delRole(id,bt){
            if(confirm('确定删除角色吗？')){
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
    @endsection


