<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    private $head_topic_label           = 'Dashboard';

    public function index()
    {
        $data['head_topic_label'] = $this->head_topic_label;
        $data['content'] = 'dashboard_admin';
        $this->load->view('template_layout', $data);
    }
}
