<?php

namespace Modules\Article\Entities;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'pid'];

    public function getAll($category = null)
    {
        $data = $this->get()->toArray();
        if (!is_null($category)) {
            foreach ($data as $key => $val) {
                $data[$key]['_selected'] = $category['pid'] == $val['id'];
                $data[$key]['_disabled'] = $category['id'] == $val['id'] || (new Arr)->isChild($data, $val['id'], $category['id'], 'id');
            }
        }

        $data = (new Arr)->tree($data, 'name', 'id');
        return $data;
    }

    public function hasChileCategory()
    {
        $data = $this->get()->toArray();
        return (new Arr)->hasChild($data, $this->id);
    }
}
