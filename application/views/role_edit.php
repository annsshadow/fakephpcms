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

    <?php include 'header.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑角色
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $base_url; ?>bluescms/index.php/role/"><i class="fa fa-dashboard"></i> 角色管理</a></li>
                <li class="active">编辑角色</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-sm-6">
                    <form method="post" action="<?php echo $base_url;?>bluescms/index.php/role/role_edit_post/" >
                        <input type="hidden" name="role_id" value="<?php echo $role_id;?>"/>
                        <div class="box">
                            <div class="box-body">
                                <div class="margin">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><strong>角色名</strong></span>
                                            <input type="text" name="role_name" class="form-control" value="<?php echo $result['name_info']['role_name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><strong>角色描述</strong></span>
                                            <input type="text" name="role_info" class="form-control" value="<?php echo $result['name_info']['role_info'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><strong>right</strong></span>
                                            <?php foreach ($login_user_right as $key => $first): ?>
                                                <?php foreach ($result['right_id_name'] as $key2 => $second): ?>
                                                    <?php if ((($first['right_id'] - $second['right_id']) == 0) ? 1 : 0): ?>
                                                        <?php $flag = true;?>
                                                        <?php break;?>
                                                    <?php else: ?>
                                                        <?php $flag = false;?>
                                                    <?php endif;?>
                                                <?php endforeach;?>

                                                <?php if ($flag): ?>
                                                    <div class="form-control"><?php echo $first['right_name']?>:<input type="checkbox" name="right[<?php echo $first['right_id'];?>]" value="<?php echo $first['right_id'];?>" checked="checked" /></div>
                                                <?php else: ?>
                                                    <div class="form-control"><?php echo $first['right_name']?>:<input type="checkbox" name="right[<?php echo $first['right_id'];?>]" value="<?php echo $first['right_id'];?>" /></div>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        </div>
                                    </div>
                                    <div class="input-group pull-right">
                                        <input type="submit" name="submit" value="提交" class="btn btn-primary"></input>
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
