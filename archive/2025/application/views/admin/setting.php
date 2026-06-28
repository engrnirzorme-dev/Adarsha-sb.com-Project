<style>
   /* ফন্ট সেটিংস: পরিষ্কার বাংলা ফন্ট ব্যবহার করা হয়েছে */
   @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&display=swap');
   body {
       font-family: 'Noto Sans Bengali', Arial, sans-serif;
   }

   /* নতুন রেজাল্ট পাবলিশ কার্ডের ডিজাইন */
   .section-container {
       max-width: 650px; /* সামান্য বড় করা হলো */
       padding: 25px;
       background-color: #f9f9f9;
       border: 2px solid #e0e0e0;
       border-radius: 15px;
       margin: 20px auto;
       box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
       transition: all 0.3s ease;
   }
   .section-container:hover {
       box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
   }
   .section-header {
       font-size: 22px;
       font-weight: 700;
       color: #1a1a1a;
       border-bottom: 2px solid #eee;
       padding-bottom: 10px;
       margin-bottom: 20px;
   }
   .status-bar {
       display: flex;
       align-items: center;
       gap: 15px;
       padding: 15px 20px;
       border-radius: 10px;
       margin-top: 20px;
       animation: fadeIn 0.5s;
   }
   .status-indicator {
       width: 20px;
       height: 20px;
       border-radius: 50%;
       box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
   }
   .status-text {
       font-weight: bold;
       font-size: 18px;
   }
   .notice-area {
       margin-top: 25px;
       padding: 18px;
       background-color: #fef8f8;
       border: 2px dashed #ff8888;
       border-radius: 10px;
       font-size: 16px;
       line-height: 1.6;
       color: #cc0000;
       transition: opacity 0.5s;
   }
   .hidden {
       opacity: 0;
       height: 0;
       padding: 0;
       margin: 0;
       overflow: hidden;
   }

   /* অন্য বক্সগুলির জন্য বেসিক স্টাইল (পূর্বের স্টাইল ঠিক রাখতে) */
   .box {
       border-radius: 5px;
       background: #ffffff;
       border-top: 3px solid #007bff; /* প্রাইমারি কালার */
       margin-bottom: 30px;
       width: 100%;
       box-shadow: 0 2px 4px rgba(0,0,0,0.1);
   }
   .box-danger {
       border-top-color: #dc3545; /* ডেঞ্জার কালার */
   }
   .box-info {
       border-top-color: #17a2b8; /* ইনফো কালার */
   }
   .box-header {
       color: #444;
       display: block;
       padding: 12px;
       position: relative;
       border-bottom: 1px solid #f0f0f0;
   }
   .box-title {
       display: inline-block;
       font-size: 20px;
       margin: 0;
       line-height: 1.2;
       font-weight: 600;
   }
   .box-body {
       padding: 20px;
   }
   .form-group {
       margin-bottom: 20px;
   }
   .control-label {
       font-weight: 700;
       text-align: right;
       padding-right: 15px;
   }
   .btn-block {
       display: block;
       width: 90%;
       margin: 0 auto;
       padding: 12px;
       font-weight: 700;
       border-radius: 8px;
       transition: background-color 0.3s;
   }
   .btn-success {
       background-color: #28a745;
       border-color: #28a745;
       color: white;
   }
   .btn-danger {
       background-color: #dc3545;
       border-color: #dc3545;
       color: white;
   }
   .modal-header {
       border-top-left-radius: 10px;
       border-top-right-radius: 10px;
   }
</style>

<?php
   // কন্ট্রোলার থেকে আসা ডেটা প্রস্তুত করা
   $status = isset($publish_settings['status']) ? $publish_settings['status'] : '0';
   $notice = isset($publish_settings['result_off_notice']) ? $publish_settings['result_off_notice'] : 'নোটিশ সেট করা হয়নি।';
   $isPublished = ($status == '1');

   $date_of_admission = isset($time['date_of_admission']) ? $time['date_of_admission'] : '';
   $time_of_admission = isset($time['time_of_admission']) ? $time['time_of_admission'] : '';
?>

