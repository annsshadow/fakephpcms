<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>蓝山工作室</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/dist/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/plugins/datetimepicker/bootstrap-datetimepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>bluescms/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo $base_url; ?>bluescms/dist/js/html5shiv.min.js"></script>
    <script src="<?php echo $base_url; ?>bluescms/dist/js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo $base_url; ?>bluescms/#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">蓝山</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">蓝山工作室</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="<?php echo $base_url; ?>bluescms/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="<?php echo $base_url; ?>bluescms/#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $base_url; ?>bluescms/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">annsshadow</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $base_url; ?>bluescms/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>
                                    annsshadow
                                    <small>超级管理员</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer text-center">
                                <div class="btn-group">
                                    <a href="<?php echo $base_url; ?>bluescms/user_password.html" class="btn btn-default">修改密码</a>
                                    <a href="<?php echo $base_url; ?>bluescms/#" class="btn btn-default">用户信息</a>
                                    <a href="<?php echo $base_url; ?>bluescms/#" class="btn btn-default">退出系统</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="<?php echo $base_url; ?>bluescms/#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $base_url; ?>bluescms/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>annsshadow	</p>
                    <a href="<?php echo $base_url; ?>bluescms/#"><i class="fa fa-circle text-success"></i> 超级管理员</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">管理菜单</li>
                <li>
                    <a href="<?php echo $base_url; ?>bluescms/#">
                        <i class="fa fa-th"></i>
                        <span>权限管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar_menu_list">
                        <li><a href="<?php echo $base_url; ?>bluescms/user_list.html"><i class="fa fa-circle-o"></i> 管理员管理</a></li>
                        <li><a href="<?php echo $base_url; ?>bluescms/role_list.html"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="<?php echo $base_url; ?>bluescms/#">
                        <i class="fa fa-pie-chart"></i>
                        <span>内容管理</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar_menu_list">
                        <li><a href="<?php echo $base_url; ?>bluescms/article_list.html"><i class="fa fa-circle-o"></i> 文章管理</a></li>
                        <li><a href="<?php echo $base_url; ?>bluescms/download_list.html"><i class="fa fa-circle-o"></i> 下载管理</a></li>
                        <li><a href="<?php echo $base_url; ?>bluescms/friendlink_list.html"><i class="fa fa-circle-o"></i> 友情链接</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>bluescms/menu_list.html"><i class="fa fa-circle-o"></i> 导航栏目</a></li>
                        <li><a href="<?php echo $base_url; ?>bluescms/log_list.html"><i class="fa fa-circle-o"></i> 系统日志</a></li>
                        <li><a href="<?php echo $base_url; ?>bluescms/tag_list.html"><i class="fa fa-circle-o"></i> 标签管理</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                添加友情链接
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $base_url; ?>bluescms/#"><i class="fa fa-dashboard"></i> 友情链接管理</a></li>
                <li class="active">添加友情链接</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-sm-6">
                    <form method="post" action="<?php echo $base_url;?>bluescms/index.php/friendlink/friendlink_add_post/">
                        <div class="box">
                            <div class="box-body">
                                <div class="margin">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><strong>友情链接名</strong></span>
                                            <input type="text" class="form-control" name="headline" placeholder="友情链接名">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><strong>链接地址</strong></span>
                                            <input type="text" class="form-control" name="url" placeholder="url地址(请以http://开头)">
                                        </div>
                                    </div>
                                    <div class="input-group pull-right">
                                        <input  name="submit" type="submit" value="提交" class="btn btn-primary">
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">AdminLTE</div>
        <strong>Copyright &copy; 2008-2016</strong> 重庆邮电大学 - 蓝山工作室
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab"></div>
            <!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo $base_url; ?>bluescms/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo $base_url; ?>bluescms/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo $base_url; ?>bluescms/plugins/select2/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo $base_url; ?>bluescms/plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $base_url; ?>bluescms/plugins/datetimepicker/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<!-- SlimScroll -->
<script src="<?php echo $base_url; ?>bluescms/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $base_url; ?>bluescms/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>bluescms/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url; ?>bluescms/dist/js/demo.js"></script>
</body>
</html>
