<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model {
    
    public function is_user_logged(){
        if ($this->session->userdata('username') && trim($this->session->userdata('username')) != '') {
            return TRUE;
        } else {
            redirect('admin/login');
            return FALSE;
        }
    }
    
    
    public function is_permitted($permissionName) {
        if ($this->is_menu_permitted($permissionName)) {
            return TRUE;
        } else {
            redirect('/admin/permissionDenied');
            return FALSE;
        }
    }

    public function is_menu_permitted($permission_name) {
        $permission_id = permission_id($permission_name);
        $permission_array = json_decode($this->session->userdata('permission'));
        if (in_array($permission_id, $permission_array) || $this->session->userdata('username') == "administrator") {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    
    
    public function login_check() {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $query = $this->db->get_where('users', array('username' => $username));

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if ($row->password == md5(secret_password($password))) {
                if ($row->status == 1) {
                    $sessionData = array(
                        'id' => $row->id,
                        'name' => $row->name,
                        'username' => $row->username,
                        'permission' => $row->permission,
                        'logintime' => date('Y-m-d H:i:s'),
                        'photo' => $row->photo
                    );

                    $this->session->set_userdata($sessionData);
                    return TRUE;
                } else {
                    $this->session->set_flashdata('login_error', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Your Account Deactivate.</div>');
                }
            } else {
                $this->session->set_flashdata('login_error', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Invalid Password!</div>');
            }
        } else {
            $this->session->set_flashdata('login_error', '<div class="alert btn-danger"><a href="javascript:avoid(0)" class="close" data-dismiss="alert">&times;</a>Username Not Found!</div>');
        }
        return FALSE;
    }
    
    
	public function findsubject($id){
		$this->db->select("code");
		$this->db->from("subject");
		$this->db->where("class", $id);
		$query = $this->db->get();
		$data = $query->result();
		$subject = array();
		
		$subject = json_decode(json_encode($data), true);
		
		return $subject;
	}
	
	public function emptymark(){
	    $this->db->truncate('mark');
	}
}
