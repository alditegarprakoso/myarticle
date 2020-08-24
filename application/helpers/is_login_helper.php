<?php

function is_login(){
    
    $ci = get_instance();
    
    if(!$ci->session->userdata('email')){  
        redirect('C_article/login');        
    }
}