<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Merit List (Dynamic V2)</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">

        <form class="form-horizontal" method="POST" action="<?= site_url('admin/printmeritlist_v2'); ?>" enctype="multipart/form-data">

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
                <label for="exam_id" class="col-sm-3 control-label">পরীক্ষা নির্বাচন করুন  <span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <select id="exam_id" name="exam_id" class="form-control" required>
                        <option value="final">ফাইনাল / বার্ষিক সম্মিলিত মেধা তালিকা</option>
                        <?php foreach (exam() as $key => $value) { ?>
                            <option value="<?= $key ?>"><?= $value ?> মেধা তালিকা</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-3 control-label">  <span class="text-danger"></span></label>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-danger" value="Print Merit List" />
                </div>
            </div>
        </form>
    </div>
</div>
