<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/26 0026
 * Time: 10:29
 */

namespace app\admin\model;


use traits\model\SoftDelete;

class Banner extends Admin
{
    use SoftDelete;
    protected $name = 'banner';


    protected $autoWriteTimestamp = true;

    public function userLevel()
    {
        return $this->belongsTo('UserLevels', 'level_id', 'id');
    }

    protected function getAdminStatusTextAttr($vaule, $data)
    {
        $text = [
            0 => '隐藏',
            1 => '显示'
        ];
        return $text[$data['status']];
    }

    protected function getLastLoginTimeAttr($value)
    {
        return $value>0?date('Y-m-d H:i:s',$value):'/';
    }


    protected function getRegTimeAttr($value)
    {
        return $value>0?date('Y-m-d H:i:s',$value):'/';
    }


}