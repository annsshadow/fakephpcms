<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BluesCMS Backstage</title>
<link href="<?php echo $base_url;?>resources/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url;?>resources/css/mystyle.css" rel="stylesheet" type="text/css" />
</head>
<body style="overflow:hidden">
<div class="container bg">
  <div class="header">
  <img src="<?php echo $base_url;?>/resources/images/logo.png" class="logo" />
  </div><!--end header-->
  <div class="content">
 <form class="form-horizontal" role="form">
  <div class="error" id="error"></div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" class="form-control shuru" id="inputEmail3" placeholder="用户名">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="password" class="form-control shuru" id="inputPassword3" placeholder="密码">
    </div>
  </div>
  <p class="button">
   <a href="#" class="href"></a><button type="button" class="btn btn-primary btn-lg sub" id="check_login">登录</button>
  </p>
  <p class="hr"></p>
  <p class="about-us">Management Platform @ 2015 Blues Team:AnnsShadoW, CQUPT </p>
</form>

</div><!--end content-->

</div>

<script type="text/javascript" src="<?php echo $base_url;?>resources/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>resources/js/ajax.js"></script>
</body>
</html>
