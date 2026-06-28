<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!in_array($this->router->fetch_method(), array('login', 'logout'))) {
            $this->School_model->is_user_logged();
        }
    }

    public function index() {
        $data = array(
            'title' => 'Dashboard',
            'page' => 'admin/dashboard',
            'treeview' => 'dashboard',
            'totalstud' => $this->db->count_all('students'),
            'total1' => $this->db->where(['class' => 1])->from("students")->count_all_results(),
            'total2' => $this->db->where(['class' => 2])->from("students")->count_all_results(),
            'total3' => $this->db->where(['class' => 3])->from("students")->count_all_results(),
            'total4' => $this->db->where(['class' => 4])->from("students")->count_all_results(),
            'total5' => $this->db->where(['class' => 5])->from("students")->count_all_results(),
            'total6' => $this->db->where(['class' => 6])->from("students")->count_all_results(),
            'total7' => $this->db->where(['class' => 7])->from("students")->count_all_results(),
            'total8' => $this->db->where(['class' => 8])->from("students")->count_all_results(),
        );
        $this->load->view('admin/layout', $data);
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

    // Students
    public function addstudent() {
        if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());

            $this->form_validation->set_rules('name_bn', ' ', 'trim|required');
            $this->form_validation->set_rules('class', ' ', 'trim|required');
            $this->form_validation->set_rules('section', ' ', 'trim|required');
            $this->form_validation->set_rules('class_roll', ' ', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $insertData = $this->security->xss_clean($this->input->post());

                $subject_result = $this->General_model->selectData('subject', array('class' => $insertData['class']), array(), array('serial' => 'asc'));
                $subject = array();
                foreach ($subject_result as $subject_row) {
                    $subject[] = $subject_row->code;
                }
                $insertData['subject'] = implode(",", $subject);

                if ($_FILES['image']['name'] == NULL) {
                    $insertData['year'] = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');
                    $this->General_model->insertData('students', $insertData);
                    $this->session->set_flashdata('insertMesg', '<div class="alert btn-primary"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Student Information Save Successfully.</div> ');
                    redirect('admin/addstudent');
                } else {
                    $image = $this->image_upload();
                    if ($image === false) {
                        
                    } else {
                        $insertData['image'] = $image;
                        $insertData['year'] = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');
                        $this->General_model->insertData('students', $insertData);
                        $this->session->set_flashdata('insertMesg', '<div class="alert btn-primary"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Student Information Save Successfully.</div> ');
                        redirect('admin/addstudent');
                    }
                }
            }
        }

        $data = array(
            'breadcrumb' => array('Student' => 'admin/addstudent', 'Add' => ''),
            'title' => 'Student',
            'sub_title' => 'Add',
            'page' => 'admin/add_student',
            'treeview' => 'student',
            'treeview_menu' => 'add_student',
            'class' => $this->General_model->selectData('class')
        );
        $this->load->view('admin/layout', $data);
    }

    public function allstudents($class = '') {
        $where = array();
        if (trim($class) != '') {
            $where['class'] = $class;
        }
        $data = array(
            'breadcrumb' => array('Students' => 'admin/allstudents', 'List' => ''),
            'title' => 'Students',
            'sub_title' => 'List',
            'page' => 'admin/all-students',
            'treeview' => 'student',
            'treeview_menu' => 'all_students',
            'students' => $this->General_model->selectData('students', $where, array('id', 'name_bn', 'class', 'section', 'class_roll', 'image'), array('class' => 'ASC', 'section' => 'ASC', 'class_roll' => 'ASC' ))
        );
        $this->load->view('admin/layout', $data);
    }

    public function viewstudent($id) {
        $data = array(
            'breadcrumb' => array('Student Info' => 'admin/viewstudent'),
            'title' => 'Student',
            'page' => 'admin/view-student',
            'treeview' => 'student',
            'treeview_menu' => 'all_students',
            'student' => $this->General_model->selectRow('students', array('id' => $id))
        );
        $this->load->view('admin/layout', $data);
    }

    public function editstudent($id) {
        if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());

            $this->form_validation->set_rules('name_bn', ' ', 'trim|required');
            $this->form_validation->set_rules('class', ' ', 'trim|required');
            $this->form_validation->set_rules('section', ' ', 'trim|required');
            $this->form_validation->set_rules('class_roll', ' ', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $insertData = $this->security->xss_clean($this->input->post());

                $subject_result = $this->General_model->selectData('subject', array('class' => $insertData['class']), array(), array('serial' => 'asc'));
                $subject = array();
                foreach ($subject_result as $subject_row) {
                    $subject[] = $subject_row->code;
                }
                $insertData['subject'] = implode(",", $subject);

                if ($_FILES['image']['name'] == NULL) {
                    $this->General_model->updateData('students', $insertData, array('id' => $id));
                    $this->session->set_flashdata('updateMesg', '<div class="alert btn-primary"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Student Information Update Successfully.</div> ');
                    redirect('admin/allstudents');
                } else {
                    $image = $this->image_upload();
                    if ($image === false) {
                        
                    } else {
                        $insertData['image'] = $image;
                        $this->General_model->updateData('students', $insertData, array('id' => $id));
                        $this->session->set_flashdata('updateMesg', '<div class="alert btn-primary"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Student Information Update Successfully.</div> ');
                        redirect('admin/allstudents');
                    }
                }
            }
        }

        $data = array(
            'breadcrumb' => array('Student' => 'admin/editstudent/' . $id, 'Update' => ''),
            'title' => 'Update Student',
            'sub_title' => 'Update',
            'page' => 'admin/update-student',
            'treeview' => 'student',
            'treeview_menu' => 'add_student',
            'class' => $this->General_model->selectData('class'),
            'info' => $this->General_model->selectRow('students', array('id' => $id))
        );
        $this->load->view('admin/layout', $data);
    }

    public function deletestudent($id) {
        $this->General_model->deleteData('students', array('id' => $id));
        $this->General_model->deleteData('mark', array('student_id' => $id));
        $this->session->set_flashdata('deleteMesg', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Student Information Delete Successfully.</div> ');
        redirect('admin/allstudents');
    }

    public function applicantstudents() {

        $data = array(
            'breadcrumb' => array('Applicant Students' => 'admin/applicantstudents', 'List' => ''),
            'title' => 'Applicant Students',
            'sub_title' => 'List',
            'page' => 'admin/applicant-students',
            'treeview' => 'applicant',
            'students' => $this->General_model->selectData('admission', array(), array(), array('id' => 'DESC'))
        );
        $this->load->view('admin/layout', $data);
    }

    public function applicant($id = '') {
        $data = array(
            'breadcrumb' => array('Applicant' => 'admin/applicant'),
            'title' => 'Applicant',
            'page' => 'admin/applicant',
            'treeview' => 'applicant',
            'applicant' => $this->General_model->selectRow('admission', array('id' => $id))
        );
        $this->load->view('admin/layout', $data);
    }

    public function addappstud($id = '') {
        $applicant = $this->General_model->selectRow('admission', array('id' => $id));
        $applicant['class'] = $applicant['addmit_class'];
        $applicant['year'] = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');

        unset($applicant['id']);
        unset($applicant['old_school_name']);
        unset($applicant['addmit_class']);
        $this->General_model->insertData('students', $applicant);

        $this->General_model->deleteData('admission', array('id' => $id));
        $this->session->set_flashdata('updateMesg', '<div class="alert btn-primary"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>যোক করা হয়েছে।</div> ');
        redirect('admin/allstudents');
    }

    public function printadmit($id = '') {
        $data = array(
            'applicant' => $this->General_model->selectRow('admission', array('id' => $id)),
            'time' => $this->General_model->selectRow('setting', array('id' => 1))
        );
        $this->load->view('admin/printadmit', $data);
    }

    public function deleteapp($id) {
        $this->General_model->deleteData('admission', array('id' => $id));
        $this->session->set_flashdata('deleteMesg', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Delete Successfully.</div> ');
        redirect('admin/applicantstudents');
    }

    public function makeResult() {
        $data = $this->General_model->selectData('students', array(), array(), array('class' => 'asc', 'section' => 'asc', 'class_roll' => 'asc'));

        //Subject Load Start
        $subjectData = $this->General_model->selectData('subject');
        $subject = array();
        foreach ($subjectData as $srow) {
            $subject[$srow->class . '_' . $srow->code] = json_decode(json_encode($srow), TRUE);
        }
        //Subject Load End
        //Max Mark Load Start
        $maxData = $this->General_model->queryData("SELECT `year`, class_id, exam, sub_code, type, MAX(mark) as mark, full_mark FROM  mark WHERE `year`=? GROUP BY `year`, class_id, exam, sub_code, type", array((date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y')));
        $max = array();
        foreach ($maxData as $mxrow) {
            $max[$mxrow->class_id . '_' . $mxrow->year . '_' . $mxrow->sub_code . '_' . $mxrow->exam . '_' . $mxrow->type] = $mxrow;
        }
        //Max Mark Load End
        //Mark Load Start
        $markData = $this->General_model->selectData('mark', array('year' => (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y')));
        $mark = array();
        foreach ($markData as $mrow) {
            $mark[$mrow->class_id . '_' . $mrow->year . '_' . $mrow->student_id . '_' . $mrow->sub_code . '_' . $mrow->exam . '_' . $mrow->type] = $mrow;
        }
        //Mark Load End

        foreach ($data as $row) {
            $result = array();
            $result[5][100] = 0;
            foreach (exam() as $exam_id => $exam_name) {
                $result[$exam_id]['total_sub'] = 0;
                $result[$exam_id]['total_gp'] = 0;
                $result[$exam_id]['gpa_status'] = TRUE;
                $result[$exam_id][5][1] = 0;
                $result[$exam_id][5][4] = 0;
                foreach (explode(",", $row->subject) as $sub_code) {
                    $result[$exam_id][$sub_code][4][1] = 0;
                    $result[$exam_id][$sub_code][4][3] = 0;
                    $result[$exam_id][$sub_code][4][5] = 0;
                    $result[$exam_id][$sub_code][4][4] = 0;
                    foreach (mark_type() as $type_id => $type_name) {
                        //$result[$sub_code][$type_id][100] = 0;

                        $subject_key = $row->class . '_' . $sub_code;
                        $mark_key = $row->class . '_' . $row->year . '_' . $row->id . '_' . $sub_code . '_' . $exam_id . '_' . $type_id;
                        $max_key = $row->class . '_' . $row->year . '_' . $sub_code . '_' . $exam_id . '_' . $type_id;
                        if (isset($subject[$subject_key]) && $subject[$subject_key]['full_' . $type_id] > 0) {
                            $result[$exam_id][$sub_code][$type_id][2] = isset($max[$max_key]) ? $max[$max_key]->mark : 'A';

                            $result[$exam_id][$sub_code][$type_id][3] = $subject[$subject_key]['full_' . $type_id];
                            $result[$exam_id][$sub_code][4][3] += $subject[$subject_key]['full_' . $type_id];

                            if (isset($mark[$mark_key])) {
                                $result[$exam_id][$sub_code][4][1] += $mark[$mark_key]->mark;
                                $result[$exam_id][$sub_code][$type_id][1] = $mark[$mark_key]->mark;
                                $result[$exam_id][$sub_code][4][5] += $mark[$mark_key]->mark;
                                $result[$exam_id][5][1] += $mark[$mark_key]->mark;

                                //Parcent Mark Calculation
                                $mark_per = mark_per($mark[$mark_key]->mark, $exam_id);
                                $result[$exam_id][$sub_code][$type_id][4] = $mark_per;
                                $result[$exam_id][$sub_code][4][4] += $mark_per;
                                $result[$exam_id][5][4] += $mark_per;

                                if (!isset($result[$sub_code][$type_id][100])) {
                                    $result[$sub_code][$type_id][100] = 0;
                                }
                                $result[$sub_code][$type_id][100] += $mark_per;

                                if (!isset($result[$sub_code][4][100])) {
                                    $result[$sub_code][4][100] = 0;
                                }
                                $result[$sub_code][4][100] += $mark_per;
                                $result[5][100] += $mark_per;
                                //End
                            } else {
                                $result[$exam_id][$sub_code][$type_id][1] = 'A';
                                $result[$exam_id][$sub_code][$type_id][4] = 'A';
                            }
                        } else {
                            $result[$exam_id][$sub_code][$type_id][1] = 'X';
                            $result[$exam_id][$sub_code][$type_id][2] = 'X';
                            $result[$exam_id][$sub_code][$type_id][3] = 0;
                            $result[$exam_id][$sub_code][$type_id][4] = 'X';
                        }
                    }
                    $sub_gl = gl($result[$exam_id][$sub_code][4][3], $result[$exam_id][$sub_code][4][5]);
                    $sub_gp = gp($sub_gl);

                    $result[$exam_id][$sub_code][4][6] = $sub_gl;
                    $result[$exam_id][$sub_code][4][7] = $sub_gp;
                    $result[$exam_id]['total_gp'] += $sub_gp;
                    if ($sub_gp < 1) {
                        $result[$exam_id]['gpa_status'] = FALSE;
                    }
                    $result[$exam_id]['total_sub'] ++;
                }
                $result[$exam_id]['gpa'] = number_format((float) ($result[$exam_id]['gpa_status'] ? $result[$exam_id]['total_gp'] / $result[$exam_id]['total_sub'] : 0.00), 2, '.', '');
            }
            $gp_total = 0;
            $sub_total = 0;
            $gpa_status = TRUE;
            $result[5][0]=0;
            foreach (explode(",", $row->subject) as $sub_code) {
                $subject_key = $row->class . '_' . $sub_code;

                if (!isset($result[$sub_code][4][100])) {
                    $result[$sub_code][4][100] = 0;
                }
                $subrow = $subject[$subject_key];
                $subfull=$subrow['full_1'] + $subrow['full_2'] + $subrow['full_3'];
                $result[$sub_code][5][0]=$subfull;
                $result[5][0]+=$subfull;
                
                $sub_gl_100 = gl($subfull, $result[$sub_code][4][100]);
                $sub_gp_100 = gp($sub_gl_100);
                $result[$sub_code][4][6] = $sub_gl_100;
                $result[$sub_code][4][7] = $sub_gp_100;
                $gp_total += $sub_gp_100;
                $sub_total++;
                if ($sub_gp_100 < 1) {
                    $gpa_status = FALSE;
                }
            }
            $gpa = number_format((float) ($gpa_status ? ($gp_total / $sub_total) : 0.00), 2, '.', '');

            $this->General_model->updateData('students', array('result' => json_encode($result), 'gpa' => $gpa, 'mark'=>$result[5][100]), array('id' => $row->id));
        }
        $this->session->set_flashdata('updateMesg', '<div class="alert btn-success"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>ফলাফল সফলভাবে তৈরি হয়েছে</div> ');
        redirect('admin/allstudents');
    }

    public function markuploadsingle($id = '') {
        $row = $this->General_model->selectRow('students', array('id' => $id));
        if (count($row) == 0) {
            redirect('admin/allstudents');
            exit;
        }
        $data = array(
            'breadcrumb' => array('Students' => 'admin/allstudents', 'Mark Upload' => ''),
            'title' => 'Student',
            'sub_title' => 'Mark Upload',
            'page' => 'admin/mark-upload-single',
            'treeview' => 'student',
            'treeview_menu' => 'all_students',
            'row' => $row,
            'subject' => $this->General_model->selectData('subject', array('class' => $row['class'])),
            'mark' => $this->General_model->selectData('mark', array('student_id' => $row['id'], 'year' => (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y'), 'class_id' => $row['class']))
        );

        $this->load->view('admin/layout', $data);
    }

    public function markUpload() {
        $data = array(
            'page' => 'admin/mark_upload_find',
            'breadcrumb' => array('Mark Upload' => ''),
            'title' => 'Mark Upload',
            'sub_title' => '',
            'treeview' => 'markupload',
            'class' => $this->General_model->selectData('class'),
            'subject' => $this->General_model->selectData('subject', array(), array(), array('class' => 'asc', 'serial' => 'asc'))
        );
        if ($this->input->post('mark')) {
            if ($this->input->post()) {
                $post = $this->security->xss_clean($this->input->post());
                $data['post'] = $post;
                $data['student'] = $this->General_model->selectData('students', array('class' => $post['class'], 'section' => $post['section']), array('id', 'name_bn', 'class', 'class_roll'), array('class' => 'ASC', 'section' => 'ASC', 'class_roll' => 'ASC' ));
                $data['subject'] = $this->General_model->selectRow('subject', array('id' => $post['subject']));
                $current_year = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');
                $data['mark'] = $this->General_model->queryData("SELECT * FROM `mark` WHERE `class_id`=? AND `year`=? AND `exam`=? AND `sub_code`=? AND `student_id` IN (SELECT `id` FROM `students` WHERE `class`=? AND `section`=?) ", array($post['class'], $current_year, $post['exam'], $data['subject']['code'], $post['class'], $post['section']));
                $data['page'] = 'admin/mark_upload';
            }
        }
        $this->load->view('admin/layout', $data);
    }

    public function updateMark() {
        
        if ($this->input->post()) {
            $output=array('status'=>0, 'msg'=>'');
            $post = $this->security->xss_clean($this->input->post());
            $post['year'] = (date('m') == 1 && date('d') == 1) ? (date('Y') - 1) : date('Y');
            if (trim($post['mark']) == "") {
                if (trim($post['id']) != '') {

                    if ($this->General_model->deleteData('mark', array('id' => $post['id']))) {
                        $output['status']=2;
                        $output['msg']='Deleted';
                    } else {
                        $output['status']=0;
                        $output['msg']='Database Error';
                    }
                } else {
                    $output['status']=2;
                    $output['msg']='Deleted';
                }
            } else {
                if (intval($post['mark']) >= 0 && intval($post['mark']) <= intval($post['full_mark'])) {
                    if (trim($post['id']) == '') {
                        $insertID=$this->General_model->insertData('mark', $post);
                        if ($insertID) {
                            $output['status']=1;
                            $output['msg']='Insert Success';
                            $output['insertID']=$insertID;
                        } else {
                            $output['status']=0;
                            $output['msg']='Database Error';
                        }
                    } else {
                        if ($this->General_model->updateData('mark', $post, array('id' => $post['id'])) === NULL) {
                            $output['status']=0;
                            $output['msg']='Database Error';
                        } else {
                            $output['status']=1;
                            $output['msg']='Update Success';
                        }
                    }
                } else {
                    $output['status']=0;
                    $output['msg']='Mark Wrong';
                }
            }
            echo json_encode($output);
        }
    }

    public function marksheet() {
        $data = array(
            'breadcrumb' => array('Marksheet' => ''),
            'title' => 'Marksheet',
            'sub_title' => '',
            'page' => 'admin/marksheet',
            'treeview' => 'marksheet',
            'class' => $this->General_model->selectData('class'),
        );

        $this->load->view('admin/layout', $data);
    }

    public function printmarksheet() {
        if ($this->input->post()) {
            if ($this->input->post('exam')) {
                $post = $this->security->xss_clean($this->input->post());
                $data = array(
                    'post' => $post,
                    'students' => $this->General_model->selectData('students', array('class' => $post['class'], 'section' => $post['section']), array('id', 'name_bn', 'class', 'year', 'class_roll', 'section', 'subject', 'result', 'gpa'), array('class' => 'ASC', 'section' => 'ASC', 'class_roll' => 'ASC' )),
                    'subject' => $this->General_model->selectData('subject', array('class' => $post['class']))
                );
                $this->load->view('admin/printmarksheet', $data);
            } else {
                redirect('admin/marksheet');
            }
        } else {
            redirect('admin/marksheet');
        }
    }
    
    
    
    public function meritlist() {
        $data = array(
            'breadcrumb' => array('Merit List' => ''),
            'title' => 'Merit List',
            'sub_title' => '',
            'page' => 'admin/meritlist',
            'treeview' => 'meritlist',
            'class' => $this->General_model->selectData('class'),
        );

        $this->load->view('admin/layout', $data);
    }
    
    public function printmeritlist() {
        if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());
            $data = array(
                'class' => $post['class'],
                'students' => $this->General_model->selectData('students', array('class' => $post['class']), array('id', 'name_bn', 'class', 'year', 'class_roll', 'section', 'subject', 'result', 'gpa', 'mark'), array('gpa' => 'DESC', 'mark'=>'DESC', 'section'=>'ASC', 'class_roll'=>'asc' )),
            );
            $this->load->view('admin/printmeritlist', $data);
        } else {
            redirect('admin/meritlist');
        }
    }
    
    public function emptymark(){
        $this->School_model->emptymark();
        $this->session->set_flashdata('deleteMesg', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Delete Successfully.</div> ');
        redirect('admin');
    }

    public function admitcard() {
        $data = array(
            'breadcrumb' => array('Admit Card' => ''),
            'title' => 'Admit Card',
            'sub_title' => '',
            'page' => 'admin/admitcard',
            'treeview' => 'admitcard',
            'class' => $this->General_model->selectData('class'),
        );

        $this->load->view('admin/layout', $data);
    }

    public function printadmitcard() {
        if ($this->input->post()) {
            $post = $this->security->xss_clean($this->input->post());
            $data = array(
                'post' => $post,
                'students' => $this->General_model->selectData('students', array('class' => $post['class'], 'section' => $post['section']), array('name_bn', 'class', 'class_roll', 'section')),
            );
            $this->load->view('admin/printadmitcard', $data);
        } else {
            redirect('admin/admitcard');
        }
    }

    public function setting() {
        // ডেটাবেস থেকে সেটিংস লোড করা
        $publish_settings = $this->General_model->selectRow('publish', array('id' => 1));
        $admin_user = $this->General_model->selectRow('users', array('id' => 2)); // অ্যাডমিন ইউজার আইডি 2 ধরা হয়েছে

        // ১. ভর্তি পরীক্ষার সময় আপডেট
        if ($this->input->post('admissiontime')) {
            $updateData['date_of_admission'] = $this->input->post('date_of_admission');
            $updateData['time_of_admission'] = $this->input->post('time_of_admission');

            $this->General_model->updateData('setting', $updateData, array('id' => 1));
            $this->session->set_flashdata('updateMesg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>ভর্তি পরীক্ষার তথ্য সফলভাবে আপডেট হয়েছে।</div>');
            redirect('admin/setting');
        }

        // ২. অ্যাডমিন পাসওয়ার্ড পরিবর্তন
        if ($this->input->post('change_password')) {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($admin_user['password'] == md5('M1' . $current_password . 'z$')) {
                if ($new_password == $confirm_password) {
                    $updateData['password'] = md5('M1' . $new_password . 'z$');
                    $this->General_model->updateData('users', $updateData, array('id' => 2));
                    $this->session->set_flashdata('updateMesgPass', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>সফলভাবে পাসওয়ার্ড পরিবর্তন হয়েছে।</div>');
                } else {
                    $this->session->set_flashdata('errorMesgPass', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>নতুন পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মেলেনি।</div>');
                }
            } else {
                $this->session->set_flashdata('errorMesgPass', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>আপনার বর্তমান পাসওয়ার্ডটি ভুল।</div>');
            }
            redirect('admin/setting');
        }
        
        // ৩. রেজাল্ট পাবলিশ ON
        if ($this->input->post('result_publish_on')) {
            $password = $this->input->post('publish_on_pass');
            if ($publish_settings['publish_pass'] == md5($password)) {
                $updateData['status'] = 1;
                $this->General_model->updateData('publish', $updateData, array('id' => 1));
                $this->session->set_flashdata('updateMesgPublish', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>সফলভাবে রেজাল্ট পাবলিশ করা হয়েছে।</div>');
            } else {
                $this->session->set_flashdata('errorMesgPublish', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>রেজাল্ট চালু করার পাসওয়ার্ডটি ভুল।</div>');
            }
            redirect('admin/setting');
        }

        // ৪. রেজাল্ট পাবলিশ OFF
        if ($this->input->post('result_publish_off')) {
            $password = $this->input->post('publish_off_pass');
            $notice = $this->input->post('result_off_notice');

            if ($publish_settings['publish_off_pass'] == md5($password)) {
                $updateData['status'] = 0;
                $updateData['result_off_notice'] = $notice;
                $this->General_model->updateData('publish', $updateData, array('id' => 1));
                $this->session->set_flashdata('updateMesgPublish', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>সফলভাবে রেজাল্ট পাবলিশ বন্ধ করা হয়েছে।</div>');
            } else {
                $this->session->set_flashdata('errorMesgPublish', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>রেজাল্ট বন্ধ করার পাসওয়ার্ডটি ভুল।</div>');
            }
            redirect('admin/setting');
        }

        // ভিউ এর জন্য ডেটা প্রস্তুত করা
        $data = array(
            'breadcrumb' => array('Setting' => 'admin/setting'),
            'title' => 'Setting',
            'sub_title' => '',
            'page' => 'admin/setting',
            'treeview' => 'setting',
            'time' => $this->General_model->selectRow('setting', array('id' => 1)),
            'publish_settings' => $publish_settings
        );
        
        $this->load->view('admin/layout', $data);
    }
    
    public function login() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                if ($this->School_model->login_check()) {
                    redirect('admin');
                } else {
                    redirect('admin/login');
                }
            }
        }
        $this->load->view('admin/login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}