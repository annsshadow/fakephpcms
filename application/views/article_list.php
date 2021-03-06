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
                文章列表
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $base_url; ?>bluescms/index.php/article/"><i class="fa fa-dashboard"></i> 文章管理</a></li>
                <li class="active">文章列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header margin margin-bottom-none">
                            <a href="<?php echo $base_url;?>bluescms/index.php/article/article_add/" class="pull-left btn btn-sm btn-default">添加新文章</a>
                            <div class="col-md-5 col-sm-12 form-group margin-bottom-none">
                                <form metnod="get" action="<?php echo $base_url;?>bluescms/index.php/article/article_search_by_menu/">
                                    <h5 class="col-sm-4 text-center">选择搜索栏目:</h5>
                                    <div class="col-sm-8">
                                        <div class="input-group margin-bottom-none">
                                            <select class="form-control" name="menu_id">
                                                <?php foreach ($menu_list as $key => $first): ?>
                                                    <option disabled="disabled"><?php echo $first['menu_name']?></option>
                                                    <?php foreach ($first['menu_second'] as $key2 => $second): ?>
                                                        <option value="<?php echo $second['menu_id'];?>"><?php echo $second['menu_name'];?></option>
                                                    <?php endforeach;?>
                                                <?php endforeach;?>
                                            </select>
                                            <input type = "hidden" name="offset" value='0' />
                                            <span class="input-group-btn">
                                                <button type="submit" name="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-5 col-sm-12 form-group margin-bottom-none">
                                <form method="get" action="<?php echo $base_url;?>bluescms/index.php/article/article_search/">
                                    <h5 class="col-sm-4 text-center">文章标题搜索:</h5>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" name="keyword" class="form-control" placeholder="搜索...">
                                            <input type = "hidden" name="offset" value="0" />
                                            <span class="input-group-btn">
                                            <button type="submit" name="search" id="search-btn" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-body table-responsive table-striped">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>所属栏目</th>
                                    <th>时间</th>
                                    <th>标题</th>
                                    <th>作者</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($result)): ?>
                                <?php foreach ($result as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['menu_first'] . '--' . $value['menu_name'];?></td>
                                    <td><?php echo $value['updatetime'];?></td>
                                    <td>
                                        <a style="width:350px; height:20px; overflow:hidden;display:inline-block;" href = "<?php echo $value['url_view'];?>"><?php echo $value['headline'];?></a>
                                    </td>
                                    <td><?php echo $value['author'];?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a href="<?php echo $value['url_edit'];?>" class="btn btn-default">编辑</a>
                                            <a href="<?php echo $value['url_delete']; ?>" class="btn btn-default list_delete">删除</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                <?php else: ?>
                                    返回无效值
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <?php echo $this->pagination->create_links();?>
                            </ul>
                        </div>
                    </div><!-- /.box -->

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
