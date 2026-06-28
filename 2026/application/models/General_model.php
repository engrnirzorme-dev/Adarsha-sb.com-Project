<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

    public function insertData($table = '', $data = array()) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function deleteData($table = '', $where = array()) {
        if ($this->db->delete($table, $where)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function updateData($table = '', $data = array(), $where = array()) {
        $this->db->where($where);
        if ($this->db->update($table, $data)) {
            return $this->db->affected_rows();
        } else {
            return NULL;
        }
    }

    public function selectRow($table = '', $where = array()) {
        $query = $this->db->get_where($table, $where);
        return json_decode(json_encode($query->row()), true);
    }

    public function queryRow($sql, $data = array()) {

        $result = $this->db->query($sql, $data);

        if ($result->num_rows() > 0) {
            return json_decode(json_encode($result->row()), true);
        } else {
            return array();
        }
    }

    public function countData($table = '', $where = array()) {

        $this->db->where($where);
        return $this->db->count_all_results($table);
    }

    public function selectData($table = '', $where = array(), $select = array(), $order = array(), $group = array(), $limit = 0, $start = 0) {

        $this->db->select($select);
        $this->db->where($where);
        $this->db->group_by($group);
        foreach ($order as $key => $val) {
            $this->db->order_by($key, $val);
        }
        if ($limit > 0) {
            $result = $this->db->get($table, $limit, $start);
        } else {
            $result = $this->db->get($table);
        }

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function queryData($sql, $data = array()) {

        $result = $this->db->query($sql, $data);

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }

    public function selectDataPagination($data = array('page' => 1, 'limit' => 10), $table = '', $where = array(), $select = array(), $order = array(), $group = array(), $where_in = array(), $like = array(), $list_id = '', $list_type = TRUE, $like_left=array()) {
        $find = array();

        //Find Data
        if ($this->input->post()) {
            $find = $this->input->post();
        }

        foreach ($find as $key => $val) {
            if (trim($val) == '') {
                unset($find[$key]);
            }
        }
        //End
        //Count Total Data
        $this->db->where($where);
        foreach ($where_in as $field => $indata) {
            $this->db->where_in($field, $indata);
        }
        $this->db->like($find);
        foreach ($like as $field => $likedata) {
            $this->db->like($field, $likedata);
        }
        
        foreach ($like_left as $field => $likedata) {
            $this->db->like($field, $likedata, 'after');
        }
        
        $this->db->group_by($group);
        $data['total'] = $this->db->count_all_results($table);
        //End
        //Select Pagination Data
        $this->db->select($select);
        $this->db->where($where);
        foreach ($where_in as $field => $indata) {
            $this->db->where_in($field, $indata);
        }
        $this->db->like($find);
        foreach ($like as $field => $likedata) {
            $this->db->like($field, $likedata);
        }
        foreach ($like_left as $field => $likedata) {
            $this->db->like($field, $likedata, 'after');
        }
        
        $this->db->group_by($group);
        foreach ($order as $key => $value) {
            $this->db->order_by($key, $value);
        }
        $result = $this->db->get($table, $data['limit'], ($data['page'] - 1) * $data['limit']);
        $data['data'] = $result->result();
        $data['find'] = $find;
        return $data;
    }

}

?>