<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	
	private function image_upload() {

        $file_name = explode('.', $_FILES['image']['name']);
        $file_ext = end($file_name);
        $file_name = time() . date('Ymdhms.') . $file_ext;

        $config['file_name'] = $file_name;
        $config['upload_path'] = './uploads/students/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '200';
        $config['max_height'] = '200';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $data = $this->upload->data();
            return $file_name;
        } else {
            $image_upload_error = $this->upload->display_errors();
            $this->session->set_flashdata('errorMesg', '<div class="alert btn-danger"><a href="javascript:void(0)" class="close" data-dismiss="alert">&times;</a>' . $image_upload_error . '</div> ');
			return false;
        }
    }

    public function admissionform() {
		if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());

            $this->form_validation->set_rules('name_bn', ' ', 'trim|required');
            // ... (আপনার অন্যান্য validation rules এখানে থাকবে) ...
            $this->form_validation->set_rules('addmit_class', ' ', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
				$insertData = $this->input->post();
				$image = $this->image_upload();
				if($image===false){ 
					
				}else{
					$insertData['image']=$image;
					$appId = $this->General_model->insertData('admission', $insertData);
					$this->session->set_flashdata('insertMesg', '<div class="alert btn-primary"><a href="javascript:void(0)" class="close" data-dismiss="alert">&times;</a>You Application Submite Successfully. Application Id '.$appId.' </div> ');
					redirect('admission');
				}
            }
        }
		
		$data = array(
			'class' => $this->General_model->selectData('class')
		);
		
        $this->load->view('public/admission-form', $data);
    }
	
	
	public function result(){
        // publish টেবিল থেকে অন/অফ স্ট্যাটাস ও নোটিশ আনা হয়েছে
        $publish_data = $this->General_model->selectRow('publish', array('id' => 1));

        $data = array(
            'class' => $this->General_model->selectData('class'),
            // ভিউ ফাইলে ব্যবহারের জন্য এই দুটি ভ্যারিয়েবল পাঠানো হচ্ছে
            'result_publish_status' => isset($publish_data['status']) ? $publish_data['status'] : 0,
            'result_off_notice'     => isset($publish_data['result_off_notice']) ? $publish_data['result_off_notice'] : 'রেজাল্ট এখনো প্রকাশ করা হয়নি।'
        );

        $this->load->view('public/result', $data);
	}
	
	public function resultsheet(){
		if($this->input->post()){
			$post = $this->security->xss_clean($this->input->post());
			
            // ছাত্রের তথ্য খোঁজা হচ্ছে
            $student_info = $this->General_model->selectRow('students', array('class' => $post['class'], 'section' => $post['section'], 'class_roll' => $post['class_roll']));

            // যদি ছাত্রকে খুঁজে পাওয়া না যায়, তাহলে মেসেজ দিয়ে ফেরত পাঠানো হবে
            if (empty($student_info)) {
                $this->session->set_flashdata('error_message', '<div class="alert alert-danger text-center">আপনার দেওয়া তথ্য (ক্লাস, সেকশন বা রোল) সঠিক নয়। অনুগ্রহ করে আবার চেষ্টা করুন।</div>');
                redirect('result');
            }

			$data = array(
				'post' => $post,
				'student' => $student_info,
				'subject' => $this->General_model->selectData('subject', array('class' => $post['class']))
			);		
			$this->load->view('public/result_sheet', $data);
		}else{
			redirect('result');
		}
	}
	
}