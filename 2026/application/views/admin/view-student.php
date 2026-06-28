<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Student Information</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="applicant-info">
                <tr>
                    <th>ছাত্র/ছাত্রীর নাম (বাংলায়)</th>
					<td colspan="3"><?= $student['name_bn'] ?></td>
                </tr>
                <tr>
                    <th>IN ENGLISH</th>
					<td colspan="3"><?= strtoupper($student['name_en']); ?></td>
                </tr>
                <tr>
                    <th>পিতার নাম (বাংলায়)</th>
					<td colspan="3"><?= $student['father_bn'] ?></td>
                </tr>
                <tr>
                    <th>IN ENGLISH</th>
					<td colspan="3"><?= strtoupper($student['father_en']) ?></td>
                </tr>
                <tr>
                    <th>মাতার নাম (বাংলায়)</th>
					<td colspan="3"><?= $student['mother_bn'] ?></td>
                </tr>
                <tr>
                    <th>IN ENGLISH</th>
					<td colspan="3"><?= strtoupper($student['mother_en']) ?></td>
                </tr>
                <tr>
                    <th>ক্লাস রোল</th>
					<td><?= to_bangla($student['class_roll']) ?></td>
                    <th>শ্রেণী </th>
					<td><?= allclass($student['class']) ?></td>
				</tr>
				<tr>
                    <th>সেকশন  </th>
					<td colspan="3"><?= section($student['section']) ?></td>
                </tr>
				<tr>
					<th colspan="4">স্থায়ী ঠিকানা</th>
				</tr>
                <tr>
                    <th>গ্রাম/মহল্লা</th>
					<td><?= $student['permanent_village'] ?></td>
                    <th>ডাকঘর</th>
					<td><?= $student['permanent_post'] ?></td>
                </tr>
                <tr>
                    <th>উপজেলা</th>
					<td><?= $student['permanent_upazila'] ?></td>
                    <th>জেলা</th>
					<td><?= $student['permanent_zila'] ?></td>
                </tr>
				<tr>
					<th colspan="4">বর্তমান ঠিকানা</th>
				</tr>
                <tr>
                    <th>গ্রাম/মহল্লা</th>
					<td><?= $student['present_village'] ?></td>
                    <th>ডাকঘর</th>
					<td><?= $student['present_post'] ?></td>
                </tr>
                <tr>
                    <th>উপজেলা</th>
					<td><?= $student['present_upazila'] ?></td>
                    <th>জেলা</th>
					<td><?= $student['present_zila'] ?></td>
                </tr>
                <tr>
                    <th>অভিভাবকের পেশা </th>
					<td><?= $student['guardian_job'] ?></td>
                    <th>বার্ষিক আয়</th>
					<td><?= $student['annual_income'] ?></td>
                </tr>
                <tr>
                    <th>ফোন / মোবাইল নং</th>
					<td><?= $student['phone'] ?></td>
                    <th>জন্ম তারিখ </th>
					<td><?= $student['dob'] == '' ? '': to_bangla(date('d-m-Y', strtotime($student['dob']))) ?></td>
                </tr>
				<!--
				<tr>
					<th colspan="4">স্বাস্থ্যগত বিবরণ</th>
				</tr>
                <tr>
                    <th>রক্তের গ্রুপ </th>
					<td colspan="3"><?= $student['blood_group'] ?></td>
                </tr>
                <tr>
                    <th>উচ্চতা (মিটার)</th>
					<td><?= $student['height'] ?></td>
                    <th>ওজন (কেজি)</th>
					<td><?= $student['weight'] ?></td>
                </tr>
                <tr>
                    <th>সনাক্তকরণ চিহ্ন (যদি থাকে)</th>
					<td><?= $student['identification_mark'] ?></td>
                    <th>স্বাস্থ্যগত অবস্থা</th>
					<td><?= $student['health_status'] ?></td>
                </tr>
				-->
                <tr>
                    <th> ছবি</th>
					<td colspan="3"><img style="height: 100px;width:100px" src="<?= $student['image'] == '' ? base_url('uploads/students/01.png') : base_url('uploads/students/'.$student['image']) ?>" /></td>
                </tr>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->