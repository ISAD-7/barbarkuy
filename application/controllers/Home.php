<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
    }

    public function index()
    {   
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            $data = array(
            'judul'         => "Home",
            'deskripsi'     => "Page",
            );
        }

        $this->template->load('template', 'home/index', $data);
    }
}