<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>蓝山工作室后台管理系统</title>
  <link href="<?php echo $base_url;?>resources/css/mystyle-lanshan.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $base_url;?>resources/css/bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $base_url;?>resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $base_url;?>resources/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo $base_url;?>resources/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo $base_url;?>resources/js/jquery.js">
</script>
  <script src="<?php echo $base_url;?>resources/datepicker/WdatePicker.js">
</script>
<script src="<?php echo $base_url;?>resources/laydate/laydate.js"></script>
<style type="text/css">
#ueditor{
  position: relative;
  left: 20%;
}
#container{
  position: absolute;
  top: 0;
  left: -10px;
}
#submitBtn{
  position: relative;
  top: 430px;
}
</style>
</head>

<body>
  <div id="top">
    <div class="logo"><img src="<?php echo $base_url;?>resources/images/logo.fw.png" /></div>

    <h1><img src="<?php echo $base_url;?>resources/images/name.png" /></h1>

    <p><span><a href="<?php echo $base_url?>bluescms/index.php/user/password_change/">修改密码</a></span><span><a href="<?php echo $base_url;?>bluescms/index.php/user/user_info_show/">用户信息</a></span> <span><a href=
    "<?php echo $base_url;?>bluescms/index.php/login/quit">退出系统</a></span></p>
  </div><!--end of top-->

  <div id="menu">
    <div class="menu_name">
      <span>管理菜单</span>
    </div>

    <div class="menu_user">
		<a href="<?php echo $base_url;?>bluescms/index.php/home/">系统首页</a>
      当前登录用户：<?php echo $login_info['login_user_name'];?> 用户角色：<?php echo $login_info['login_role_name'];?>
    </div>
  </div><!--end of top-->

  <div id="wrapper">
    <div id="nav">
      <div class="accordion" id="accordion2">
        <?php foreach ($admin_menu as $key => $value): ?>
          <?php if ($key): ?>
            <?php $order = 'Two';?>
          <?php else: ?>
            <?php $order = 'One'?>
          <?php endif;?>
        <div class="accordion-group">
          <div class="accordion-heading nav_list">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="<?php echo '#collapse' . $order;?>"><?php echo $value['menu_name'];?></a>
          </div>

          <div id="<?php echo 'collapse' . $order?>" class="accordion-body collapse">
            <div class="accordion-inner">
              <ul class="subnav_list">
                <?php foreach ($value['menu_second'] as $key2 => $value2): ?>
                <li>
                  <a href="<?php echo $base_url . $value2['menu_url'];?>">
                    <?php echo $value2['menu_name'];?></a>
                </li>
                <?php endforeach;?></ul>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        </div>
    </div><!---end of nav-->
	 <div>
		<p>当前位置：编辑文章</p>
	</div>
    <div>
		<form method="post" id="form1" action="<?php echo $base_url;?>bluescms/index.php/article/article_edit_post/">
			<input type="hidden" name="article_id" value="<?php echo $result['article_id']?>"/>

			标题:<input type="text"name="headline" value="<?php echo $result['headline']?>"/>
			<br />
			作者:<input type="text" name="author" value="<?php echo $result['author']?>"/>
			<br />
			栏目:
				<select name="menu_id">
					<option value="<?php echo $result['menu_id'];?>" selected="selected"><?php echo $result['menu_name'];?></option>
					<?php foreach ($menu as $key => $first): ?>
						<option disabled="disabled"><?php echo $first['menu_name']?></option>
						<?php foreach ($first['menu_second'] as $key2 => $second): ?>
							<option value="<?php echo $second['menu_id'];?>"><?php echo $second['menu_name'];?></option>
						<?php endforeach;?>
					<?php endforeach;?>
				</select>
			<br />
      标签：<select name="tag_id">
          <?php if ($result['tag_id'] == 0): ?>
            <option value="<?php echo $result['tag_id'];?>" selected="selected"><?php echo $result['tag_name'];?></option>
          <?php endif;?>
          <?php foreach ($tag_id as $key => $value): ?>
            <?php if ($value['tag_id'] == $result['tag_id']): ?>
            <option value="<?php echo $value['tag_id'];?>" selected="selected"><?php echo $value['tag_name'];?></option>
            <?php else: ?>
            <option value="<?php echo $value['tag_id'];?>"><?php echo $value['tag_name'];?></option>
            <?php endif;?>
            <?php endforeach;?>
        </select>
      <br />
			排序(默认是0，可不修改):<input type="text" name="order" value="<?php echo $result['ordernum']?>"/>
			<br />
      首页置顶(置顶请修改为1,审核后才能置顶):<input type="text" name="top" value="0"/>
      <br />
      添加时间:<input type="text" name="time" value="<?php echo $result['updatetime'];?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"/>
			<br />
			文章内容:
		<div id ="ueditor">
        <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain">
				<?php echo $result['content'];?>
        </script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="<?php echo $base_url;?>bluescms/ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="<?php echo $base_url;?>bluescms/ueditor/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
          var ue = UE.getEditor('container');
        </script>
      </div>
			<input type="submit" name ="submit" value="提交" id="submitBtn"/>
		</form>
	</div>
  </div><!--end of wrapper-->

  <div id="footer">
    <p>版权所有：@2015重庆邮电大学蓝山工作室</p>

    <p>制作人：AnnsShadoW</p>
  </div><script src="<?php echo $base_url;?>resources/js/bootstrap.min.js">
</script> <script src="<?php echo $base_url;?>resources/js/ajax.js">
</script>
</body>
</html>
