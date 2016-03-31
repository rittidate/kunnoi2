<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('CI_Model')) { class CI_Model extends Model {} }


class Product extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = '')
  {
    $data = array('active' => '1');

    if(!empty($id))
      $data['mp_products.id'] = $id;

    $this->db->select('mp_products.*, mp_barcodes.*,  mp_barcodes.id as bc_id');
    $this->db->where($data);
    $this->db->from('mp_products');
    $this->db->join('mp_barcodes', 'mp_products.id = mp_barcodes.mp_id');

    $q = $this->db->get();

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }
}
