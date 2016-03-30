<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('CI_Model')) { class CI_Model extends Model {} }


class Order extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $data = array(
              'status' => 'O',
              'date' => date('Y-m-d'),
              'year' => date('Y')
              );
    $this->db->where($data);

    $q = $this->db->get('pos_orders');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function get_table($order_id = null)
  {
    $data = array(
              'order_id' => $order_id
              );
    $this->db->where($data);

    $q = $this->db->get('pos_order_tables');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function add_table($table = '', $zone = '', $order = '')
  {
    if(empty($order)){
      $order = $this->create();
    }

    $return['order'] = $order;

    if(!empty($table) && !empty($zone) && !empty($order))
    {
      $data = array(
                'order_id' => $order,
                'section' => $zone,
                'table_number' => $table
              );
      $this->db->where($data);
      $q = $this->db->get('pos_order_tables');
      
      if($q->num_rows == 0)
        $this->db->insert('pos_order_tables', $data);
    }

    return json_encode($return);
  }

  public function remove_table($table = '', $zone = '', $order = '')
  {
    $data['order'] = $order;

    $data = array(
          'order_id' => $order,
          'section' => $zone,
          'table_number' => $table
        );

    $this->db->delete('pos_order_tables', $data);
  }

  public function create()
  {
      $data['status'] = 'O';
      $data['date'] = date('Y-m-d');
      $data['year'] = date('Y');
      $data['timestamp'] = date("Y-m-d H:i:s");
      $data['created_on'] = time();
      $data['updated_on'] = time();
      $this->db->insert('pos_orders', $data);
      $insert_id = $this->db->insert_id();

      return $insert_id;
  }

  public function get_order_table($id = null, $section = null)
  {
    if(!is_null($id)){
      $this->db->where("order_id", $id);
      $this->db->where("section", $section);
    }

    $q = $this->db->get('pos_order_tables');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function get_booked_table($id = null, $section = null)
  {
      $data = array(
                'id <>' => $id,
                'status' => 'O',
                'date' => date('Y-m-d'),
                'year' => date('Y'),
                'section' => $section
              );
      $this->db->where($data);
      $this->db->from('pos_orders');
      $this->db->join('pos_order_tables', 'pos_orders.id = pos_order_tables.order_id');
      $q = $this->db->get();

      return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function get_zone($section = null)
  {
    $data = array(
              'e_abb_name' => $section,
              'type' => 'table_area',
              'active' => 1,
              'deleted' => 0
              );
    $this->db->where($data);

    $q = $this->db->get('variables');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }
}
