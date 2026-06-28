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
            $this->session->set_flashdata('errorMesg', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>' . $image_upload_error . '</div> ');
			return false;
        }
    }

    public function admissionform() {
		if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());

            $this->form_validation->set_rules('name_bn', ' ', 'trim|required');
            $this->form_validation->set_rules('name_en', ' ', 'trim|required');
            $this->form_validation->set_rules('father_bn', ' ', 'trim|required');
            $this->form_validation->set_rules('father_en', ' ', 'trim|required');
            $this->form_validation->set_rules('mother_bn', ' ', 'trim|required');
            $this->form_validation->set_rules('mother_en', ' ', 'trim|required');
            $this->form_validation->set_rules('permanent_village', ' ', 'trim|required');
            $this->form_validation->set_rules('permanent_post', ' ', 'trim|required');
            $this->form_validation->set_rules('permanent_upazila', ' ', 'trim|required');
            $this->form_validation->set_rules('permanent_zila', ' ', 'trim|required');
            $this->form_validation->set_rules('present_village', ' ', 'trim|required');
            $this->form_validation->set_rules('present_post', ' ', 'trim|required');
            $this->form_validation->set_rules('present_upazila', ' ', 'trim|required');
            $this->form_validation->set_rules('present_zila', ' ', 'trim|required');
            $this->form_validation->set_rules('phone', ' ', 'trim|required');
            $this->form_validation->set_rules('guardian_job', ' ', 'trim|required');
            $this->form_validation->set_rules('annual_income', ' ', 'trim|required');
            $this->form_validation->set_rules('dob', ' ', 'trim|required');
            $this->form_validation->set_rules('old_school_name', ' ', 'trim|required');
            $this->form_validation->set_rules('addmit_class', ' ', 'trim|required');
            //$this->form_validation->set_rules('image', 'image', 'required');

            if ($this->form_validation->run() == TRUE) {
				$insertData = $this->input->post();
				$image = $this->image_upload();
				if($image===false){ 
					
				}else{
					$insertData['image']=$image;
					$appId = $this->General_model->insertData('admission', $insertData);
					$this->session->set_flashdata('insertMesg', '<div class="alert btn-primary"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>You Application Submite Successfully. Application Id '.$appId.' </div> ');
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
		$data = array(
            'class' => $this->General_model->selectData('class')
		);		
        $this->load->view('public/result', $data);
	}
	
	public function resultsheet(){
		if($this->input->post()){
			$post = $this->security->xss_clean($this->input->post());
			$data = array(
				'post' => $post,
				'student' => $this->General_model->selectRow('students', array('class' => $post['class'], 'section' => $post['section'], 'class_roll' => $post['class_roll'])),
				'subject' => $this->General_model->selectData('subject', array('class' => $post['class']))
			);		
			$this->load->view('public/result_sheet', $data);
		}else{
			redirect('result');
		}
	}
	
	
	

}
