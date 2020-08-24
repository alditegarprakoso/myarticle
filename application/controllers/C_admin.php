<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
    }
    

    public function index()
    {
        $data['title'] = 'My Article / Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $this->load->view('user/admin/index-admin', $data);        
    }

    public function manage_user(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Article / Manage User';        
        $user = "select * from user where role_id = 2";
        $data['data'] = $this->db->query($user)->result_array();

        $this->load->view('user/admin/manage_user', $data);        
    }

    public function edit_user(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->get('id');
        $data['title'] = 'My Article / Edit User';
        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('role_id', 'Role Id', 'trim|required');

        $data['data'] = $this->db->get_where('user', ['id' => $id])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "My Article / Form Edit Article";
            $this->load->view('user/admin/edit_user', $data);            
        }
        else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $role_id = $this->input->post('role_id');

            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->set('role_id', $role_id);
            $this->db->where('id', $id);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success">Edit User success!</div>');
            redirect('C_admin/manage_user');
        }
    }

    public function delete_user(){
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success">Delete User success!</div>');
        redirect('C_admin/manage_user');
    }

    function blank(){
        $this->load->view('user/admin/blank');
    }
}
