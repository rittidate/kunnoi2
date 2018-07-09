<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!class_exists('CI_Model')) { class CI_Model extends Model {} }


class Order extends CI_Model
{
  private $zone = '';

  public function __construct()
  {
    parent::__construct();
  }

  public function get($id = '', $orderByTable = FALSE)
  {
    $data = array(
              'status' => 'O',
              'date' => date('Y-m-d'),
              'year' => date('Y')
              );

    if(!empty($id)){
      $data['id'] =  $id;
    }

    if($orderByTable)
    {
      $this->db->join('pos_order_tables', 'pos_order_tables.order_id = pos_orders.id', 'left'); 
      $this->db->order_by('pos_order_tables.section', 'asc');
      $this->db->order_by('pos_order_tables.table_number', 'asc');
    }
    
    $this->db->where($data);

    $q = $this->db->get('pos_orders');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function get_close($id = '')
  {
    $data = array(
              'status' => 'C',
              'date' => date('Y-m-d'),
              'year' => date('Y')
              );

    if(!empty($id)){
      $data['id'] =  $id;
    }
    
    $this->db->where($data);

    $q = $this->db->get('pos_orders');

    return ($q->num_rows > 0) ? $q->result() : FALSE;
  }

  public function create()
  {
      $data['type'] = 'S';
      $data['cashier_id'] = $this->session->userdata('id');
      $data['zone_id'] = $this->zone;
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

  public function update($order_id = '')
  {
    if(!empty($order_id)){
      $data['qty'] = 0;
      $data['total'] = 0;
      $data['subtotal'] = 0;

      $q_order_details = $this->get_order_details($order_id);
      if($q_order_details){
        foreach($q_order_details as $item){
            $data['qty'] += $item->qty;
            $data['total'] += $item->qty * $item->price;
            $data['subtotal'] += $item->qty * $item->price;
        } 
      }
      $data['updated_on'] = time();
      $this->db->where('id', $order_id);

      $this->db->update('pos_orders', $data);

      return $data['subtotal'];
    }
  }

  public function remove($order_id = '')
  {
    if(!empty($order_id)){
      $data['status'] = 'R';
      $data['updated_on'] = time();
      $this->db->where('id', $order_id);

      $this->db->update('pos_orders', $data);
    }
  }

  public function summary($order_id = '', $amount = '')
  {
    if(!empty($order_id)){
      
      $q = $this->get_order_payment($order_id);

      if(!$q){
        $order = $this->get($order_id);

        $pay_amount = $amount*100;

        $cash_tender = $amount*100 - $order[0]->subtotal;

        $data = array(
                  'order_id' => $order_id,
                  'payment_type' => '61',
                  'pay_amount' => $pay_amount,
                  'cash_tender' => $cash_tender,
                  'date' => date('Y-m-d')
                );
        $this->db->insert('pos_order_payments', $data);

        $order_data['status'] = 'C';
        $order_data['updated_on'] = time();
        $this->db->where('id', $order_id);
        $this->db->update('pos_orders', $order_data);

        return $data;
      }
      return FALSE;
    }
    return FALSE;
  }

  public function get_order_details($order_id = '')
  {
    if(!empty($order_id)){
      $data = array(
                'order_id' => $order_id,
                'status' => 'N'
                );
      $this->db->where($data);

      $this->db->from('mp_products');
      $this->db->join('pos_order_details', 'mp_products.id = pos_order_details.mp_id');
      $q = $this->db->get();

      return ($q->num_rows > 0) ? $q->result() : FALSE;
    }
    return FALSE;
  }

  public function get_order_payment($order_id = '')
  {
    if(!empty($order_id)){
      $data = array(
                'order_id' => $order_id,
                );
      $this->db->where($data);
      $q = $this->db->get('pos_order_payments');

      return ($q->num_rows > 0) ? $q->result() : FALSE;
    }
    return FALSE;
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

  public function add_table($table = '', $zone = '', $order = '', $zone_id = '')
  {
    if(!empty($zone_id)){
      $this->zone = $zone_id;

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

      return $return;
    }
    return FALSE;
  }

  public function remove_table($table = '', $zone = '', $order = '')
  {
    if(!empty($order)){
      $data['order'] = $order;

      $data = array(
            'order_id' => $order,
            'section' => $zone,
            'table_number' => $table
          );

      $this->db->delete('pos_order_tables', $data);
    }
  }

  public function add_product($product_id = '', $order = '', $zone_id = '', $qty = '')
  { 
    if(!empty($product_id) && !empty($zone_id)){

      $this->zone = $zone_id;

      if(empty($order)){
        $order = $this->create();
      }

      $return['order'] = $order;

      $q_product = $this->db->where(array('order_id' => $order, 'mp_id' => $product_id))->get('pos_order_details');

      $this->load->model('Product', '', TRUE);
      $product = $this->Product->get($product_id)[0];

      if($q_product->num_rows() > 0){
        $rowPd = $q_product->row();

        if(is_numeric($qty)){
          if($qty < 0 || $qty == 0){
            $qty = 0;
            $this->db->set('status', 'C');
          }else{
            $this->db->set('status', 'N');
          }
        }else{
          if($rowPd->status == 'C'){
            $qty = 1;
            $this->db->set('status', 'N');
          }else{
            $qty = $rowPd->qty + 1;
            $this->db->set('status', 'N');
          }
        }

        $this->db->set('qty', $qty);
        $this->db->set('total', 'price *'.$qty , FALSE);
        $this->db->set('updated_on', time());
        $this->db->where('id', $rowPd->id);
        $this->db->update('pos_order_details');
      }else{
        $qty = 1;
        $data = array(
                      'qty' => 1,
                      'price' => $product->price1,
                      'total' => $product->price1,
                      'order_id' => $order,
                      'mp_id' => $product->mp_id,
                      'bc_id' => $product->bc_id,
                      'item_no' => $this->db->where(array('order_id' => $order))->get('pos_order_details')->num_rows() + 1,
                      'price_no' => 1,
                      'date' => date('Y-m-d'),
                      'unit_id' => $product->unit_id,
                      'type' => 'S',
                      'status' => 'N'
                    );
        $this->db->insert('pos_order_details', $data);
      }

      $return['product']['id'] = $product->mp_id;
      $return['product']['name'] = $product->t_full_name;
      $return['product']['qty'] = $qty;
      $return['product']['price'] = $product->price1;
      $return['product']['total'] = $product->price1 * $qty;

      $return['subtotal'] = $this->update($order);

      return $return;
    }
    return FALSE;
  }

  public function remove_product($product_id = '', $order = '')
  {
      $q_product = $this->db->where(array('order_id' => $order, 'mp_id' => $product_id))->get('pos_order_details');
      if($q_product->num_rows() > 0){
        $rowPd = $q_product->row();
        $this->db->set('status', 'C');
        $this->db->set('qty', '0');
        $this->db->set('total', '0');
        $this->db->set('updated_on', time());
        $this->db->where('id', $rowPd->id);
        $this->db->update('pos_order_details');
        $return['subtotal'] = $this->update($order);

        return $return;
      }
      return FALSE;
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
