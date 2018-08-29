<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Page_not_found extends CI_Controller
{

    public function index()
    {
        $data['page'] = site_url('dashboard');
        $data['content'] = 'not_found_page';
        
        $this->load->view('template_layout', $data);
    }
}
