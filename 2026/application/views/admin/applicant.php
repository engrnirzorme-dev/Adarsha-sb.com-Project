<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Applicant Information</h3>

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
                    <th>আবেদনকারীর নাম (বাংলায়)</th>
					<td colspan="3"><?= $applicant['name_bn'] ?></td>
                </tr>
                <tr>
                    <th>IN ENGLISH</th>
					<td colspan="3"><?= strtoupper($applicant['name_en']); ?></td>
                </tr>
                <tr>
                    <th>পিতার নাম (বাংলায়)</th>
					<td colspan="3"><?= $applicant['father_bn'] ?></td>
                </tr>
                <tr>
                    <th>IN ENGLISH</th>
					<td colspan="3"><?= strtoupper($applicant['father_en']) ?></td>
                </tr>
                <tr>
                    <th>মাতার নাম (বাংলায়)</th>
					<td colspan="3"><?= $applicant['mother_bn'] ?></td>
                </tr>
                <tr>
                    <th>IN ENGLISH</th>
					<td colspan="3"><?= strtoupper($applicant['mother_en']) ?></td>
                </tr>
				<tr>
					<th colspan="4">স্থায়ী ঠিকানা</th>
				</tr>
                <tr>
                    <th>গ্রাম/মহল্লা</th>
					<td><?= $applicant['permanent_village'] ?></td>
                    <th>ডাকঘর</th>
					<td><?= $applicant['permanent_post'] ?></td>
                </tr>
                <tr>
                    <th>উপজেলা</th>
					<td><?= $applicant['permanent_upazila'] ?></td>
                    <th>জেলা</th>
					<td><?= $applicant['permanent_zila'] ?></td>
                </tr>
				<tr>
					<th colspan="4">বর্তমান ঠিকানা</th>
				</tr>
                <tr>
                    <th>গ্রাম/মহল্লা</th>
					<td><?= $applicant['present_village'] ?></td>
                    <th>ডাকঘর</th>
					<td><?= $applicant['present_post'] ?></td>
                </tr>
                <tr>
                    <th>উপজেলা</th>
					<td><?= $applicant['present_upazila'] ?></td>
                    <th>জেলা</th>
					<td><?= $applicant['present_zila'] ?></td>
                </tr>
                <tr>
                    <th>অভিভাবকের পেশা </th>
					<td><?= $applicant['guardian_job'] ?></td>
                    <th>বার্ষিক আয়</th>
					<td><?= $applicant['annual_income'] ?></td>
                </tr>
                <tr>
                    <th>ফোন / মোবাইল নং</th>
					<td><?= $applicant['phone'] ?></td>
                    <th>জন্ম তারিখ </th>
					<td><?= date('d-M-Y', strtotime($applicant['dob'])) ?></td>
                </tr>
                <tr>
                    <th>পূর্ববর্তি বিদ্যালয়ের নাম</th>
					<td colspan="3"><?= $applicant['old_school_name'] ?></td>
                </tr>
                <tr>
                    <th>ভর্তি ইচ্ছুক শ্রেণী </th>
					<td colspan="3"><?= allclass($applicant['addmit_class']) ?></td>
                </tr>
                <tr>
                    <th>আবেদনকারীর ছবি</th>
					<td colspan="3"><img style="height: 100px;width:100px" src="<?= base_url('uploads/students/'.$applicant['image']); ?>" /></td>
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