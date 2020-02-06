
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRUD extends CI_Controller
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
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            $data = array(
                'judul' => 'Error',
                'deskripsi' => 'Access'
            );
            $this->template->load('template','errors/html/error_access', $data);
        }
        else
        {
            $data = array(
            'judul'         => "CRUD",
            'deskripsi'     => "Generator",
            );
        $this->template->load('template', 'crud/index', $data);
        }
    }

    public function setting()
    {   
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            // return show_error('You must be an administrator to view this page.');
            $this->template->load('template','errors/html/error_access', $data);
        }
        else
        {
            $data = array(
                'judul'         => "CRUD",
                'deskripsi'     => "Setting",
            );
        }
        
        $this->template->load('template', 'crud/core/setting', $data);
    }

}
