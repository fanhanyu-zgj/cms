<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $roles=Role::where('name','<>',config('hd_module.webmaster'))->get();
        return view('admin::role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        Role::create(['title'=>$request->title,'name'=>$request->name]);
        session()->flash('success','角色添加成功');
        return back();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(RoleRequest $request,Role $role)
    {

        $role->update(['title'=>$request->title,'name'=>$request->name]);
        session()->flash('success','角色编辑成功');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success','角色删除成功');
        return back();
    }

    public function permission(Role $role){
        $modules=\HDModule::getPermissionByGuard('admin');
      //  dd($modules);
        return view('admin::role.permission',compact('role','modules'));
    }

    public function permissionStore(Request $request,Role $role){
        $role->syncPermissions($request->name);
        session()->flash('success','权限设置成功');
        return back();
    }
}
