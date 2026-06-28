<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Mark Upload</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">


        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

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
                <label for="exam" class="col-sm-3 control-label">পরীক্ষা  <span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <select id="exam" name="exam" class="form-control" required>
                        <?= select_option(exam(), set_value('section')); ?>
                    </select>
                    <?= form_error('exam', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="subject" class="col-sm-3 control-label">বিষয়  <span class="text-danger">*</span></label>
                <div class="col-sm-3">
                    <select id="class" name="subject" class="form-control" required>
                        <option value="">Select Subject</option>
                        <?php foreach ($subject as $key) { ?>
                            <option class="subject_all subject_<?= $key->class ?>" <?= set_value('subject') == $key->id ? 'selected' : '' ?> value="<?= $key->id ?>">
                                <?= $key->name ?>
                            </option>
                        <?php } ?>
                    </select>
                    <?= form_error('subject', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>
            <?php foreach (mark_type() as $key => $value) { ?>
                <div class="form-group">
                    <label for="mark" class="col-sm-3 control-label">  <span class="text-danger"></span></label>
                    <div class="col-sm-4">
                        <label><input type="checkbox" name="mark[]" value="<?= $key ?>"> <b><?= $value ?> </b></label>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">  <span class="text-danger"></span></label>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-danger" value="Find Student" />
                </div>
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    .subject_all{
        display: none;
    }
</style>
<script type="text/javascript">
    function filter_subject(id){
        $(".subject_all").hide();
        $(".subject_"+id).show();
    }
</script>