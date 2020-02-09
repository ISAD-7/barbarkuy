<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function safe($str)
{
    return strip_tags(trim($str));
}

function read_json($path)
{
    $string = file_get_contents($path);
    $obj = json_decode($string);
    return $obj;
}

function generate_crud($string, $path)
{   
    $create = fopen($path, "w") or die("Unable to open file!");
    fwrite($create, $string);
    fclose($create);
    
    return $path;
}

function label($str)
{
    $label = str_replace('_', ' ', $str);
    $label = ucwords($label);
    return $label;
}

function delete_all($dir) { 
if(is_dir($dir)) { 
    $objs = scandir($dir);
    foreach ($objs as $obj) { 
        if ($obj != "." && $obj != "..") { 
         if (is_dir($dir. DIRECTORY_SEPARATOR .$obj) && !is_link($dir."/".$obj))
            rrmdir($dir. DIRECTORY_SEPARATOR .$obj);
            else
            unlink($dir. DIRECTORY_SEPARATOR .$obj); 
            } 
        }
        rmdir($dir); 
    } 
}

function message_box($msg, $status = 'success'){
    $response = '';
    $class = 'danger';
    if($status == 'success'){
        $class = 'success';
    }
    if(!empty($msg)){
        $response = '<div class="alert alert-'.$class.' no-margin" style="margin-bottom:15px!important;">'.$msg.'</div>';
    }
    return $response;
}

function alert($message,$type){
    if($type=='success') $icon='check-circle';
    elseif($type=='danger') $icon='times-circle';
    elseif($type=='warning') $icon='exclamation-triangle';
    else $icon = 'question-circle';

    $data = '
    <div id="alert-message">
    <div class="alert alert-'.$type.' alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-'.$icon.'"></i> '.ucfirst($type).'!</h4>'.$message.'
    </div>
    </div>
    '; 
    return $data;
}

// Modal Content
function modal($content='', $id='', $data='', $size='') {
    $_ci = &get_instance();
    
    if ($content != '') {
    $view_content = $_ci->load->view($content, $data, TRUE);
    return '
    <div class="modal fade" id="' .$id .'" role="dialog">
        <div class="modal-dialog modal-' .$size .'" role="document">
            <div class="modal-content">
            ' .$view_content .'
            </div>
        </div>
    </div>
    ';
        }
    }

// Modal Confirm
function confirm($url='', $id='', $class='', $body='', $title='') {
$_ci = &get_instance();

    if ($id != '') { echo '
    <div class="modal fade" id="' .$id .'" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content" style="margin-top:25vh">
        <div class="col-md-12 well">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times-circle"></i></button>
                <h3 class="modal-title text-center"><i class="fa fa-warning"></i> '.$title.'</h3>
            </div> 
        <div class="modal-body">
            <h4 class="text-center"><b>'.$body.'</h4>
        </div>
        <div class="modal-footer">
            <div class="col-md-6">
                <a href="'.$url.'" class="form-control btn btn-danger '.$class.'"> <i class="fa fa-check-circle"></i> Ya</a>
            </div>
            <div class="col-md-6">
                <button class="form-control btn btn-primary" data-dismiss="modal"> <i class="fa fa-times-circle"></i> Tidak</button>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    ';
    }
}

?>
