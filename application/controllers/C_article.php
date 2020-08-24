<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_article extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->load->model('Article_model');
        
    }

    public function index(){
        $data['title'] = 'My Article';

        $data['data'] = $this->Article_model->getArticle()->result();
        $this->load->view('index', $data);
    }

    public function detailArticle($url){
        $data['title'] = 'My Article';

        $data['data'] = $this->Article_model->getArticleByUrl($url)->result();
        $this->load->view('detail-article', $data);
    }

    public function login(){
        $data['title'] = 'My Article / Login';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]',[
            'min_length' => 'The Password too short.'
        ]);        

        if ($this->form_validation->run() == false) {
            $this->load->view('login', $data);
        }
        else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            
            if($user){
                if($user['is_active'] == 1){
                    if(password_verify($password, $user['password'])){
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];                        
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect('C_admin');
                        }else{
                            redirect('C_member');
                        }
                    }
                    else{
                        $this->session->set_flashdata('message', '<div class="alert alert-warning">Wrong password !</div>');
                        $this->load->view('login', $data);
                    }
                }
                else{
                    $this->session->set_flashdata('message', '<div class="alert alert-warning">Email has not been activated !</div>');
                    $this->load->view('login', $data);
                }
            }
            else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Email is not registered</div>');
                $this->load->view('login', $data);
            }

        }
    }

    public function register(){
        $data['title'] = 'My Article / Register';

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email is already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',[
            'matches' => 'The Password must be the same.',
            'min_length' => 'The Password too short.'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('register', $data);
        }
        else{
            $data = [

                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.svg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => '2',
                'is_active' => '0',
                'date_create' => time()
            ];
            
            // bikin token email
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];
            
            $this->Article_model->addUser($data);
            $this->db->insert('user_token', $user_token);            
            $this->sendEmail($token, 'verify');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success">Congratulation! Your Account has been created. Please Active your Account</div>');
            
            redirect('C_article/login');            
        }
        
    }

    private function sendEmail($token, $type){
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'hikarushiro27@gmail.com',
            'smtp_pass' => 'fezeai021130',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        // $this->load->library('email', $config);        
        $this->email->initialize($config);        
        
        $this->email->from('hikarushiro27@gmail.com', 'Web My Article');
        $this->email->to($this->input->post('email'));

        if($type == 'verify'){
            $this->email->subject('Verification Account');
            $this->email->message('Please click link to Verification your Account : <a href="' . base_url() . 'C_article/verify?email='. $this->input->post('email') .'&token='. urlencode($token) .'">Active</a>');            
        }else if($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Please click link to Reset your Password : <a href="' . base_url() . 'C_article/resetpassword?email='. $this->input->post('email') .'&token='. urlencode($token) .'">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        }else{
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if($user_token){
                if(time() - $user_token['date_created'] < (60*60*24)){
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);                    
                    $this->db->update('user');                    

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Congratulation! Your Account has been created. Please Login</div>');            
                    redirect('C_article/login');            
                }
                else{
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Activation Account Fail! Token Expired</div>');            
                    redirect('C_article/login');            
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Activation Account Fail! Wrong Token</div>');            
                redirect('C_article/login');                
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Activation Account Fail! Wrong Email</div>');            
            redirect('C_article/login');            
        }
    }

    public function resetpassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if($user_token){
                if(time() - $user_token['date_created'] < (60*60*24)){                    
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePassword();
                }
                else{
                    $this->db->delete('user_token', ['email' => $email]);
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Activation Account Fail! Token Expired</div>');            
                    redirect('C_article/login');            
                }
            }
            else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Reset Password Fail! Wrong Token</div>');            
                redirect('C_article/login'); 
            }
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Reset Password Fail! Wrong Email</div>');            
            redirect('C_article/login'); 
        }
        
    }

    public function changePassword(){

        if(!$this->session->userdata('reset_email')){
            redirect('C_article/login');        
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
        
        
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'My Article / Change Password';
            $data['email'] = $this->session->userdata('reset_email');
            $this->load->view('user/change_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            
            $this->db->set('password', $password);
            $this->db->where('email', $email);            
            $this->db->update('user');            

            
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success">Password has been change, please login!</div>');            
            redirect('C_article/login'); 
        }
        
    }

    public function forgot_password(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'My Article / Forgot Password';
            $this->load->view('user/forgot_password', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            
            if($user){
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $this->input->post('email'),
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success">Please check your email to reset your password!</div>');
                redirect('C_article/forgot_password');
                
            }
            else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Email is not registered or activated!</div>');            
            redirect('C_article/forgot_password');

            }
        }
    }

    public function logout(){        
        $this->session->unset_userdata('email');        
        $this->session->unset_userdata('role_id');     
        $this->session->set_flashdata('message', '<div class="alert alert-success">You have been logout</div>');   
        redirect('C_article/login');
    }

}
