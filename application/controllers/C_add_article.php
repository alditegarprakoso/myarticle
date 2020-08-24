<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class C_add_article extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_login();       
    }
    
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Article / Manage Article';
        if($this->session->userdata('role_id') == 1){
            $authorQuery = "select * from user join article on user.id = article.author";
            $data['data'] = $this->db->query($authorQuery, 1, 10)->result_array();

            $this->load->view('user/article/index', $data);
        }else{
            $authorQuery = "select * from user join article on user.id = article.author where user.id = ". $data['user']['id'];
            $data['data'] = $this->db->query($authorQuery)->result_array();

            $this->load->view('user/article/index', $data);
        }
    }
    
    public function add_article(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "My Article / Form Add Article";
            $this->load->view('user/article/add_article', $data);            
        }
        else {
            $article['title'] = $this->input->post('title');
            $article['content'] = $this->input->post('content');
            $article['url'] = $this->input->post('url');
            date_default_timezone_set('Asia/Jakarta');
            $article['date'] = date('Y-m-d H:i:s');
            $article['author'] = $data['user']['id'];

            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/cover/';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')){
                echo $this->upload->display_errors();
            }
            else{
                $article['cover'] = $this->upload->data()['file_name'];
            }                
                        
            $this->db->insert('article', $article);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Add Article success!</div>');            
            redirect('C_add_article');
        }                
    }

    public function edit_article(){
        $id = $this->input->get('id');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('content', 'Content', 'trim|required');
        $this->form_validation->set_rules('url', 'Url', 'trim|required');
        

        $data['data'] = $this->db->get_where('article', ['id' => $id])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "My Article / Form Edit Article";
            $this->load->view('user/article/edit_article', $data);        
        }
        else {
            $title = $this->input->post('title');
            $content = $this->input->post('content');
            $url = $this->input->post('url');
            date_default_timezone_set('Asia/Jakarta');
            $date = date('Y-m-d H:i:s'); 


            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/cover/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['data']['cover'];
                    if($old_image != NULL ){
                        unlink(FCPATH . '/assets/img/cover/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    
                    $this->db->set('cover', $new_image);        
                }
                else{
                    echo $this->upload->display_errors();                    
                }
            }      
            $this->db->set('title', $title);
            $this->db->set('content', $content);
            $this->db->set('url', $url);
            $this->db->set('date', $date);
            $this->db->where('id', $id);
            $this->db->update('article');

            $this->session->set_flashdata('message', '<div class="alert alert-success">Edit Article success!</div>');            
            redirect('C_add_article');
        }
    }

    public function delete_article(){
        $id = $this->input->get('id');

        $this->db->where('id', $id);
        $this->db->delete('article');
        
        $this->session->set_flashdata('message', '<div class="alert alert-success">Delete Article success!</div>');            
        redirect('C_add_article');
    }
}
