<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
    
    public function index()
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/edit', $data);
        } 
        else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang di upload
            $upload_image = $_FILES['image']; // $_FILES['image'] itu ngambil dari inputan file yang namenya = image
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.svg'){
                        unlink(FCPATH . '/assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);        
                }
                else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success">Update success!</div>');            
            redirect('edit');
        }
    }

    public function edit_password()
    {
        $data['title'] = "Change Password";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('currentpassword', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('newpassword1', 'New Password', 'trim|required|min_length[3]|matches[newpassword2]');
        $this->form_validation->set_rules('newpassword2', 'Confirm New Password', 'trim|required|min_length[3]|matches[newpassword1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/edit_password', $data);
        } 
        else{
            $currentPassword = $this->input->post('currentpassword');
            $newPassword = $this->input->post('newpassword1');
            if(!password_verify($currentPassword, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Wrong current password !</div>');                
                redirect('edit/edit_password');                
            }
            else{
                if($currentPassword == $newPassword){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">New password cannot be the same as current password !</div>');
                    redirect('edit/edit_password');                
                }
                else{
                    //password ok
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success">Change password success !</div>');
                    redirect('edit/edit_password');                
                }

            }
        }
    }
}