<!-- ========================================================================= -->
<!-- ১. রেজাল্ট পাবলিশ সেটিংস (নতুন স্টাইল এবং পাসওয়ার্ড প্রটেক্টেড) -->
<!-- ========================================================================= -->
<div class="section-container">
   <div class="section-header">
       <i class="fa fa-bullhorn"></i> ফলাফল দেখার অপশন নিয়ন্ত্রণ
   </div>

   <?= $this->session->flashdata('updateMesgPublish'); ?>
   <?= $this->session->flashdata('errorMesgPublish'); ?>
   
   <!-- স্ট্যাটাস বার -->
   <div class="status-bar" id="statusBar" style="background-color: <?= $isPublished ? '#e9f7e9' : '#fcecec' ?>;">
       <div class="status-indicator" style="background-color: <?= $isPublished ? '#2e8b57' : '#cc0000' ?>;"></div>
       <div class="status-text" id="statusText" style="color: <?= $isPublished ? '#2e8b57' : '#cc0000' ?>;">
           বর্তমান স্ট্যাটাস: রেজাল্ট <?= $isPublished ? 'পাবলিশড' : 'বন্ধ' ?> আছে
       </div>
   </div>

   <!-- ON/OFF বাটনগুলি -->
   <div class="row" style="margin-top: 30px;">
       <div class="col-xs-6 text-center" style="float: left; width: 50%;">
           <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#publishOnModal">
               <i class="fa fa-check-circle"></i> রেজাল্ট চালু করুন (ON)
           </button>
       </div>
       <div class="col-xs-6 text-center" style="float: left; width: 50%;">
           <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#publishOffModal">
               <i class="fa fa-times-circle"></i> রেজাল্ট বন্ধ করুন (OFF)
           </button>
       </div>
   </div>
   
   <!-- লাইভ নোটিশ (যদি রেজাল্ট বন্ধ থাকে) -->
   <div class="notice-area <?= $isPublished ? 'hidden' : '' ?>" id="liveNoticeBox">
       📢 <strong>পাবলিক নোটিশ:</strong> <span id="liveNoticeText"><?= html_escape($notice) ?></span>
   </div>
</div>

<!-- ========================================================================= -->
<!-- Modal (পপআপ) ফর রেজাল্ট ON -->
<!-- ========================================================================= -->
<div class="modal fade" id="publishOnModal" tabindex="-1" role="dialog" aria-labelledby="publishOnModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <form method="POST" action="">
       <div class="modal-header bg-success" style="background-color: #28a745; color: white;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:white;">×</span></button>
         <h4 class="modal-title" id="publishOnModalLabel"><i class="fa fa-unlock-alt"></i> রেজাল্ট **চালু** করার পাসওয়ার্ড</h4>
       </div>
       <div class="modal-body">
         <p class="text-bold text-success">⚠️ সতর্কতা: রেজাল্ট চালু করতে গোপন পাসওয়ার্ড দিন।</p>
         <div class="form-group">
           <label for="publish_on_pass">পাসওয়ার্ড</label>
           <input type="password" class="form-control" name="publish_on_pass" id="publish_on_pass" placeholder="রেজাল্ট ON করার পাসওয়ার্ড" required>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">বন্ধ করুন</button>
         <input type="submit" name="result_publish_on" class="btn btn-success" value="রেজাল্ট চালু করুন">
       </div>
     </form>
   </div>
 </div>
</div>

