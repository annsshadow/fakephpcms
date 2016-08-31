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
                编辑文章
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $base_url; ?>bluescms/index.php/user/user_info_show"><i class="fa fa-dashboard"></i> 个人主页管理</a></li>
                <li class="active">编辑文章</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <form method="post" id="form1" action="<?php echo $base_url;?>bluescms/index.php/user_article/user_article_edit_post/">
                        <input type="hidden" name="user_article_id" value="<?php echo $result['user_article_id']?>"/>
                        <div class="box">
                            <div class="box-header margin margin-bottom-none">
                                <div class="col-md-12 form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><strong>文章标题</strong></span>
                                        <input type="text" name="headline" class="form-control" value="<?php echo $result['headline'];?>">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6 form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><strong>栏目</strong></span>
                                        <select class="form-control" name="menu_id">
                                            <option value="<?php echo $result['user_menu_id'];?>" selected="selected"><?php echo $result['menu_first'];?></option>
                                            <?php foreach ($menu as $key => $first): ?>
                                                <option value="<?php echo $first['user_menu_id'];?>"><?php echo $first['menu_name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">作者</span>
                                        <input type="text" name="author" class="form-control" value="<?php echo $result['author'];?>">
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-6 form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">排序</span>
                                        <input type="text" class="form-control" name="order" value="<?php echo $result['ordernum']?>">
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-6 form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">时间</span>
                                        <input type="text" name="time" class="form-control" value="<?php echo $result['updatetime'];?>" id="reservation" >
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div id ="ueditor">
                                        <!-- 加载编辑器的容器 -->
                                        <!--                                        todo:修改图片地址-->
                                        <script id="container" name="content" type="text/plain">
				                            <?php echo str_replace('jzjc', 'liu/jsj', $result['content']);?>
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
                                    <div class="input-group margin pull-right">
                                        <input type="submit" name ="submit" value="提交" id="submitBtn" class="btn btn-primary">
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
