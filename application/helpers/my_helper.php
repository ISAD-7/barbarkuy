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

?>
