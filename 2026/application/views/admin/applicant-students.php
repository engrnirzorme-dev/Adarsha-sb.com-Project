
<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Applicant Students </h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= $this->session->flashdata('deleteMesg'); ?>
			<table id="datatable1" class="table table-bordered table-striped datatable appstudents">
				<thead>
					<tr>
						<th>ফর্ম নং</th>
						<th>আবেদনকারীর নাম</th>
						<th>ভর্তি ইচ্ছুক শ্রেণী </th>
						<th>ফোন / মোবাইল নং</th>
						<th>ছবি</th>
						<th>আবেদনের তারিখ</th>
						<th style="width: 300px;">#</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($students as $row) { ?>
						<tr>
							<td><?= to_bangla($row->id) ?></td>
							<td><?= $row->name_bn ?></td>
							<td><?= allclass($row->addmit_class) ?></td>
							<td><?= $row->phone ?></td>
							<td><img class="student-img" src="<?= base_url('uploads/students/'.$row->image); ?>" /></td>
							<td><?= to_bangla(date('d-m-Y', strtotime($row->createtime))) ?></td>
							<td>
							<a href="<?= site_url('admin/applicant/'.$row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> ভিউ</a>
							<a href="<?= site_url('admin/printadmit/'.$row->id); ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> প্রিন্ট</a>
							<a href="<?= site_url('admin/addappstud/'.$row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> যোগ করুন</a>
							<a href="<?= site_url('admin/deleteapp/'.$row->id); ?>" onclick="return confirm('মুছে ফেলতে চান?')" class="btn btn-danger btn-sm"><i class="fa fa-print"></i> ডিলিট</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>ফর্ম নং</th>
						<th>আবেদনকারীর নাম</th>
						<th>ভর্তি ইচ্ছুক শ্রেণী </th>
						<th>ফোন / মোবাইল নং</th>
						<th>ছবি</th>
						<th>আবেদনের তারিখ</th>
						<th>#</th>
					</tr>
				</tfoot>
			</table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->

