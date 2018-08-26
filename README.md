
ThinkPHP5+AdminLTE的后台管理系统

  html代码示例：
  ```
    <form id="dataForm" class="form-horizontal dataForm" action="" method="post" enctype="multipart/form-data">
    <!--这里省略input等表单组件-->
    ...
    </form>
  ```

  js代码：
  ```
    $(".dataForm").submit(function (e) {
    //这里省略相关js代码，可直接参考/public/static/admin/js/app.min.js内代码
    ...
    });
  ```

 ###### 按钮或其他标签ajax
 - 元素class加上`AjaxButton`,其他属性和对应介绍如下：

 1. `data-url`代表要访问的url
 2. `data-type`  值为1代表执行ajax操作(参考多数页面删除按钮)，2代表在当前页面弹出layer窗口(参考操作日志详情效果)，
 3. `data-confirm` 值为1代表弹出询问框，值为2为无需确认，直接执行操作
 4. `data-confirm-title` 为layer confirm标题
 4. `data-confirm-content` 为layer confirm提示内容
 5. `data-id` 为要操作的数据id

 其他参数值都可以直接在`app.min.js`中找到

 html代码示例：
 ```
 <a class="btn btn-danger btn-xs AjaxButton" title="删除" data-id="{$item.id}" data-url="del.html">
     <i class="fa fa-trash"></i>
 </a>
 ```

 js相关代码：
  ```
   $(".AjaxButton").on('click', function(){
       //这里省略相关js，可直接参考/public/static/admin/js/app.min.js内代码
   });

  ```

 ###### ajax执行后跳转相关

 在/application/admin/controller/Base.php中，定义了以下常量:
 ```
     //url跳转常量
     const URL_CURRENT = 'url://current';
     const URL_RELOAD  = 'url://reload';
     const URL_BACK    = 'url://back';
 ```
 current表示停留在当前页面，不做任何操作。

 reload表示重载当前页面。

 back表示返回上一页。
