<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>বিষয় ভিত্তিক পরীক্ষার ফলাফল</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/website/img/logo.png" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/bower_components/Ionicons/css/ionicons.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/skins/_all-skins.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/website/admission-form.css'); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="container">

                    <!-- Main content -->
                    <section class="content">
						<header class="main-header">
							<section class="main-head-content">
								<div class="row">
									<div class="col-sm-3">
										<div class="site-logo">
											<a href=""><img src="<?= base_url() ?>assets/website/img/logo.png"></a>
										</div>
									</div>
									<div class="col-sm-9">
										<div class="site-title">
											<h2 style="font-weight: bold">আদর্শ শিশু বিদ্যালয়, নেত্রকোণা</h2>
											<h2 style="font-weight: bold">বিষয় ভিত্তিক পরীক্ষার ফলাফল  - <?= to_bangla(date("2024")) ?></h2>
										</div>
									</div>
								</div>
							</section>
						</header>
<?php
        $this->db->select('*');
        $this->db->where('id', 1);
        $query = $this->db->get('publish');
        
            foreach ($query->result() as $row){
                $status_publish= $row->status;
                $notice= $row->result_off_notice;
                if($status_publish==1){ ?>
						<!-- Default box -->
						<div class="box box-info">
							<div class="box-header with-border">
								<h3 class="box-title">বিষয় ভিত্তিক পরীক্ষার ফলাফল  - <?= to_bangla(date("2024")) ?></h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
											title="Collapse">
										<i class="fa fa-minus"></i></button>
									<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
										<i class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body">


								<form class="form-horizontal" method="POST" action="<?= site_url('resultsheet') ?>">

									<div class="form-group">
										<label for="class" class="col-sm-3 control-label">শ্রেণী  <span class="text-danger">*</span></label>
										<div class="col-sm-3">
											<select id="class" name="class" class="form-control" onchange="filter_subject(this.value)" required>
												<option value="">Select Class</option>
												<?php foreach ($class as $key) { ?>
													<option <?= set_value('class') == $key->id ? 'selected' : '' ?> value="<?= $key->id ?>">
														<?= $key->class_bn ?>
													</option>
												<?php } ?>
											</select>
											<?= form_error('class', '<div class="text-danger">', '</div>'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="section" class="col-sm-3 control-label">সেকশন  <span class="text-danger">*</span></label>
										<div class="col-sm-3">
											<select id="section" name="section" class="form-control" required>
												<?= select_option(section(), set_value('section')); ?>
											</select>
											<?= form_error('section', '<div class="text-danger">', '</div>'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="class_roll" class="col-sm-3 control-label">রোল নং  <span class="text-danger">*</span></label>
										<div class="col-sm-3">
											<input type="text" name="class_roll" required id="class_roll" class="form-control" placeholder="Roll" value="<?= set_value('class_roll') ?>" onChange="checkInput(this)" onKeyup="checkInput(this)" />
											<?= form_error('class_roll', '<div class="text-danger">', '</div>'); ?>
										</div>
									</div>
									
									<?php foreach (exam() as $key => $value) { ?>
										<div class="form-group">
											<label for="mark" class="col-sm-3 control-label">  <span class="text-danger"></span></label>
											<div class="col-sm-2">
												<label><input type="checkbox" name="exam[<?= $key ?>]" value="1"> <b><?= $value ?></b></label>
											</div>
										</div>
									<?php } ?>
									<div class="form-group">
										<label for="" class="col-sm-3 control-label">  <span class="text-danger"></span></label>
										<div class="col-sm-2">
											<input type="submit" class="btn btn-danger" name="result" value="সাবমিট" />
										</div>
									</div>
								</form>
                <?php
                }if ($status_publish==0) { ?>
                
                <div>
					<div><marquee><h1 style="color:Tomato;"><?= $notice; ?></h1></marquee></div>
					<div><h1 style="color:red; text-align:center; color:red;"><?= $notice; ?></h1></div>
					<div><h1 style="color:red; text-align:center; color:red;">contact@adarsha-sb.com</h1></div>
				</div>
                <?php
                    //$result_off_notice=$row->result_off_notice;
                    //redirect('admin/setting');
                }
            }

?>
							</div>
						</div>

                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="<?= base_url('assets/admin/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url('assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url('assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/admin/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
        <!-- bootstrap datepicker -->
        <script src="<?= base_url('assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/admin/dist/js/adminlte.min.js'); ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url('assets/admin/dist/js/demo.js'); ?>"></script>
		
		<script>
		function checkInput(ob){
		var invalidChars = /[^0-9]/gi
				if(invalidChars.test(ob.value)) {
						ob.value = ob.value.replace(invalidChars,"");
			  }
	};
		</script>
    </body>
</html>
