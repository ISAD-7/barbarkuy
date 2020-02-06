<?php

$hasil = array();

if (isset($_POST['generate']))
{
    // get form data
    $table_name = safe($_POST['table_name']);
    $jenis_tabel = safe($_POST['jenis_tabel']);
    $controller = safe($_POST['controller']);
    $model = safe($_POST['model']);
    $judul = safe($_POST['judul']);
    $deskripsi = safe($_POST['deskripsi']);
    $admin_page = safe($_POST['admin_page']);

    if ($table_name <> '')
    {
        // set data
        $table_name = $table_name;
        $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
        $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
        $j = $judul <> '' ? ucfirst($judul) : ucfirst($table_name);
        $d = $deskripsi <> '' ? ucfirst($deskripsi) : 'Page';
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        
        // url
        $c_url = strtolower($c);
        $j_url = strtolower($j);
        $d_url = strtolower($d);

        // filename
        $c_file = $c.'.php';
        $m_file = $m.'.php';
        $v_list_file = $v_list.'.php';
        $v_read_file = $v_read.'.php';
        $v_form_file = $v_form.'.php';
        
        // target folder
        $target = "application/";
        
        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);
        
        // create / delete folder
        if(is_dir(VIEWPATH.$c_url) == true) {
            delete_all(VIEWPATH.$c_url);
            mkdir(VIEWPATH.$c_url);
        } else {
            mkdir(VIEWPATH.$c_url);
        }

        // generate
        include 'create_config_pagination.php';
        if($admin_page != 1) {
            include 'create_controller.php';
        } else {
            include 'create_admin_controller.php';
        }
        include 'create_model.php';
        if($jenis_tabel == 'reguler_table') {
            include 'create_view_list.php';
        } else {
            include 'create_view_list_datatables.php';  
        } 
        include 'create_view_form.php';
        include 'create_view_read.php';
                
        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_read;

    }
    else
    {
        $hasil[] = 'No table selected.';
    }
} 
?>