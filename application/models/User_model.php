<?php

class User_model extends CI_Model{
  
    public function register($enc_password){
        // User data array
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
        );

        // Insert user
        $this->db->insert('users', $data);
        return $this->db->insert_id();

    }

    // Log user in
    public function login($username, $password){
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0)->id_user;
        } else {
            return false;
        }
    }

    // Check username exists
    public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email){
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    // Check data exists
    public function check_data($id){
        $query = $this->db->get_where('table_data', array('user_id' => $id));
        if(!empty($query->row_array())){
            return true;
        } else {
            return false;
        }
    }

    public function get_data_user($id){
        return $this->db->get_where('table_data', ["user_id" => $id])->row();
    }

    public function get_data_register($id){
        return $this->db->get_where('users', ["id_user" => $id])->row();
    }

    public function insertdata($data) {
        $this->db->insert('table_data', $data); 
        return ($this->db->affected_rows() > 0);
    }

    public function updatedata($id, $data) { 
        $this->db->where('id', $id); 
        $this->db->update('table_data', $data); 
        return ($this->db->affected_rows() > 0);
    }

 }