<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ভর্তি আবেদন ফরম</title>
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
											<h2 style="font-weight: bold">আদর্শ শিশু বিদ্যালয় নেত্রকোণা</h2>
											<h2 style="font-weight: bold">ভর্তির আবেদন ফরম</h2>
										</div>
									</div>
								</div>
							</section>
						</header>
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">ভর্তি আবেদন ফরম</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="box-body">
								<?= $this->session->flashdata('insertMesg'); ?>
								<?= $this->session->flashdata('errorMesg'); ?>
                                    <div class="form-group">
                                        <label for="name_bn" class="col-sm-3 control-label">আবেদনকারীর নাম (বাংলায়)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name_bn" name="name_bn" placeholder="আবেদনকারীর নাম" value="<?= set_value('name_bn'); ?>" required>
											<?= form_error('name_bn', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name_en" class="col-sm-3 control-label">IN ENGLISH</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Name of Applicant" value="<?= set_value('name_en'); ?>" required style="text-transform: uppercase" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
											<?= form_error('name_en', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="father_bn" class="col-sm-3 control-label">পিতার নাম  (বাংলায়)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="father_bn" name="father_bn" placeholder="পিতার নাম" value="<?= set_value('father_bn'); ?>" required>
											<?= form_error('father_bn', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="father_en" class="col-sm-3 control-label">IN ENGLISH</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="father_en" name="father_en" placeholder="Father Name" value="<?= set_value('father_en'); ?>" required style="text-transform: uppercase" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
											<?= form_error('father_en', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_bn" class="col-sm-3 control-label">মাতার নাম (বাংলায়)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mother_bn" name="mother_bn" placeholder="মাতার নাম" value="<?= set_value('mother_bn'); ?>" required>
											<?= form_error('mother_bn', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_en" class="col-sm-3 control-label">IN ENGLISH</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="mother_en" name="mother_en" placeholder="Mother Name" value="<?= set_value('mother_en'); ?>" required style="text-transform: uppercase" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
											<?= form_error('mother_en', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">স্থায়ী ঠিকানা</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="permanent_village" class="col-sm-3 control-label">গ্রাম/মহল্লা</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="permanent_village" name="permanent_village" placeholder="গ্রাম/মহল্লা" value="<?= set_value('permanent_village'); ?>" required>
											<?= form_error('permanent_village', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <label for="permanent_post" class="col-sm-2 control-label">ডাকঘর</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="permanent_post" name="permanent_post" placeholder="ডাকঘর" value="<?= set_value('permanent_post'); ?>" required>
											<?= form_error('permanent_post', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="permanent_upazila" class="col-sm-3 control-label">উপজেলা</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="permanent_upazila" name="permanent_upazila" placeholder="উপজেলা" value="<?= set_value('permanent_upazila'); ?>" required>
											<?= form_error('permanent_upazila', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <label for="permanent_zila" class="col-sm-2 control-label">জেলা</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="permanent_zila" name="permanent_zila" placeholder="জেলা" value="<?= set_value('permanent_zila'); ?>" required>
											<?= form_error('permanent_zila', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">বর্তমান ঠিকানা</label>	
										<div class="col-sm-3" style="padding-left: 38px">
											<div class="checkbox">
												<input type="checkbox" id="filladdress" onclick="fillAddress()"/> 
												<label for="filladdress" style="padding: 0">ঐ</label>
											</div>
										</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="present_village" class="col-sm-3 control-label">গ্রাম/মহল্লা</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="present_village" name="present_village" placeholder="গ্রাম/মহল্লা" value="<?= set_value('present_village'); ?>" required>
											<?= form_error('present_village', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <label for="present_post" class="col-sm-2 control-label">ডাকঘর</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="present_post" name="present_post" placeholder="ডাকঘর" value="<?= set_value('present_post'); ?>" required>
											<?= form_error('present_post', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="present_upazila" class="col-sm-3 control-label">উপজেলা</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="present_upazila" name="present_upazila" placeholder="উপজেলা" value="<?= set_value('present_upazila'); ?>" required>
											<?= form_error('present_upazila', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <label for="present_zila" class="col-sm-2 control-label">জেলা</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="present_zila" name="present_zila" placeholder="জেলা" value="<?= set_value('present_zila'); ?>" required>
											<?= form_error('present_zila', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="col-sm-3 control-label">ফোন / মোবাইল নং</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="ফোন / মোবাইল নং" value="<?= set_value('phone'); ?>" required onChange="checkInput(this)" onKeyup="checkInput(this)">
											<?= form_error('phone', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="guardian_job" class="col-sm-3 control-label">অভিভাবকের পেশা </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="guardian_job" name="guardian_job" placeholder="অভিভাবকের পেশা" value="<?= set_value('guardian_job'); ?>" required>
											<?= form_error('guardian_job', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <label for="annual_income" class="col-sm-2 control-label">বার্ষিক আয়</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="annual_income" name="annual_income" placeholder="বার্ষিক আয়" value="<?= set_value('annual_income'); ?>" required onChange="checkInput(this)" onKeyup="checkInput(this)">
											<?= form_error('annual_income', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dob" class="col-sm-3 control-label">জন্ম তারিখ (জন্ম নিবন্ধন অনুযায়ী)</label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control pull-right" id="dob" name="dob" value="<?= set_value('dob'); ?>" required>
                                            </div>
											<?= form_error('dob', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="old_school_name" class="col-sm-3 control-label">পূর্ববর্তি বিদ্যালয়ের নাম</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="old_school_name" name="old_school_name" placeholder="পূর্ববর্তি বিদ্যালয়ের নাম" value="<?= set_value('old_school_name'); ?>" required>
											<?= form_error('old_school_name', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="addmit_class" class="col-sm-3 control-label">ভর্তি ইচ্ছুক শ্রেণী </label>
                                        <div class="col-sm-8">
                                            <select id="addmit_class" name="addmit_class" class="form-control" required>
												<option value="">Select Class</option>
												<?php foreach($class as $key){?>
												<option <?= set_value('addmit_class') == $key->id ? 'selected':'' ?> value="<?= $key->id ?>"><?= $key->class_bn ?></option>
												<?php } ?>
											</select>
											<?= form_error('addmit_class', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label for="image" class="col-sm-3 control-label">আবেদনকারীর ছবি</label>
                                        <div class="col-sm-8">
                                            <input type="file" name="image" id="image" required>
											<span style="color: #DD4B39">Max size: 100kb (200*200). Allowed Types: gif, jpg, jpeg, png</span>
											<?= form_error('image', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="col-xs-6 col-sm-2 col-sm-offset-9 col-xs-offset-6">
                                        <button type="submit" class="btn btn-info btn-block"> Submit</button>
                                    </div>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                        <!-- /.box -->
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
			function fillAddress(){
				if (filladdress.checked == true){
					var village = document.getElementById("permanent_village").value;
					var post = document.getElementById("permanent_post").value;
					var upazila = document.getElementById("permanent_upazila").value;
					var zila = document.getElementById("permanent_zila").value;
						
					document.getElementById("present_village").value = village;
					document.getElementById("present_post").value = post;
					document.getElementById("present_upazila").value = upazila;
					document.getElementById("present_zila").value = zila;
				}
				else if (filladdress.checked == false){
					document.getElementById("present_village").value = '';
					document.getElementById("present_post").value = '';
					document.getElementById("present_upazila").value = '';
					document.getElementById("present_zila").value = '';
				}
			}
			function checkInput(ob){
				var invalidChars = /[^0-9]/gi
				if(invalidChars.test(ob.value)) {
					ob.value = ob.value.replace(invalidChars,"");
					}
				};
				function checkInputText(ob){
					var invalidChars = /[^A-Z .-]/gi
					if(invalidChars.test(ob.value)) {
						ob.value = ob.value.replace(invalidChars,"");
					}
				};
		</script>
    </body>
</html>
