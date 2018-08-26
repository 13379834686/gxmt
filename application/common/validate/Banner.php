<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/26 0026
 * Time: 12:24
 */

namespace app\common\validate;


class Banner extends Validate
{
    protected $rule = [
            'headurl|地址' => 'require',
    ];

    protected $message = [

    ];

    protected $scene =[


    ];
}