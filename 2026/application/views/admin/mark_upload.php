<?php
$pre_mark = array();
foreach ($mark as $mrow) {
    $pre_mark[$mrow->class_id . '_' . $mrow->year . '_' . $mrow->student_id . '_' . $mrow->sub_code . '_' . $mrow->exam . '_' . $mrow->type] = $mrow;
}
$class = to_array($class, 'id');
?>
<!-- Default box -->
<div class="box box-info">
    <div class="box-header with-border">
        <div  class="box-title" style="width: calc(100% - 60px)">
            <table style="width: 100%;">
                <tr>
                    <td>শ্রেণি : <?= $class[$post['class']]['class_bn'] ?></td>
                    <td>সেকশন : <?= section($post['section']) ?></td>
                    <td>পরীক্ষা : <?= exam($post['exam']) ?></td>
                    <td>বিষয় : <?= $subject['name'] ?></td>
                </tr>
            </table>
        </div>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>নাম</th>
                <th style="width: 140px;">রোল</th>
                <?php foreach ($post['mark'] as $mark_type) { ?>
                    <th style="width: 140px;"><?= mark_type($mark_type) ?></th>
                <?php } ?>
            </tr>
            <?php
            $sl = 1;
            foreach ($student as $row) {
                ?>
                <tr>
                    <td><?= $row->name_bn ?></td>
                    <td><?= to_bangla($row->class_roll) ?></td>
                    <?php
                    foreach ($post['mark'] as $mark_type) {
                        $mark_key = $row->class . '_' . date("2026") . '_' . $row->id . '_' . $subject['code'] . '_' . $post['exam'] . '_' . $mark_type;
                        ?>
                        <td>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control mark_upload" data-id="<?= isset($pre_mark[$mark_key])?$pre_mark[$mark_key]->id:'' ?>" value="<?= isset($pre_mark[$mark_key])?$pre_mark[$mark_key]->mark:'' ?>" data-student_id="<?= $row->id ?>" data-sl="<?= $sl ?>" data-sub_code="<?= $subject['code'] ?>" data-exam="<?= $post['exam'] ?>" data-class_id="<?= $row->class ?>" data-type="<?= $mark_type ?>" max="<?= $subject['full_' . $mark_type] ?>" min="0" data-toggle="tooltip" title="Full Mark <?= $subject['full_' . $mark_type] ?>"  />
                                    <div class="input-group-addon" id="status_<?= $sl++ ?>"><?= isset($pre_mark[$mark_key])?'<i class="fa fa-check-square-o text-success" aria-hidden="true"></i>':'' ?></div>
                                </div>
                            </div>                        
                        </td>
                        <?php
                    }
                    ?>
                </tr>

            <?php } ?>
        </table>


    </div>
</div>