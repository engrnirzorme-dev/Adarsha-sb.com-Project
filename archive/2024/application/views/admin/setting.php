<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">ভর্তি পরীক্ষার সময় ও তারিখ </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= $this->session->flashdata('updateMesg'); ?>
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="date_of_admission">ভর্তি পরীক্ষার তারিখ</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="date_of_admission" id="date_of_admission" value="<?= $time['date_of_admission'] ?>" required>
                </div>
                <label class="col-sm-2 control-label" for="time_of_admission">ভর্তি পরীক্ষার সময়</label>
                <div class="col-sm-3">
                    <input type="time" class="form-control" name="time_of_admission" id="time_of_admission" value="<?= $time['time_of_admission'] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="admissiontime" class="btn btn-danger" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">পাসওয়ার্ড পরিবর্তন করুন </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= $this->session->flashdata('updateMesg1'); ?>
        <?= $this->session->flashdata('errorMesg'); ?>
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="password">পাসওয়ার্ড দিন</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" name="password" id="password" required p>
                </div>
                <label class="col-sm-2 control-label" for="cpassword">পুনরায়  পাসওয়ার্ড দিন</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="change_password" class="btn btn-danger" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">রেজাল্ট পাবলিশ</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= $this->session->flashdata('updateMesgPublish'); ?>
        <?= $this->session->flashdata('errorMesgPublish'); ?>
        
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="password">রেজাল্ট পাবলিশ এর জন্য পাসওয়ার্ড দিন</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="result_password" id="password" required p>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="result_publish" class="btn btn-danger" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">রেজাল্ট পাবলিশ বন্ধ করুন</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= $this->session->flashdata('updateMesgPublishOff'); ?>
        <?= $this->session->flashdata('errorMesgPublishOff'); ?>
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="poffpassword">রেজাল্ট পাবলিশ বন্ধ করার জন্য পাসওয়ার্ড</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="publish_off" id="password" required p>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="result_publish_off" class="btn btn-danger" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">রেজাল্ট নোটিশ বক্স</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?= $this->session->flashdata('updateMesgNotic'); ?>
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="notice">রেজাল্ট নোটিশ বক্স</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="off_notice" id="off_notice" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" name="result_off_notice" class="btn btn-danger" value="Update">
                </div>
            </div>
        </form>
    </div>
</div>