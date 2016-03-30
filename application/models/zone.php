<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('CI_Model')) { class CI_Model extends Model {} }


class Zone extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get_zone($id = null)
  {
    if(!is_null($id)){
      $this->db->where("id", $id);  
    }

    $this->db->where("deleted", "0");
    $this->db->where("active", "1");
    $this->db->where("type", "table_area");

    $q = $this->db->get('variables');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function update_zone($data = array())
  {
    if(!empty($data)){
      $data['updated_on'] = time();
      $this->db->update('variables', $data, array('id' => $data['id']));
      return TRUE;
    }
    return FALSE;
  }

  public function create_zone($data = array())
  {
    if(!empty($data)){
      unset($data['id']);
      $data['created_on'] = time();
      $data['updated_on'] = time();
      $data['type'] = 'table_area';
      $this->db->insert('variables', $data);
      return TRUE;
    }
    return FALSE;
  }

  public function delete_zone($id = '')
  {
    if(!empty($id)){
      $data['updated_on'] = time();
      $this->db->update('variables', array('deleted' => '1'), array('id' => $id));
      return TRUE;
    }
    return FALSE;
  }
}
