<?php

//CREATE USER 'double'@'localhost' IDENTIFIED BY 'doublecat123';

class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

//        echo "hello world";
        $data['title'] = ucfirst($page); // Capitalize the first letter
//
        $this->load->view('../views/templates/header', $data);
        $this->load->view('../views/pages/'.$page, $data);
        $this->load->view('../views/templates/footer', $data);
    }
}

