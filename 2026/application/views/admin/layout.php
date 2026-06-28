<?php
$userphoto = '';
if ($this->session->userdata('photo') != '') {
    $userphoto = base_url(). $this->session->userdata('photo');
} else {
    $userphoto = base_url() . 'assets/school/img/user.png';
}
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->config->item('institute_name') ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/website/img/logo.png" />
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/school/css/loaders.css" media="all" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/school/css/admin.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <!-- jQuery 3 -->
        <script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <!-- DataTables -->
        <script src="<?= base_url() ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

        <!-- SlimScroll -->
        <script src="<?= base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>
        <script src="<?= base_url() ?>assets/school/js/admin.2.js"></script>
        <script>
			var base_url="<?= base_url() ?>";
            var site_url="<?= site_url() ?>";
			
            $(document).ready(function () {
                $('.sidebar-menu').tree();
            });
                        
        </script>


    </head>
    <body class="hold-transition skin-red sidebar-mini" oncontextmenu="return false;">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?= base_url() ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <h3 style="display: inline-block;margin-top: 10px;"><a href="" style="color: white;"><?= $this->config->item('institute_name')." - ".to_bangla(date("2026")) ?></a></h3>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= $userphoto ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= $this->session->userdata('name') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= $userphoto ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?= $this->session->userdata('name') ?>
                                            <small><?= $this->session->userdata('logintime') ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="<?= site_url() ?>admin/logout" class="btn btn-default btn-flat">লগ আউট</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= $userphoto ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= $this->session->userdata('name') ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!--
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php
                    $treeview = isset($treeview) ? $treeview : '';
                    $treeview_menu = isset($treeview_menu) ? $treeview_menu : '';
                    ?>
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class=" <?= $treeview == 'dashboard' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview <?= $treeview == 'student' ? 'active' : '' ?>">
                            <a href="#">
                                <i class="fa fa-users"></i> <span>Students</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?= $treeview_menu == 'add_student' ? 'active' : '' ?>"><a href="<?= site_url(); ?>admin/addstudent"><i class="fa fa-plus"></i> Add Student</a></li>
                                <li class="<?= $treeview_menu == 'all_students' ? 'active' : '' ?>"><a href="<?= site_url(); ?>admin/allstudents"><i class="fa fa-list"></i> All Students</a></li>
                            </ul>
                        </li>
                        <li class=" <?= $treeview == 'markupload' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/markupload">
                                <i class="fa fa-upload"></i> <span>Mark Upload</span>
                            </a>
                        </li>
                        <li class=" <?= $treeview == 'makeresult' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/makeresult">
                                <i class="fa fa-list"></i> <span>Make Result</span>
                            </a>
                        </li>
                        <li class=" <?= $treeview == 'marksheet' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/marksheet">
                                <i class="fa fa-list"></i> <span>Marksheet</span>
                            </a>
                        </li>
                        <li class=" <?= $treeview == 'meritlist' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/meritlist">
                                <i class="fa fa-list"></i> <span>Merit List</span>
                            </a>
                        </li>
                        <li class=" <?= $treeview == 'admitcard' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/admitcard">
                                <i class="fa fa-list"></i> <span>Admit Card</span>
                            </a>
                        </li>
                        <li class=" <?= $treeview == 'applicant' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/applicantstudents">
                                <i class="fa fa-users"></i> <span>Applicant Students</span>
                            </a>
                        </li>
                        <!--
                        <li>
                            <a onclick="return confirm('মুছে ফেলতে চান?')" href="<?= site_url() ?>admin/emptymark">
                                <i class="fa fa-trash-o"></i> <span>Empty Mark</span>
                            </a>
                        </li>
                        -->
                        <li class=" <?= $treeview == 'setting' ? 'active' : '' ?>" >
                            <a href="<?= site_url() ?>admin/setting">
                                <i class="fa fa-cogs"></i> <span>Setting</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= isset($title) ? $title : '' ?>
                        <small><?= isset($sub_title) ? $sub_title : '' ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= site_url() ?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
                        <?php
                        if (isset($breadcrumb) && is_array($breadcrumb)) {
                            $breadcrumb_total = count($breadcrumb);
                            $breadcrumb_sl = 1;
                            foreach ($breadcrumb as $breadcrumb_name => $breadcrumb_url) {
                                if ($breadcrumb_sl == $breadcrumb_total) {
                                    echo '<li class="active">' . ucwords($breadcrumb_name) . '</li>';
                                } else {
                                    echo '<li><a href="' . site_url() . $breadcrumb_url . '"> ' . ucwords($breadcrumb_name) . '</a></li>';
                                }
                                $breadcrumb_sl++;
                            }
                        }
                        ?>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <?php $this->load->view($page) ?>

                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>&copy;  <?= to_bangla(date("2026")) ?> রেজাল্ট ম্যানেজমেন্ট সফটওয়্যার। </strong> <!-- Developed by <a href="http://smart-softit.com" data-widget="remove" data-toggle="tooltip" title="Smart Soft IT || 01756-965235">Smart Soft IT</a>.</strong> -->
            </footer>
        </div>
		
    </body>
</html>
