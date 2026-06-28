<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	
    	<title>Merit List</title>
        <link rel="stylesheet" href="<?= base_url('assets/school/css/front.css') ?>" />
    	<style>
    		.print {
    			width: 770px;
    			height: 1022px;
    			overflow: hidden;
    			page-break-after: always;
    			margin: auto;
    			font-family: kalpurush;
    		}
    		.print .title {
    		    margin: 10px 0 15px;
    		    text-align: center;
    		}
    		.print .title h2,
    		.print .title h3 {
    		    margin: 0;
    		    line-height: 1em;
    		}
    		.print table {
    			border-collapse: collapse;
    			width: 100%;
    		}
    		.print table tr th, .print table tr td {
    			border: 1px solid #000 !important;
    			vertical-align: middle !important;
    			font-size: 14px;
    			line-height: 1.4em;
    			padding: 3px;
    			text-align: center;
    		}
    		@page{
                    size: auto;
                    margin: 3mm;
                }
    	</style>
    </head>
    <body onload="window.print()">
        <?php
            $sl=1; 
            $per_page=35;
        
        ?>
        <?php 
        foreach($students as $row){ 
            $result=json_decode($row->result, true);

            if($sl%$per_page==1){
                echo page_header();
            }
        ?>
			<tr>
				<td><?= $row->name_bn ?></td>
				<td><?= to_bangla($row->mark) ?></td>
				<td><?= gla($row->gpa) ?></td>
				<td><?= to_bangla($row->gpa) ?></td>
				<td><?= to_bangla($sl) ?></td>
				<td></td>
				<td></td>
			</tr>
        <?php 
            if($sl%$per_page==0 || $sl==count($students)){
                echo page_footer();
            }
            $sl++;
        } 
        ?>
    </body>
</html>


<?php 
function page_header(){

    $str='
    	<div class="print">
    	    <div class="title">
    	    <h2>আদর্শ শিশু বিদ্যালয়, নেত্রকোণা</h2>
    	    <h3>'.to_bangla(date("2024")).' শিক্ষা বর্ষের '. allclass($_POST['class']) .         ' শ্রেণী ছাত্র/ছাত্রীর মেধা তালিকা</h3>
    	    </div>
    		<table>
    			<tr>
    				<th style="width: 40%">ছাত্র-ছাত্রীর নাম</th>
    				<th style="width: 10%">মোট নম্বর</th>
    				<th style="width: 10%">গ্রেড</th>
    				<th style="width: 10%">পয়েন্ট</th>
    				<th style="width: 10%">মেধা স্থান</th>
    				<th style="width: 10%">রোল</th>
    				<th style="width: 10%">শাখা</th>
    			</tr>
    ';
    return $str;
}


function page_footer(){
    $str='
    		</table>
    	</div>
    ';
    
    return $str;
}
?>