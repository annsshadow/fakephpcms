<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">蓝山</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">蓝山工作室</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $base_url; ?>bluescms/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $login_info['login_user_name'];?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $base_url; ?>bluescms/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                <?php echo $login_info['login_user_name'];?>
                                <small><?php echo $login_info['login_role_name'];?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer text-center">
                            <div class="btn-group">
                                <a href="<?php echo $base_url?>bluescms/index.php/user/password_change/" class="btn btn-default">修改密码</a>
                                <a href="<?php echo $base_url;?>bluescms/index.php/user/user_info_show" class="btn btn-default">用户信息</a>
                                <a href="<?php echo $base_url;?>bluescms/index.php/login/quit/" class="btn btn-default">退出系统</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                <p><?php echo $login_info['login_user_name'];?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $login_info['login_role_name'];?></a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">管理菜单</li>
            <?php foreach ($admin_menu as $key => $value): ?>
                <?php if ($key): ?>
                    <?php $order = 'Two';?>
                <?php else: ?>
                    <?php $order = 'One'?>
                <?php endif;?>
            <li class="">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span><?php echo $value['menu_name'];?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="sidebar_menu_list">
                    <?php foreach ($value['menu_second'] as $key2 => $value2): ?>
                    <li><a href="<?php echo $base_url . $value2['menu_url'];?>"><i class="fa fa-circle-o"></i> <?php echo $value2['menu_name'];?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>