<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
        $this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
    }

    public function index()
    {   
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            // redirect to the access error page if not admin
            $data = array(
                'judul' => 'Error',
                'deskripsi' => 'Access'
            );
            $this->template->load('template','errors/html/error_access', $data);
        }
        else
        {
            $kategori = $this->Kategori_model->get_all();

            $data = array(
                'judul' => 'Kategori',
                'deskripsi' => 'Page',
                'kategori_data' => $kategori
            );
            $this->template->load('template','kategori/kategori_list', $data);
        }
    }

    public function read($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            // redirect to the access error page if not admin
            $data = array(
                'judul' => 'Error',
                'deskripsi' => 'Access'
            );
            $this->template->load('template','errors/html/error_access', $data);
        }
        else
        {
            $row = $this->Kategori_model->get_by_id($id);
            if ($row) 
            {
            $data = array(
                'judul' => 'Kategori',
                'deskripsi' => 'View',
			    'id' => $row->id,
			    'nama_kategori' => $row->nama_kategori,
			    'jenis_kategori' => $row->jenis_kategori,
			    'group_kategori' => $row->group_kategori,
			    'status' => $row->status,
			    'created_date' => $row->created_date,
			    );
            $this->template->load('template','kategori/kategori_read', $data);
            } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->session->set_flashdata('type', 'error');
            redirect(site_url('kategori'));
            }
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            // redirect to the access error page if not admin
            $data = array(
                'judul' => 'Error',
                'deskripsi' => 'Access'
            );
            $this->template->load('template','errors/html/error_access', $data);
        }
        else
        {
            $data = array(
            'judul' => 'Kategori',
            'deskripsi' => 'Create',
            'method' => 'POST',
            'button' => 'Create',
            'action' => site_url('kategori/create_action'),
		    'id' => set_value('id'),
		    'nama_kategori' => set_value('nama_kategori'),
		    'jenis_kategori' => set_value('jenis_kategori'),
		    'group_kategori' => set_value('group_kategori'),
		    'status' => set_value('status'),
		    'created_date' => set_value('created_date'),
			);
        }
        $this->template->load('template','kategori/kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('type', 'warning');
            $this->create();
            redirect(site_url('kategori/create'));
        } else {
            $data = array(
		    'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		    'jenis_kategori' => $this->input->post('jenis_kategori',TRUE),
		    'group_kategori' => $this->input->post('group_kategori',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'created_date' => $this->input->post('created_date',TRUE),
		    );

            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url('kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_model->get_by_id($id);
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            // redirect to the access error page if not admin
            $data = array(
                'judul' => 'Error',
                'deskripsi' => 'Access'
            );
            $this->template->load('template','errors/html/error_access', $data);
        }
        elseif ($row) 
        {
            $data = array(
            'judul' => 'Kategori',
            'deskripsi' => 'Edit',
            'method' => 'POST',
            'button' => 'Update',
            'action' => site_url('kategori/update_action'),
		    'id' => set_value('id', $row->id),
		    'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
		    'jenis_kategori' => set_value('jenis_kategori', $row->jenis_kategori),
		    'group_kategori' => set_value('group_kategori', $row->group_kategori),
		    'status' => set_value('status', $row->status),
		    'created_date' => set_value('created_date', $row->created_date),
		    );
            $this->template->load('template','kategori/kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->session->set_flashdata('type', 'error');
            redirect(site_url('kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('type', 'warning');
            $this->update($this->input->post('id', TRUE));
            redirect(site_url('kategori/update/'.$this->input->post('id', TRUE)));
        } else {
            $data = array(
		    'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		    'jenis_kategori' => $this->input->post('jenis_kategori',TRUE),
		    'group_kategori' => $this->input->post('group_kategori',TRUE),
		    'status' => $this->input->post('status',TRUE),
		    'created_date' => $this->input->post('created_date',TRUE),
		    );

            $this->Kategori_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url('kategori'));
        }
    }
    
    public function delete($id) 
    {   
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            // redirect to the access error page if not admin
            $data = array(
                'judul' => 'Error',
                'deskripsi' => 'Access'
            );
            $this->template->load('template','errors/html/error_access', $data);
        }
        else
        {
            $row = $this->Kategori_model->get_by_id($id);

            if ($row) {
                $this->Kategori_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                $this->session->set_flashdata('type', 'success');
                redirect(site_url('kategori'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                $this->session->set_flashdata('type', 'error');
                redirect(site_url('kategori'));
            }
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	    $this->form_validation->set_rules('jenis_kategori', 'jenis kategori', 'trim|required');
	    $this->form_validation->set_rules('group_kategori', 'group kategori', 'trim|required');
	    $this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
	    $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	    $this->form_validation->set_rules('id', 'id', 'trim');
	}

}