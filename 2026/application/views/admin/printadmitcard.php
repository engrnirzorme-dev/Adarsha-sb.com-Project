<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>প্রবেশ পত্র - <?= exam($_POST['exam']) ?> পরীক্ষা - <?= toBangla(date("2026")) ?> খ্রিঃ</title>
        <link rel="stylesheet" href="<?= base_url('assets/school/css/front.css') ?>" />
        <style type="text/css">
				@page{
                size: auto;
                margin: 3mm;
            }
            body {
				font-family: kalpurush;
				margin: 0;
			}
			.admit-card {
				width: 672px;
				height: 460px;
				overflow: hidden;
				page-break-after: always;
				margin: 0 auto 10px;
				background: url(<?= base_url('assets/school/img/admit-bg1.png') ?>);
				padding: 45px 0;
				box-sizing: border-box;
				//border: 5px solid #3898db;
				border: 20px solid black;
				background-clip: padding-box;
				border-image-source: url(<?= base_url('assets/school/img/border2.png') ?>);
				border-image-slice: 40;
				border-image-repeat: round;
			}
			.admit-card .head {
				text-align: center;
			}
			.admit-card .head h1 {
				margin: 0;
				color: #3898db;
				font-size: 46px;
				line-height: 1.3em;
			}
			.admit-card .head h3 {
				margin: 0;
				font-size: 24px;
				line-height: 1.3em;
			}
			.admit-card .title {
				text-align: center;
			}
			.admit-card .title h1 {
				margin: 20px 0;
				width: 230px;
				background: #6acaff;
				color: #FFF;
				display: inline-block;
				border-radius: 35px;
				border-left: 6px solid #2282c5;
				border-bottom: 6px solid #2282c5;
				padding: 6px 6px 0 0;
			}
			.admit-card .body table {
				width: 85%;
				margin: auto;
				font-size: 18px;
			}
			.admit-card .footer {
				text-align: right;
				width: 65%;
				margin: 40px auto 0;
			}
			
        </style>
    </head>
	
    <body onload="window.print()">
		<?php foreach($students as $row){ ?>
		<div class="admit-card">
			<div class="head">
				<h1>আদর্শ শিশু বিদ্যালয়, নেত্রকোণা।</h1>
				<h3><?= exam($_POST['exam']) ?> পরীক্ষা - <?= toBangla(date("2026")) ?> খ্রিঃ</h3>
			</div>
			<div class="title">
				<h1>প্রবেশ পত্র</h1>
			</div>
			<div class="body">
				<table>
					<tr>
						<td colspan="3">ছাত্র/ছাত্রীর নামঃ <b><?= $row->name_bn ?></b></td>
					</tr>
					<tr>
						<td>শ্রেণীঃ  <b><?= allclass($row->class) ?></b></td>
						<td>ক্রমিক নংঃ  <b><?= toBangla($row->class_roll) ?></b></td>
						<td>শাখাঃ <b><?= section($row->section) ?></b></td>
					</tr>
				</table>
			</div>
			<div class="footer">
				<b>ভারপ্রাপ্ত অধ্যক্ষ</b>
			</div>
		</div>
		<?php } ?>
    </body>
</html>