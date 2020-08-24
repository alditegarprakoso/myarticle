<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();
    }
    
    public function index()
    {
        $data['title'] = 'My Article / Member';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/member/index-member', $data);        
    }

    function blank(){
        $this->load->view('user/member/blank');        
    }

}
