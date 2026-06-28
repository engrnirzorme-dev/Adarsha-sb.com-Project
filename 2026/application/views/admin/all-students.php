
<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">All Students </h3>

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
        <?= $this->session->flashdata('updateMesg'); ?>
        <div class="table-responsive">
            <table id="datatable1" class="table table-bordered table-striped datatable appstudents">
                <thead>
                    <tr>
                        <th>ছাত্র/ছাত্রীর নাম</th>
                        <th>শ্রেণী </th>
                        <th>সেকশন </th>
                        <th>ক্লাস রোল</th>
                        <th>ছবি</th>
                        <th style="width: 300px">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $row) { ?>
                        <tr>
                            <td><?= $row->name_bn ?></td>
                            <td><?= allclass($row->class) ?></td>
                            <td><?= section($row->section) ?></td>
                            <td><?= to_bangla($row->class_roll) ?></td>
                            <td><img class="student-img" src="<?= $row->image == '' ? base_url('uploads/students/01.png') : base_url('uploads/students/' . $row->image) ?>" /></td>
                            <td>
                                <a href="<?= site_url('admin/markuploadsingle/' . $row->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> মার্ক আপলোড</a>
                                <a href="<?= site_url('admin/viewstudent/' . $row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> ভিউ</a>
                                <a href="<?= site_url('admin/editstudent/' . $row->id); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o"></i> এডিট</a>
                                <a href="<?= site_url('admin/deletestudent/' . $row->id); ?>" onclick="return confirm('মুছে ফেলতে চান?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  ডিলিট</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ছাত্র/ছাত্রীর নাম</th>
                        <th>শ্রেণী </th>
                        <th>সেকশন </th>
                        <th>ক্লাস রোল</th>
                        <th>ছবি</th>
                        <th>#</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->