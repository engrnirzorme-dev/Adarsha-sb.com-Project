<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->School_model->is_user_logged();
        $this->School_model->is_permitted('Setting');
    }

    public function markupload() {
        $data = array(
            'page' => 'admin/mark_upload_find',
            'breadcrumb' => array('Mark Upload' => ''),
            'title' => 'Mark Upload',
            'sub_title' => '',
            'treeview' => 'markupload',
            'class' => $this->General_model->selectData('class'),
            'subject' => $this->General_model->selectData('subject', array(), array(), array('class' => 'asc', 'serial' => 'asc'))
        );
        if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());
            $data['post'] = $post;
            $data['student'] = $this->General_model->selectData('students', array('class' => $post['class'], 'section' => $post['section']), array('id', 'name_bn', 'class', 'class_roll'));
            $data['subject'] = $this->General_model->selectRow('subject', array('id' => $post['subject']));
            $current_year = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');
            $data['mark'] = $this->General_model->queryData("SELECT * FROM `mark` WHERE `class_id`=? AND `year`=? AND `exam`=? AND `sub_code`=? AND `student_id` IN (SELECT `id` FROM `students` WHERE `class`=? AND `section`=?) ", array($post['class'], $current_year, $post['exam'], $data['subject']['code'], $post['class'], $post['section']));
            $data['page'] = 'admin/mark_upload';
        }

        $this->load->view('admin/layout', $data);
    }

    public function updateMark() {
        if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());
            $post['year'] = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');
            if (trim($post['mark']) == "") {
                if (trim($post['id']) != '') {
                    
                    if ($this->General_model->deleteData('mark', array('id' => $post['id']))) {
                        echo 'delete';
                    } else {
                        echo 'Database Error';
                    }
                }else{ 
                    echo 'delete';
                }
            } else {
                if (intval($post['mark']) >= 0 && intval($post['mark']) <= intval($post['full_mark'])) {
                    if (trim($post['id']) == '') {
                        if ($this->General_model->insertData('mark', $post)) {
                            echo 'ok';
                        } else {
                            echo 'Database Error';
                        }
                    } else {
                        if ($this->General_model->updateData('mark', $post, array('id' => $post['id'])) === NULL) {
                            echo 'Database Error';
                        } else {
                            echo 'ok';
                        }
                    }
                } else {
                    echo 'Mark Wrong';
                }
            }
        }
    }

}
