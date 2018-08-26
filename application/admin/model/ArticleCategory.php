<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/26 0026
 * Time: 13:37
 */

namespace app\admin\model;


use traits\model\SoftDelete;

class ArticleCategory extends Admin
{
    use SoftDelete;
    protected $name = 'article_category';

    protected function getLastLoginTimeAttr($value)
    {
        return $value>0?date('Y-m-d H:i:s',$value):'/';
    }


    protected function getRegTimeAttr($value)
    {
        return $value>0?date('Y-m-d H:i:s',$value):'/';
    }
}