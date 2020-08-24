<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {

    public function getArticle()
    {
        return $this->db->get('article');
    }

    public function getArticleByUrl($url)
    {
        return $this->db->get_where('article', array('url' => $url));
    }

    public function addUser($data){
        return $this->db->insert('user', $data);
    }

}