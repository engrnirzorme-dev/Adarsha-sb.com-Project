<?php
$pre_mark = array();
foreach ($mark as $mrow) {
    $pre_mark[$mrow->class_id . '_' . $mrow->year . '_' . $mrow->student_id . '_' . $mrow->sub_code . '_' . $mrow->exam . '_' . $mrow->type] = $mrow;
}

$subinfo = array();
foreach ($subject as $srow) {
    $subinfo[$srow->code] = json_decode(json_encode($srow), TRUE);
}
?> 
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">মার্ক আপলোড</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th rowspan="2">বিষয়</th>
                    <?php foreach (exam() as $exam) { ?>
                        <th colspan="3"><?= $exam ?></th>
                    <?php } ?>
                </tr>
                <tr>
                    <?php foreach (exam() as $exam) { ?>
                        <?php foreach (mark_type() as $type_name) { ?>
                            <th><?= $type_name ?></th>
                        <?php } ?>
                    <?php } ?>
                </tr>

                <?php
                $sl = 1;
                foreach (explode(",", $row['subject']) as $sub_code) {
                    ?>
                    <tr>
                        <td><?= isset($subinfo[$sub_code]) ? $subinfo[$sub_code]['name'] : $sub_code ?></td>
                        <?php foreach (exam() as $exam_id => $exam_name) { ?>
                            <?php
                            foreach (mark_type() as $type_id => $type_name) {
                                $mark_key = $row['class'] . '_' . date("2026") . '_' . $row['id'] . '_' . $sub_code . '_' . $exam_id . '_' . $type_id;
                                ?>
                                <td>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control mark_upload" data-id="<?= isset($pre_mark[$mark_key]) ? $pre_mark[$mark_key]->id : '' ?>" value="<?= isset($pre_mark[$mark_key]) ? $pre_mark[$mark_key]->mark : '' ?>" data-student_id="<?= $row['id'] ?>" data-sl="<?= $sl ?>" data-sub_code="<?= $sub_code ?>" data-exam="<?= $exam_id ?>" data-class_id="<?= $row['class'] ?>" data-type="<?= $type_id ?>" max="<?= isset($subinfo[$sub_code]) ? $subinfo[$sub_code]['full_'.$type_id] : 0 ?>" min="0" data-toggle="tooltip" title="Full Mark <?= isset($subinfo[$sub_code]) ? $subinfo[$sub_code]['full_'.$type_id] : 0 ?>"  />
                                            <div class="input-group-addon" id="status_<?= $sl++ ?>"><?= isset($pre_mark[$mark_key]) ? '<i class="fa fa-check-square-o text-success" aria-hidden="true"></i>' : '' ?></div>
                                        </div>
                                    </div>                        
                                </td>
                                <?php
                            }
                            ?>
                        <?php } ?>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
<style type="text/css">
    th{
        text-align: center;
    }
</style>