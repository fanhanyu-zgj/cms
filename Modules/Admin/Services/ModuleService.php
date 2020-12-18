<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2020/12/17
 * Time: 11:07
 */

namespace Modules\Admin\Services;


use Modules\Admin\Entities\Module;

class ModuleService
{
    public function updateCache(): bool
    {
        \DB::table('modules')->truncate();
        $modules=\HDModule::getModulesLists();
        foreach($modules as $module){
            $data=[
                'title'=>$module['title'],
                 'name'=>$module['name'],
             'is_default'=>0,
                 'front_access'=>$this->frontAccess($module)
            ];
            Module::create($data);
        }
        return true;
    }

    public function frontAccess($module){
        $class='Modules\\'.$module['name'].'\\Http\\Controllers\\HomeController';
        return class_exists($class) && method_exists($class,'index');
    }
}