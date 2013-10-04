<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function add_option($name,$value)
{           
      $CI =& get_instance();
      $CI->load->database();
    $query=$CI->db->select('*')->from('tbl_option')->where('option_name',$name)->get();
 
    //option already exists
    if($query->num_rows() > 0)
        return false;
 
    $data_type='text';
    if(is_array($value))
    {
        $data_type='array';
  	  $value = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $value);        
        $value=serialize($value);
    }
    elseif(is_object($value))
    {
        $data_type='object';
  	  $value = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $value);                
        $value=serialize($value);
    }
 
    $data=array(
        'option_name'=>$name,
        'option_value'=>$value,
        'option_type'=>$data_type,
    );
    $CI->db->insert('tbl_option',$data);
}
 
function update_option($name,$value)
{
    $CI =& get_instance();
    $CI->load->database();
 
    $data_type='text';
    if(is_array($value))
    {
        $data_type='array';
  	  $value = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $value);                
        $value=serialize($value);
    }
    elseif(is_object($value))
    {
        $data_type='object';
  	  $value = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $value);                
        $value=serialize($value);
    }
 
    $data=array(
        'option_name'=>$name,
        'option_value'=>$value,
        'option_type'=>$data_type,
    );
    $query=$CI->db->select('*')->from('tbl_option')->where('option_name',$name)->get();
 
    //if option already exists then update else insert new
    if($query->num_rows() < 1) return $CI->db->insert('tbl_option',$data);
    else          return $CI->db->update('tbl_option',$data,array('option_name'=>$name));
}
 
function get_option($name)
{
    $CI =& get_instance();
    $CI->load->database();
    $query=$CI->db->select('*')->from('tbl_option')->where('option_name',$name)->get();
    //option not found
    if($query->num_rows() < 1) return false;      $option=$query->row();
 
    if('text'==$option->option_type)
        $value=$option->option_value;
    elseif('array'==$option->option_type || 'object'==$option->option_type)
    {
        $value = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $option->option_value);                  
        $value=unserialize($value);
    }
 
    return $value;
}
 
function delete_option($name)
{
    $CI =& get_instance();
    $CI->load->database();
    return $CI->db->delete('tbl_option',array('option_name'=>$name));
}
