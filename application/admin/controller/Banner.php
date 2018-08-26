<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/25 0025
 * Time: 21:30
 */

namespace app\admin\controller;

use app\admin\model\Banner as Banners;
use app\common\model\Attachments;

class Banner extends Base
{
    protected $banenr_model;
    public function __construct()
    {
        parent::__construct();
        $this->banenr_model = new Banners();
    }

    /**
     *  显示
     */
    public function index(){
        $list = $this->banenr_model->select();
        return $this->fetch('index',['list'=>$list]);
    }

    /**
     *  新增
     */
    public function add()
    {
        if ($this->request->isPost()){
            $attachment = new Attachments();
            $file       = $attachment->upload('headimg');
            if ($file) {
                $this->param['headimg'] = $file->url;
            }else{
                return $this->error($attachment->getError());
            }
//            $result = Banners::create($this->param);
            $result = $this->banenr_model->save($this->param);
            if ($result){
                $this->success();
            }
           return $this->error();
      }
        return $this->fetch();
    }

    /**
     *  编辑
     */
    public function edit()
    {
//        $info = Banners::get($this->id);
        $info = $this->banenr_model->get($this->id);
        if ($this->request->isPost()){
            $attachment = new Attachments();
            $file       = $attachment->upload('headimg');
            if ($file) {
                $this->param['headimg'] = $file->url;
            }else{
                return $this->error($attachment->getError());
            }
            if (false !== $info->save($this->param)) {
                return $this->success();
            }
            return $this->error();
        }
        return $this->fetch('add',['info'=>$info]);
    }

    /**
     * 删除
     */
    public function del()
    {
        $id     = $this->id;
        $result = $this->banenr_model->destroy(function ($query) use ($id) {
            $query->whereIn('id', $id);
        });
        if ($result) {
            return $this->deleteSuccess();
        }
        return $this->error('删除失败');
    }

    /**
     * @throws 显示/隐藏
     */
    public function disable()
    {
        $user         = $this->banenr_model->get($this->id);
        $user->status = $user->status == 1 ? 0 : 1;
        $result       = $user->save();
        if ($result) {
            return $this->success();
        }
        return $this->error();
    }
}