<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/26 0026
 * Time: 13:28
 */

namespace app\admin\controller;
use app\admin\model\ArticleCategory as ArticleCategorys;
class ArticleCategory extends Base
{
    protected $article_cate_model;
    public function __construct()
    {
        parent::__construct();
        $this->article_cate_model = new ArticleCategorys();
    }

    /**
     *  显示
     */
    public function index()
    {
        $list = $this->article_cate_model->select();
        return $this->fetch('index',['list'=>$list]);
    }

    /**
     * 新增
     */
    public function add()
    {
        if ($this->request->isPost()){
            $result = $this->article_cate_model->save($_POST);
            if ($result){
                return $this->success();
            }
            return $this->error();
        }
        return $this->fetch();
    }

    public function edit()
    {
        $info = $this->article_cate_model->get($this->id);
        if ($this->request->isPost()){
            if (false !== $info->save($_POST)) {
                return $this->success();
            }
            return $this->error();
        }

        return $this->fetch('add',['info'=> $info]);
    }

    /**
     * 删除
     */
    public function del()
    {
        $id     = $this->id;
        $result = $this->article_cate_model->destroy(function ($query) use ($id) {
            $query->whereIn('id', $id);
        });
        if ($result) {
            return $this->deleteSuccess();
        }
        return $this->error('删除失败');
    }

}