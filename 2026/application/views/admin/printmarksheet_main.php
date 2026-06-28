<?php
$subinfo = array();
foreach ($subject as $srow) {
    $subinfo[$srow->code] = json_decode(json_encode($srow), TRUE);
}
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>বিষয় ভিত্তিক পরীক্ষার ফলাফল - <?= toBangla(date("2026")) ?></title>
        <link rel="stylesheet" href="<?= base_url('assets/school/css/marksheet.css') ?>" />
        <style type="text/css">
            .hiderow{
				border-top: 2px solid transparent !important;
			}
            .hiderow td{}
            @page{
                size: auto;
                margin: 3mm;
            }
        </style>
    </head>

    <body onload="window.print()">
        <?php
        $show_4 = isset($post['exam']['1']) && isset($post['exam']['2']) && isset($post['exam']['3']) ? TRUE : FALSE;
        foreach ($students as $row) {
            $result = json_decode($row->result, TRUE);
            ?>
            <div class="marksheet" style="color:black">
                <div class="head">
                    <div class="logo">
                        <img src="<?= base_url('assets/website/img/logo.png') ?>">
                    </div>
                    <div class="title">
                        <h2>আদর্শ শিশু বিদ্যালয়, নেত্রকোণা</h2>
                        <h3>বিষয় ভিত্তিক পরীক্ষার ফলাফল - <?= to_bangla(date("2026")) ?></h3>
                    </div>
                    <table>
                        <tr>
                            <td>Letter Grade</td>
                            <td>Class Interval</td>
                            <td>Grade Point</td>
                            <td>Letter Grade</td>
                            <td>Class Interval</td>
                            <td>Grade Point</td>
                        </tr>
                        <tr>
                            <td>A+</td>
                            <td>80-100</td>
                            <td>5.00</td>
                            <td>A</td>
                            <td>70-79</td>
                            <td>4.00</td>
                        </tr>
                        <tr>
                            <td>A-</td>
                            <td>60-69</td>
                            <td>3.50</td>
                            <td>B</td>
                            <td>50-59</td>
                            <td>3.00</td>
                        </tr>
                        <tr>
                            <td>C</td>
                            <td>40-49</td>
                            <td>2.00</td>
                            <td>F</td>
                            <td>0-39</td>
                            <td>0.00</td>
                        </tr>
                    </table>
                </div>
                <table class="student-info" style="width: 100%; margin: 7px 0">
                    <tr>
                        <td>ছাত্র/ছাত্রীর নাম : <b><?= $row->name_bn ?></b></td>
                        <td>শ্রেণী : <b><?= allclass($row->class) ?></b></td>
                        <td>শাখা : <b><?= section($row->section) ?></b></td>
                        <td>রোল নং : <b><?= to_bangla($row->class_roll) ?></b></td>
                        <td>প্রাপ্ত পয়েন্ট/গ্রেড : <b><?= $show_4 ? toBangla($row->gpa).'/'.gla($row->gpa) : '' ?></b></td>
                    </tr>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td style="background: #25B7EF" rowspan="2"><div class="rotate">বিষয়</div></td>
                            <td rowspan="2" style="width: 132px; background: #25B7EF">মান বন্টন</td>
                            <td colspan="3" style="background: #25B7EF"><strong>প্রথম মূল্যায়ন</strong></td>
                            <td colspan="3" style="background: #25B7EF"><strong> দ্বিতীয় মূল্যায়ন </strong></td>
                            <td colspan="3" style="background: #25B7EF"><strong>চূড়ান্ত মূল্যায়ন </strong></td>
                            <td rowspan="2" style="background: #25B7EF">প্রাপ্ত নম্বরের ১০০%</td>
                            <td rowspan="2" colspan="2" style="background: #25B7EF">প্রাপ্ত গ্রেড</td>
                        </tr>
                        <tr>
                            <td style="background: #B3EAFF">সর্বোচ্চ নম্বর</td>
                            <td style="background: #B3EAFF">প্রাপ্ত নম্বর</td>
                            <td style="background: #B3EAFF">প্রাপ্ত নম্বরের ২০%</td>
                            <td style="background: #B3EAFF">সর্বোচ্চ নম্বর</td>
                            <td style="background: #B3EAFF">প্রাপ্ত নম্বর</td>
                            <td style="background: #B3EAFF">প্রাপ্ত নম্বরের ৩০%</td>
                            <td style="background: #B3EAFF">সর্বোচ্চ নম্বর</td>
                            <td style="background: #B3EAFF">প্রাপ্ত নম্বর</td>
                            <td style="background: #B3EAFF">প্রাপ্ত নম্বরের ৫০%</td>
                        </tr> 
                        <?php
                        foreach (explode(",", $row->subject) as $sub_code) {
                            $subrow = isset($subinfo[$sub_code]) ? $subinfo[$sub_code] : array('name' => '', 'full_1' => 0, 'full_2' => 0, 'full_3' => 0, 'title_1' => '', 'title_2' => '', 'title_3' => '');
                            foreach (mark_type() as $type_id => $type_name) {
                                ?>
                                <tr class="<?= $subrow['full_' . $type_id] > 0 ? '' : 'hiderow' ?>">
                                    <?php if ($type_id == 1) { ?>
                                        <td rowspan="4" style="background: #25B7EF"><div class="rotate"><?= $subrow['name'] ?></div></td>
                                    <?php } ?>
                                    <td class="text-left"><?= $subrow['full_' . $type_id] > 0 ? $subrow['title_' . $type_id] . ' - ' . toBangla($subrow['full_' . $type_id]) : '' ?></td>

                                    <?php foreach (exam() as $exam_id => $exam_name) { ?>
                                        <td><?= toBangla(show_mark($post['exam'], $result, $exam_id, $sub_code, $type_id, 2)) ?></td>
                                        <td><?= toBangla(show_mark($post['exam'], $result, $exam_id, $sub_code, $type_id, 1)) ?></td>
                                        <td><?= toBangla(show_mark($post['exam'], $result, $exam_id, $sub_code, $type_id, 4)) ?></td>
                                    <?php } ?>

                                    <td style="background: #25B7EF"><?= toBangla($show_4 ? isset($result[$sub_code][$type_id][100]) ? $result[$sub_code][$type_id][100] : '' : '') ?></td>
                                    <td></td> 
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr style="background: #25B7EF">
                                <td class="text-left">মোট - <?= toBangla($result[$sub_code][5][0]) ?></td>
                                <td></td>
                                <td><b><?= toBangla(isset($post['exam'][1]) ? isset($result[1][$sub_code][4][1]) ? $result[1][$sub_code][4][1] : '' : '') ?></b></td>
                                <td><b><?= toBangla(isset($post['exam'][1]) ? isset($result[1][$sub_code][4][4]) ? $result[1][$sub_code][4][4] : '' : '') ?></b></td>
                                <td></td>
                                <td><b><?= toBangla(isset($post['exam'][2]) ? isset($result[2][$sub_code][4][1]) ? $result[2][$sub_code][4][1] : '' : '') ?></b></td>
                                <td><b><?= toBangla(isset($post['exam'][2]) ? isset($result[2][$sub_code][4][4]) ? $result[2][$sub_code][4][4] : '' : '') ?></b></td>
                                <td></td>
                                <td><b><?= toBangla(isset($post['exam'][3]) ? isset($result[3][$sub_code][4][1]) ? $result[3][$sub_code][4][1] : '' : '') ?></b></td>
                                <td><b><?= toBangla(isset($post['exam'][3]) ? isset($result[3][$sub_code][4][4]) ? $result[3][$sub_code][4][4] : '' : '') ?></b></td>
                                <td style="background: #25B7EF"><b><?= toBangla($show_4 ? isset($result[$sub_code][4][100]) ? $result[$sub_code][4][100] : '' : '') ?></b></td>
                                <td><b><?= toBangla($show_4 ? isset($result[$sub_code][4][6]) ? $result[$sub_code][4][6] : '' : '') ?></b></td>
                                <td><b><?= toBangla($show_4 ? isset($result[$sub_code][4][7]) ? $result[$sub_code][4][7] : '' : '') ?></b></td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td style="background: #25B7EF"></td>
                            <td style="background: #25B7EF">সর্বমোট - <?= toBangla($result[5][0]) ?></td>
                            <td style="background: #25B7EF"></td>
                            <td style="background: #25B7EF"><b><?= toBangla(isset($post['exam'][1]) ? isset($result[1][5][1]) ? $result[1][5][1] : '' : '') ?></b></td>
                            <td style="background: #25B7EF"><b><?= toBangla(isset($post['exam'][1]) ? isset($result[1][5][4]) ? $result[1][5][4] : '' : '') ?></b></td>
                            <td style="background: #25B7EF"></td>
                            <td style="background: #25B7EF"><b><?= toBangla(isset($post['exam'][2]) ? isset($result[2][5][1]) ? $result[2][5][1] : '' : '') ?></b></td>
                            <td style="background: #25B7EF"><b><?= toBangla(isset($post['exam'][2]) ? isset($result[2][5][4]) ? $result[2][5][4] : '' : '') ?></b></td>
                            <td style="background: #25B7EF"></td>
                            <td style="background: #25B7EF"><b><?= toBangla(isset($post['exam'][3]) ? isset($result[3][5][1]) ? $result[3][5][1] : '' : '') ?></b></td>
                            <td style="background: #25B7EF"><b><?= toBangla(isset($post['exam'][3]) ? isset($result[3][5][4]) ? $result[3][5][4] : '' : '') ?></b></td>
                            <td style="background: #25B7EF"><b><?= toBangla($show_4 ? isset($result[5][100]) ? $result[5][100] : '' : '') ?></b></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <table class="student-info" style="width: 60%; margin: 20px auto 0">
                    <tr>
                        <td>উত্তীর্ণ শ্রেণী : </td>
                        <td>শাখা :  </td>
                        <td>রোল নং :  </td>
                        <td>সন : </td>
                    </tr>
                </table>

                <div class="signature">
                    <div class="left">শ্রেণী শিক্ষকের   স্বাক্ষর</div>
                    <div class="right">ভারপ্রাপ্ত অধ্যক্ষের স্বাক্ষর</div>
                </div>
            </div>
            <?php
        }
        ?>
    </body>

</html>