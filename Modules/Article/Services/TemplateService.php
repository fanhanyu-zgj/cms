<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2020/12/17
 * Time: 12:25
 */

namespace Modules\Article\Services;


class TemplateService
{
    public function all(){
        $configs=[];
        $dirs=glob(public_path('templates/*'));
        foreach ($dirs as $dir){
            $config=$this->parseConfig($dir);
            $configs[]=$config;
        }
        return $configs;
    }

    public function parseConfig($dir){
        $file=$dir.'/package.json';
        if(is_file($file)){
            $jsonContent=file_get_contents($file);
            $config=json_decode($jsonContent);
            if(is_object($config)){
                $config=(array) $config;
                $name=basename($dir);
                $config['preview']=url('templates/'.$name.'/'.$config['preview']);
                $config['name']=$name;
                return $config;
            }
        }
    }
}