<!-- ========================================================================= -->
<!-- Modal (পপআপ) ফর রেজাল্ট OFF -->
<!-- ========================================================================= -->
<div class="modal fade" id="publishOffModal" tabindex="-1" role="dialog" aria-labelledby="publishOffModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <form method="POST" action="">
       <div class="modal-header bg-danger" style="background-color: #dc3545; color: white;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:white;">×</span></button>
         <h4 class="modal-title" id="publishOffModalLabel"><i class="fa fa-lock"></i> রেজাল্ট **বন্ধ** করার পাসওয়ার্ড</h4>
       </div>
       <div class="modal-body">
         <p class="text-bold text-danger">⚠️ সতর্কতা: রেজাল্ট বন্ধ করতে গোপন পাসওয়ার্ড এবং বন্ধের নোটিশ দিন।</p>
         
         <div class="form-group">
           <label for="publish_off_pass">পাসওয়ার্ড</label>
           <input type="password" class="form-control" name="publish_off_pass" id="publish_off_pass" placeholder="রেজাল্ট OFF করার পাসওয়ার্ড" required>
         </div>

         <div class="form-group">
           <label for="result_off_notice">রেজাল্ট বন্ধের নোটিশ (সর্বোচ্চ ২৫৫ অক্ষর)</label>
           <textarea class="form-control" name="result_off_notice" rows="3" maxlength="255" placeholder="রেজাল্ট বন্ধ থাকলে ওয়েবসাইটে এই নোটিশটি দেখাবে..." required><?= html_escape($notice) ?></textarea>
         </div>

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">বন্ধ করুন</button>
         <input type="submit" name="result_publish_off" class="btn btn-danger" value="রেজাল্ট বন্ধ করুন">
       </div>
     </form>
   </div>
 </div>
</div>


<!-- ========================================================================= -->
<!-- ২. ভর্তি পরীক্ষার সময় ও তারিখ -->
<!-- ========================================================================= -->
<div class="box box-info" style="margin-top: 40px;">
   <div class="box-header with-border">
       <h3 class="box-title"><i class="fa fa-clock-o"></i> প্রবেশপত্রের জন্য ভর্তি পরীক্ষার সময় ও তারিখ</h3>
   </div>
   <div class="box-body">
       <?= $this->session->flashdata('updateMesg'); ?>
       <form class="form-horizontal" method="POST" action="">
           <div class="form-group">
               <label class="col-sm-3 control-label" for="date_of_admission">ভর্তি পরীক্ষার তারিখ</label>
               <div class="col-sm-9">
                   <input type="date" class="form-control" name="date_of_admission" id="date_of_admission" value="<?= html_escape($date_of_admission) ?>" required>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-3 control-label" for="time_of_admission">ভর্তি পরীক্ষার সময়</label>
               <div class="col-sm-9">
                   <input type="time" class="form-control" name="time_of_admission" id="time_of_admission" value="<?= html_escape($time_of_admission) ?>" required>
               </div>
           </div>
           <div class="form-group">
               <div class="col-sm-offset-3 col-sm-9">
                   <input type="submit" name="admissiontime" class="btn btn-primary" value="আপডেট করুন">
               </div>
           </div>
       </form>
   </div>
</div>

<!-- ========================================================================= -->
<!-- ৩. অ্যাডমিন পাসওয়ার্ড পরিবর্তন -->
<!-- ========================================================================= -->
<div class="box box-danger">
   <div class="box-header with-border">
       <h3 class="box-title"><i class="fa fa-key"></i> অ্যাডমিন পাসওয়ার্ড পরিবর্তন</h3>
   </div>
   <div class="box-body">
       <?= $this->session->flashdata('errorMesgPass'); ?>
       <?= $this->session->flashdata('updateMesgPass'); ?>
       <form class="form-horizontal" method="POST" action="">
           <div class="form-group">
               <label class="col-sm-3 control-label" for="current_password">বর্তমান পাসওয়ার্ড</label>
               <div class="col-sm-9">
                   <input type="password" class="form-control" name="current_password" id="current_password" placeholder="বর্তমান পাসওয়ার্ড দিন" required>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-3 control-label" for="new_password">নতুন পাসওয়ার্ড</label>
               <div class="col-sm-9">
                   <input type="password" class="form-control" name="new_password" id="new_password" placeholder="নতুন পাসওয়ার্ড দিন" required>
               </div>
           </div>
           <div class="form-group">
               <label class="col-sm-3 control-label" for="confirm_password">পাসওয়ার্ড নিশ্চিত করুন</label>
               <div class="col-sm-9">
                   <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="পুনরায় নতুন পাসওয়ার্ড দিন" required>
               </div>
           </div>
           <div class="form-group">
               <div class="col-sm-offset-3 col-sm-9">
                   <input type="submit" name="change_password" class="btn btn-danger" value="পাসওয়ার্ড পরিবর্তন করুন">
               </div>
           </div>
       </form>
   </div>
</div>