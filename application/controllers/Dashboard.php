<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $data['content'] = 'dashboard_admin';
        $this->load->view('template_layout', $data);
    }
}
