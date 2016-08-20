<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>蓝山工作室后台管理系统</title>
<link href="<?php echo $base_url;?>resources/css/mystyle-lanshan.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url;?>resources/js/jquery.js"></script>
<script src="<?php echo $base_url;?>resources/datepicker/WdatePicker.js"></script>
</head>

<body>
<div id="top">
  <div class="logo"><img src="<?php echo $base_url;?>resources/images/logo.fw.png"></div>
  <h1><img src="<?php echo $base_url;?>resources/images/name.png"></h1>
  <p><span><a href="<?php echo $base_url?>bluescms/index.php/user/password_change/">修改密码</a></span><span><a href="<?php echo $base_url;?>bluescms/index.php/user/user_info_show/">用户信息</a></span>
 <span> <a href="<?php echo $base_url;?>bluescms/index.php/login/quit/">退出系统</a></span></p>
</div><!--end of top-->
<div id="menu">
  <div class="menu_name"><span>管理菜单</span></div>
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
	<p>当前位置：文章详情</p>
 </div>
 <div id = "article_content" style="float:right width:81.61%; max-height:620px; overflow:auto;">
 <h2>标题:<?php echo $result['headline'];?></h2>
	<ul style="height:20px;display:block">
	<?php if (is_array($result)): ?>
		<li style="float:left; width:200px; text-align:center">栏目:<?php echo $result['menu_first'];?></li>
		<li style="float:left; width:200px; text-align:center">作者:<?php echo $result['author'];?></li>
		<li style="float:left; width:200px; text-align:center">修改时间:<?php echo $result['updatetime'];?></li>
		<li style="float:left; width:200px; text-align:center">点击量:<?php echo $result['hit_num'];?></li>
  </ul>
		<h3>内容:</h3><?php echo $result['content'];?>
	<?php else: ?>
		<li>内容错误</li>
	<?php endif;?>

</div>
</div><!--end of wrapper-->



<div id="footer">
<p>版权所有：@2015重庆邮电大学蓝山工作室</p>
<p>制作人：AnnsShadoW</p>

</div>
</body>
<script src="<?php echo $base_url;?>resources/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url;?>resources/js/ajax.js"></script>

</html>
