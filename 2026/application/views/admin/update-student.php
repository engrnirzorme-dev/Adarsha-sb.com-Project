<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Student Update Form</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="box-body">
                <?= $this->session->flashdata('insertMesg'); ?>
                <?= $this->session->flashdata('errorMesg'); ?>
                <div class="form-group">
                    <label for="name_bn" class="col-sm-3 control-label">ছাত্র/ছাত্রীর নাম (বাংলায়)  <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name_bn" name="name_bn" placeholder="ছাত্র/ছাত্রীর নাম" value="<?= $info['name_bn'] ?>" required>
                        <?= form_error('name_bn', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name_en" class="col-sm-3 control-label">IN ENGLISH  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Name of the student" value="<?= $info['name_en'] ?>" style="text-transform: uppercase" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
                        <?= form_error('name_en', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="father_bn" class="col-sm-3 control-label">পিতার নাম (বাংলায়)  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="father_bn" name="father_bn" placeholder="পিতার নাম" value="<?= $info['father_bn'] ?>">
                        <?= form_error('father_bn', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="father_en" class="col-sm-3 control-label">IN ENGLISH  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="father_en" name="father_en" placeholder="Father Name" value="<?= $info['father_en'] ?>" style="text-transform: uppercase" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
                        <?= form_error('father_en', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mother_bn" class="col-sm-3 control-label">মাতার নাম (বাংলায়)  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mother_bn" name="mother_bn" placeholder="মাতার নাম" value="<?= $info['mother_bn'] ?>">
                        <?= form_error('mother_bn', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mother_en" class="col-sm-3 control-label">IN ENGLISH  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mother_en" name="mother_en" placeholder="Mother Name" value="<?= $info['mother_en'] ?>" style="text-transform: uppercase" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
                        <?= form_error('mother_en', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class" class="col-sm-3 control-label">শ্রেণী  <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <select id="class" name="class" class="form-control" required>
                            <option value="">Select Class</option>
                            <?php foreach ($class as $key) { ?>
                                <option <?= $info['class'] == $key->id ? 'selected' : '' ?> value="<?= $key->id ?>">
                                    <?= $key->class_bn ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?= form_error('class', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <label for="section" class="col-sm-2 control-label">সেকশন  <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <select id="section" name="section" class="form-control" required>
							<?= select_option(section(), $info['section'], set_value('section')); ?>
                        </select>
                        <?= form_error('section', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="class_roll" class="col-sm-3 control-label">ক্লাস রোল <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="class_roll" name="class_roll" placeholder="ক্লাস রোল" value="<?= $info['class_roll'] ?>" required onChange="checkInput(this)" onKeyup="checkInput(this)">
                        <?= form_error('class_roll', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">স্থায়ী ঠিকানা</label>
                </div>
                <div class="form-group">
                    <label for="permanent_village" class="col-sm-3 control-label">গ্রাম/মহল্লা  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="permanent_village" name="permanent_village" placeholder="গ্রাম/মহল্লা" value="<?= $info['permanent_village'] ?>">
                        <?= form_error('permanent_village', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <label for="permanent_post" class="col-sm-2 control-label">ডাকঘর  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="permanent_post" name="permanent_post" placeholder="ডাকঘর" value="<?= $info['permanent_post'] ?>">
                        <?= form_error('permanent_post', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="permanent_upazila" class="col-sm-3 control-label">উপজেলা  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="permanent_upazila" name="permanent_upazila" placeholder="উপজেলা" value="<?= $info['permanent_upazila'] ?>">
                        <?= form_error('permanent_upazila', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <label for="permanent_zila" class="col-sm-2 control-label">জেলা  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="permanent_zila" name="permanent_zila" placeholder="জেলা" value="<?= $info['permanent_zila'] ?>">
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
                    <label for="present_village" class="col-sm-3 control-label">গ্রাম/মহল্লা  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="present_village" name="present_village" placeholder="গ্রাম/মহল্লা" value="<?= $info['present_village'] ?>">
                        <?= form_error('present_village', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <label for="present_post" class="col-sm-2 control-label">ডাকঘর  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="present_post" name="present_post" placeholder="ডাকঘর" value="<?= $info['present_post'] ?>">
                        <?= form_error('present_post', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="present_upazila" class="col-sm-3 control-label">উপজেলা  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="present_upazila" name="present_upazila" placeholder="উপজেলা" value="<?= $info['present_upazila'] ?>">
                        <?= form_error('present_upazila', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <label for="present_zila" class="col-sm-2 control-label">জেলা  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="present_zila" name="present_zila" placeholder="জেলা" value="<?= $info['present_zila'] ?>">
                        <?= form_error('present_zila', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">ফোন / মোবাইল নং  </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="ফোন / মোবাইল নং" value="<?= $info['phone'] ?>" onChange="checkInput(this)" onKeyup="checkInput(this)">
                        <?= form_error('phone', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="guardian_job" class="col-sm-3 control-label">অভিভাবকের পেশা   </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="guardian_job" name="guardian_job" placeholder="অভিভাবকের পেশা" value="<?= $info['guardian_job'] ?>">
                        <?= form_error('guardian_job', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <label for="annual_income" class="col-sm-2 control-label">বার্ষিক আয়  </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="annual_income" name="annual_income" placeholder="বার্ষিক আয়" value="<?= $info['annual_income'] ?>" onChange="checkInputText(this)" onKeyup="checkInputText(this)">
                        <?= form_error('annual_income', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="col-sm-3 control-label">জন্ম তারিখ (জন্ম নিবন্ধন অনুযায়ী)  </label>
                    <div class="col-sm-8">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control pull-right" id="dob" name="dob" value="<?= $info['dob'] ?>">
                        </div>
                        <?= form_error('dob', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-3 control-label">ছবি  </label>
                    <div class="col-sm-8">
                        <input type="file" name="image" id="image" >
                        <span style="color: #DD4B39">Max size: 100kb (200*200)</span>
                        <?= form_error('image', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
				<!--
                <div class="form-group">
                    <label class="col-sm-3 control-label">স্বাস্থ্যগত বিবরণ</label>
                </div>
                <div class="form-group">
                    <label for="blood_group" class="col-sm-3 control-label">রক্তের গ্রুপ </label>
                    <div class="col-sm-3">
                        <select name="blood_group" class="form-control" id="blood_group">
                            <option value="">Select Blood Group</option>
                            <option <?= $info['blood_group'] == 'A+' ? 'selected':'' ?> value="A+">A+</option>
                            <option <?= $info['blood_group'] == 'O+' ? 'selected':'' ?> value="O+">O+</option>
                            <option <?= $info['blood_group'] == 'B+' ? 'selected':'' ?> value="B+">B+</option>
                            <option <?= $info['blood_group'] == 'AB+' ? 'selected':'' ?> value="AB+">AB+</option>
                            <option <?= $info['blood_group'] == 'A-' ? 'selected':'' ?> value="A-">A-</option>
                            <option <?= $info['blood_group'] == 'O-' ? 'selected':'' ?> value="O-">O-</option>
                            <option <?= $info['blood_group'] == 'B-' ? 'selected':'' ?> value="B-">B-</option>
                            <option <?= $info['blood_group'] == 'AB-' ? 'selected':'' ?> value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="height" class="col-sm-3 control-label">উচ্চতা (মিটার)</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="height" name="height" placeholder="উচ্চতা (মিটার)" value="<?= $info['height'] ?>" >
                    </div>
                    <label for="weight" class="col-sm-2 control-label">ওজন (কেজি) </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="ওজন (কেজি) " value="<?= $info['weight'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="identification_mark" class="col-sm-3 control-label">সনাক্তকরণ চিহ্ন (যদি থাকে)</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="identification_mark" name="identification_mark" placeholder="সনাক্তকরণ চিহ্ন (যদি থাকে)" value="<?= $info['identification_mark'] ?>" >
                    </div>
                    <label for="health_status" class="col-sm-2 control-label">স্বাস্থ্যগত অবস্থা</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="health_status" name="health_status" placeholder="স্বাস্থ্যগত অবস্থা" value="<?= $info['health_status'] ?>">
                    </div>
                </div>
            </div>
			-->
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="col-xs-6 col-sm-2 col-sm-offset-9 col-xs-offset-6">
                    <button type="submit" class="btn btn-info btn-block"> Update</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->

<script >
    function fillAddress() {
        if (filladdress.checked == true) {
            var village = document.getElementById("permanent_village").value;
            var post = document.getElementById("permanent_post").value;
            var upazila = document.getElementById("permanent_upazila").value;
            var zila = document.getElementById("permanent_zila").value;

            document.getElementById("present_village").value = village;
            document.getElementById("present_post").value = post;
            document.getElementById("present_upazila").value = upazila;
            document.getElementById("present_zila").value = zila;
        } else if (filladdress.checked == false) {
            document.getElementById("present_village").value = '';
            document.getElementById("present_post").value = '';
            document.getElementById("present_upazila").value = '';
            document.getElementById("present_zila").value = '';
        }
    }
	
	function checkInput(ob) {
        var invalidChars = /[^0-9]/gi
        if (invalidChars.test(ob.value)) {
            ob.value = ob.value.replace(invalidChars, "");
        }
    };

	function checkInputText(ob) {
		var invalidChars = /[^A-Z .-]/gi
		if (invalidChars.test(ob.value)) {
			ob.value = ob.value.replace(invalidChars, "");
		}
	};
</script>