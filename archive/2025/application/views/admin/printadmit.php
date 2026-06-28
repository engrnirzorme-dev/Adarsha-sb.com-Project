<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Print</title>
	<link rel="stylesheet" href="<?= site_url() ?>assets/school/css/admin.css">
	<style>
	@page{
                size: auto;
                margin: 3mm;
            }
		.admit-card {
			width: 770px;
			margin: auto;
			position: relative;
		}

		.admit-card .admit-head {
			background: #3898db;
			color: #FFF;
			overflow: hidden;
			padding: 16px 10px 10px;
		}

		.admit-card .admit-head .logo {
			float: left;
			width: 190px;
			text-align: center;
		}

		.admit-card .admit-head .logo img {
			height: 100px;
		}

		.admit-card .admit-head .title {
			float: left;
			text-align: center;
			margin-top: 14px;
			padding: 2px;
		}
		.admit-card .admit-head .title h2 {
			margin: 0;
			font-weight: 700;
			line-height: 1.4em;
			font-size: 30px;
		}

		.admit-card .admit-title {
			background: #bdc3c7;
			color: #FFF;
			text-align: center;
			padding: 2px;
		}

		.admit-card .admit-title h2 {
			margin: 0;
			display: inline-block;
			background: #000;
			border: 2px solid #fff;
			width: 300px;
			padding: 4px;
			border-radius: 15px;
			font-weight: bold;
			font-size: 28px;
		}
		.admit-card .pic {
		height: 143px;
		width: 138px;
		background: #f4f4f4;
		position: absolute;
		right: 20px;
		top: 20px;
		box-sizing: border-box;
	}
		.admit-card .pic img {
			width: 100%;
			height: 100%;
		}
		.admit-card .admit-body {
			background: #7ed6df;
			padding: 10px 15px 3px;
		}

		.admit-card .admit-body table {
			width: 100%;
			font-size: 18px;
		}

		.admit-card .admit-body table td {
			line-height: 1.7em;
		}

		.admit-card .admit-footer {
	font-weight: bold;
	background: #487eb0;
	overflow: hidden;
	padding: 20px 120px 5px 30px;
}
	</style>
  </head>
  <body onload="window.print()">
  <div class="admit-card">
			<div class="admit-head">
				<div class="logo">
					<img src="<?= base_url(); ?>assets/website/img/logo.png">
				</div>
				<div class="title">
					<h2>আদর্শ শিশু বিদ্যালয় নেত্রকোণা</h2>
					<h2>ভর্তি পরীক্ষা</h2>
				</div>
			</div>
			<div class="pic">
				<img src="<?= base_url('uploads/students/'.$applicant['image']); ?>" alt="ছবি" />
			</div>
			<div class="admit-title">
				<h2>প্রবেশ পত্র</h2>
			</div>
			<div class="admit-body">
				<table>
					<tr>
						<td style="width: 110px;">ফর্ম নং </td>
						<td>: <b><?= to_bangla($applicant['id']) ?></b></td>
					</tr>
					<tr>
						<td style="width: 110px;">পরীক্ষার্থীর নাম</td>
						<td>: <b><?= $applicant['name_bn'] ?></b></td>
					</tr>
					<tr>
						<td>পিতার নাম</td>
						<td>: <b><?= $applicant['father_bn'] ?></b></td>
					</tr>
					<tr>
						<td>মাতার নাম</td>
						<td>: <b><?= $applicant['mother_bn'] ?></b></td>
					</tr>
					<tr>
						<td>শ্রেণী :  <b><?= allclass($applicant['addmit_class']) ?></b></td>
						<td> রোল নং: <b style="margin-right: 60px"></b> ভর্তি পরীক্ষার তারিখ : <b style="margin-right: 80px"><?= $time['date_of_admission'] == '' ? '' : to_bangla(date('d-m-Y', strtotime($time['date_of_admission']))) ?></b> সময়  : <b><?= $time['time_of_admission'] == '' ? '' : to_bangla(date('h:i a', strtotime($time['time_of_admission']))) ?></b><td>
					</tr>
				</table>
			</div>
			<div class="admit-footer">
				<div style="float: left">আহ্বায়ক ভর্তি কমিটি</div>
				<div style="float: right">ভারপ্রাপ্ত অধ্যক্ষ</div>
			</div>
		</div>
  </body>
</html>