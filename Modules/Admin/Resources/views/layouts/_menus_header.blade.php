<li class="nav-item"><a href="/admin" class="nav-link">系统模块</a></li>
<li class="nav-item"><a href="/article" class="nav-link">文章模块</a></li>
<li class="nav-item dropdown">
    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
       class="nav-link dropdown-toggle">
        扩展插件 <span class="mdi mdi-caret-down"></span>
    </a>
    <div role="menu" class="dropdown-menu">
        @foreach(\HDModule::getModulesLists() as $module  )
        <a href="{{strtolower($module['name'])}}" class="dropdown-item">{{$module['title']}}</a>
            @endforeach
    </div>
</li>