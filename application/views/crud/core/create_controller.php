<?php
$string = "<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class ".$c." extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        \$this->load->model('$m');
        \$this->load->library('form_validation');
        \$this->session->set_flashdata('segment', explode('/', \$this->uri->uri_string()));
    }";

if ($jenis_tabel == 'reguler_table') {
    
$string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));
        
        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index.html';
            \$config['first_url'] = base_url() . '$c_url/index.html';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
        \$this->template->load('template','$c_url/$v_list', \$data);
    }";

} else {

$string .="\n\n    public function index()
    {   
        if (!\$this->ion_auth->logged_in())
        {
            // redirect to the login page
            redirect('auth/login', 'refresh');
        }
        else
        {
            \$$c_url = \$this->" . $m . "->get_all();

            \$data = array(
                'judul' => '".ucfirst($j_url)."',
                'deskripsi' => '".ucfirst($d_url)."',
                '" . $c_url . "_data' => \$$c_url
            );
            \$this->template->load('template','$c_url/$v_list', \$data);
        }
    }";
}
    
$string .= "\n\n    public function read_".$c_url."(\$id) 
    {
        if (!\$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        else
        {
            \$row = \$this->" . $m . "->get_by_id(\$id);
            if (\$row) 
            {
            \$data = array(
                'judul' => '".ucfirst($j_url)."',
                'deskripsi' => 'View',";
foreach ($all as $row) {
$string .= "\n\t\t\t    '" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
}
$string .= "\n\t\t\t    );
            \$this->template->load('template','$c_url/$v_read', \$data);
            } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            \$this->session->set_flashdata('type', 'error');
            redirect(site_url('$c_url'));
            }
        }
    }

    public function create_".$c_url."() 
    {
        if (!\$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        else
        {
            \$data = array(
            'judul' => '".ucfirst($j_url)."',
            'deskripsi' => 'Create',
            'method' => 'POST',
            'button' => 'Create',
            'action' => site_url('$c_url/create_action_".$c_url."'),";
foreach ($all as $row) {
$string .= "\n\t\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
}
$string .= "\n\t\t\t);
        }
        \$this->template->load('template','$c_url/$v_form', \$data);
    }
    
    public function create_action_".$c_url."() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->session->set_flashdata('message', validation_errors());
            \$this->session->set_flashdata('type', 'warning');
            \$this->create_".$c_url."();
            redirect(site_url('$c_url/create_".$c_url."'));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
$string .= "\n\t\t    '" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t\t    );

            \$this->".$m."->insert(\$data);
            \$this->session->set_flashdata('message', 'Create Record Success');
            \$this->session->set_flashdata('type', 'success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_".$c_url."(\$id) 
    {
        \$row = \$this->".$m."->get_by_id(\$id);
        if (!\$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        elseif (\$row) 
        {
            \$data = array(
            'judul' => '".ucfirst($j_url)."',
            'deskripsi' => 'Edit',
            'method' => 'POST',
            'button' => 'Update',
            'action' => site_url('$c_url/update_action_".$c_url."'),";
foreach ($all as $row) {
    $string .= "\n\t\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";
}
$string .= "\n\t\t    );
            \$this->template->load('template','$c_url/$v_form', \$data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            \$this->session->set_flashdata('type', 'error');
            redirect(site_url('$c_url'));
        }
    }
    
    public function update_action_".$c_url."() 
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->session->set_flashdata('message', validation_errors());
            \$this->session->set_flashdata('type', 'warning');
            \$this->update_".$c_url."(\$this->input->post('$pk', TRUE));
            redirect(site_url('$c_url/update_".$c_url."/'.\$this->input->post('$pk', TRUE)));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    '" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}    
$string .= "\n\t\t    );

            \$this->".$m."->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', 'Update Record Success');
            \$this->session->set_flashdata('type', 'success');
            redirect(site_url('$c_url'));
        }
    }
    
    public function delete_".$c_url."(\$id) 
    {   
        if (!\$this->ion_auth->logged_in())
        {
            // redirect to the login page if not logged in
            redirect('auth/login', 'refresh');
        }
        else
        {
            \$row = \$this->".$m."->get_by_id(\$id);

            if (\$row) {
                \$this->".$m."->delete(\$id);
                \$this->session->set_flashdata('message', 'Delete Record Success');
                \$this->session->set_flashdata('type', 'success');
                redirect(site_url('$c_url'));
            } else {
                \$this->session->set_flashdata('message', 'Record Not Found');
                \$this->session->set_flashdata('type', 'error');
                redirect(site_url('$c_url'));
            }
        }
    }

    public function _rules() 
    {";
foreach ($non_pk as $row) {
$int = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
$string .= "\n\t    \$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
}    
$string .= "\n\t    \$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t}";
$string .= "\n\n}";

$hasil_controller = generate_crud($string, $target . "controllers/" . $c_file);
?>