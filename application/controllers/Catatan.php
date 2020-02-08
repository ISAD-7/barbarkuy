<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Catatan_model');
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
        else
        {
            $catatan = $this->Catatan_model->get_all();

            $data = array(
                'judul' => 'Catatan',
                'deskripsi' => 'Page',
                'catatan_data' => $catatan
            );
            $this->template->load('template','catatan/catatan_list', $data);
        }
    }

    public function read_catatan($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        else
        {
            $row = $this->Catatan_model->get_by_id($id);
            if ($row) 
            {
            $data = array(
                'judul' => 'Catatan',
                'deskripsi' => 'View',
			    'id' => $row->id,
			    'nama' => $row->nama,
			    'deskripsi' => $row->deskripsi,
			    'catatan' => $row->catatan,
			    'tanggal' => $row->tanggal,
			    );
            $this->template->load('template','catatan/catatan_read', $data);
            } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->session->set_flashdata('type', 'error');
            redirect(site_url('catatan'));
            }
        }
    }

    public function create_catatan() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        else
        {
            $data = array(
            'judul' => 'Catatan',
            'deskripsi' => 'Create',
            'method' => 'POST',
            'button' => 'Create',
            'action' => site_url('catatan/create_action_catatan'),
		    'id' => set_value('id'),
		    'nama' => set_value('nama'),
		    'deskripsi' => set_value('deskripsi'),
		    'catatan' => set_value('catatan'),
		    'tanggal' => set_value('tanggal'),
			);
        }
        $this->template->load('template','catatan/catatan_form', $data);
    }
    
    public function create_action_catatan() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('type', 'warning');
            $this->create_catatan();
            redirect(site_url('catatan/create_catatan'));
        } else {
            $data = array(
		    'nama' => $this->input->post('nama',TRUE),
		    'deskripsi' => $this->input->post('deskripsi',TRUE),
		    'catatan' => $this->input->post('catatan',TRUE),
		    'tanggal' => $this->input->post('tanggal',TRUE),
		    );

            $this->Catatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url('catatan'));
        }
    }
    
    public function update_catatan($id) 
    {
        $row = $this->Catatan_model->get_by_id($id);
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        elseif ($row) 
        {
            $data = array(
            'judul' => 'Catatan',
            'deskripsi' => 'Edit',
            'method' => 'POST',
            'button' => 'Update',
            'action' => site_url('catatan/update_action_catatan'),
		    'id' => set_value('id', $row->id),
		    'nama' => set_value('nama', $row->nama),
		    'deskripsi' => set_value('deskripsi', $row->deskripsi),
		    'catatan' => set_value('catatan', $row->catatan),
		    'tanggal' => set_value('tanggal', $row->tanggal),
		    );
            $this->template->load('template','catatan/catatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->session->set_flashdata('type', 'error');
            redirect(site_url('catatan'));
        }
    }
    
    public function update_action_catatan() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('type', 'warning');
            $this->update_catatan($this->input->post('id', TRUE));
            redirect(site_url('catatan/update_catatan/'.$this->input->post('id', TRUE)));
        } else {
            $data = array(
		    'nama' => $this->input->post('nama',TRUE),
		    'deskripsi' => $this->input->post('deskripsi',TRUE),
		    'catatan' => $this->input->post('catatan',TRUE),
		    'tanggal' => $this->input->post('tanggal',TRUE),
		    );

            $this->Catatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->session->set_flashdata('type', 'success');
            redirect(site_url('catatan'));
        }
    }
    
    public function delete_catatan($id) 
    {   
        if (!$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        else
        {
            $row = $this->Catatan_model->get_by_id($id);

            if ($row) {
                $this->Catatan_model->delete($id);
                $this->session->set_flashdata('message', 'Delete Record Success');
                $this->session->set_flashdata('type', 'success');
                redirect(site_url('catatan'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                $this->session->set_flashdata('type', 'error');
                redirect(site_url('catatan'));
            }
        }
    }

    public function _rules() 
    {
	    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
	    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	    $this->form_validation->set_rules('catatan', 'catatan', 'trim|required');
	    $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	    $this->form_validation->set_rules('id', 'id', 'trim');
	}

}