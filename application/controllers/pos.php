<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 * 
 * Licensed under the Academic Free License version 3.0
 * 
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package   CodeIgniter
 * @author    EllisLab Dev Team
 * @copyright Copyright (c) 2008 - 2012, EllisLab, Inc. (http://ellislab.com/)
 * @license   http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link    http://codeigniter.com
 * @since   Version 1.0
 * @filesource
 */

class Pos extends CI_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    $this->load->library('form_validation');
    $this->load->database();

    if (!$this->ion_auth->logged_in())
        redirect('user/login', 'refresh');

  }

  public function index()
  {
    $this->load->library('Layouts');

    $this->load->model('Zone', '', TRUE);
    $this->data['zone'] = $this->Zone->get_zone();

    $this->data['client'] = array();
    $this->data['user_grop'] = $this->session->userdata('group');
    $this->data['user'] = $this->ion_auth->get_user();

    $this->layouts->view('pos/index', $this->data, 'pos');
  }

  public function order()
  {
    $this->load->model('Zone', '', TRUE);
    $this->load->model('Order', '', TRUE);

    $this->data['zone_id'] =  $this->input->get('zone');
    $this->data['order_id'] =  $this->input->get('order');

    $zone = $this->Zone->get_zone($this->data['zone_id']);
    if($zone){
      $this->data['zone'] = $zone;
      if(!empty($this->data['order_id'])){
        $this->data['order_details'] = $this->Order->get_order_details($this->input->get('order'));
        $this->data['order'] = $this->Order->get($this->data['order_id'])[0];
      }      

      $this->bookedTable($zone[0]->e_abb_name);
      $this->existedTable($zone[0]->e_abb_name);

      $this->load->library('Layouts');

      $this->productModal();

      $this->layouts->view('pos/order', $this->data, 'pos');
    }
  }

  public function remove()
  {
    $order = $this->input->post('order');

    if(empty($order)){
      redirect('', 'refresh');
    }

    $this->load->model('Order', '', TRUE);
    $this->Order->remove($order);
  }

  public function summary()
  {
    $order = $this->input->post('order');
    $amount = $this->input->post('amount');

    if(empty($order)){
      redirect('', 'refresh');
    }

    $this->load->model('Order', '', TRUE);
    echo json_encode($this->Order->summary($order, $amount));
  }

  public function print_bill()
  {
    $order = $this->input->get('order');

    if(empty($order)){
      redirect('', 'refresh');
    }
    $this->load->library('Layouts');

    $this->load->model('Order', '', TRUE);
    $this->data['order'] = $this->Order->get($order);
    $this->data['order_details'] = $this->Order->get_order_details($order);
    $this->data['table']= $this->getTableArray($order);
    $this->layouts->view('pos/bill', $this->data, 'bill');
  }

  public function print_summary()
  {
    $order = $this->input->get('order');

    if(empty($order)){
      redirect('', 'refresh');
    }
    $this->load->library('Layouts');

    $this->load->model('Order', '', TRUE);
    $this->data['order'] = $this->Order->get_close($order);
    $this->data['order_details'] = $this->Order->get_order_details($order);
    $this->data['order_payment'] = $this->Order->get_order_payment($order);
    $this->data['table']= $this->getTableArray($order);
    $this->layouts->view('pos/bill', $this->data, 'bill');
  }
  public function add_table()
  {
    $zone = $this->input->post('zone');
    $zone_id = $this->input->post('zone_id');

    if(empty($zone) && empty($zone_id)){
      redirect('', 'refresh');
    }

    $this->load->model('Order', '', TRUE);
    echo json_encode($this->Order->add_table($this->input->post('table'), $this->input->post('zone'), $this->input->post('order'), $this->input->post('zone_id')));
  }

  public function remove_table()
  {
    $zone = $this->input->post('zone');

    if(empty($zone)){
      redirect('', 'refresh');
    }
    $this->load->model('Order', '', TRUE);
    $this->Order->remove_table($this->input->post('table'), $this->input->post('zone'), $this->input->post('order'));
  }


  public function load()
  {
    $data = array();
    $this->load->model('Order', '', TRUE);
    $orderByTable = TRUE;
    $orders = $this->Order->get('', $orderByTable);
    if($orders){
        $i = 0;
        foreach ($orders as $item) {
          $aTable = $this->getTableArray($item->id);
          if($this->checkIteratedTable($data, $aTable)){
            $data[$i]['#'] = $i+1;
            $data[$i]['order'] = $item->id;
            $data[$i]['Time'] = date('H:i:s', $item->created_on);
            $data[$i]['Subtotal'] =  number_format($item->subtotal/100, 2, '.', ',');
            $data[$i]['Qty'] =  $item->qty;

            $data[$i]['zone'] = $item->zone_id;
            if($aTable){
              $data[$i]['Table'] = $aTable;
            }
       
            $i++;
          }
        }
    }

    echo json_encode($data);
  }

  private function existedTable($section = null)
  {
      $this->load->model('Order', '', TRUE);
      $table_order = $this->Order->get_order_table($this->data['order_id'], $section);
      if($table_order){
        foreach ($table_order as $item) {
          if($item->order_id == $this->data['order_id'])
            $this->data['table_order'][$item->table_number] = 'existed';
        }
      }
  }

  private function checkIteratedTable($data, $tables)
  {
    foreach($data as $item){
      if(!empty($item['Table']) && $item['Table'] == $tables)
        return FALSE;
    }
    return TRUE;
  }


  public function add_product()
  {
    $product = $this->input->post('product');
    $zone_id = $this->input->post('zone_id');
    if(empty($product) && empty($zone_id)){
      redirect('', 'refresh');
    }

    $this->load->model('Order', '', TRUE);
    echo json_encode($this->Order->add_product($this->input->post('product'), $this->input->post('order'), $this->input->post('zone_id'), $this->input->post('qty')));
  }

  public function remove_product()
  {
    $product = $this->input->post('product');
    $order = $this->input->post('order');
    if(empty($product) && empty($order)){
      redirect('', 'refresh');
    }

    $this->load->model('Order', '', TRUE);
    echo json_encode($this->Order->remove_product($this->input->post('product'), $this->input->post('order')));
  }

  private function bookedTable($section = null)
  {
      $this->load->model('Order', '', TRUE);
      $table_booked = $this->Order->get_booked_table($this->data['order_id'], $section);
      if($table_booked){
        foreach ($table_booked as $item) {
            $this->data['table_order'][$item->table_number] = 'booked';
        }
      }
  }

  private function getTableArray($id)
  {
    $strTable = array();
    $zone = '';

    $this->load->model('Order', '', TRUE);
    $table = $this->Order->get_table($id);
    
    if($table){
      $i = 0;
      foreach ($table as $item) {
          $section = $item->section;
          $strTable[$i] = $item->section.$item->table_number;
          $i++;
      }
      return implode(", ",$strTable);
    }

    return FALSE;
  }

  private function productModal()
  {
    $this->load->model('Product', '', TRUE);
    $data['product'] = $this->Product->get();
    $this->data['product_modal'] = $this->layouts->add_page_component('pos/_product_modal', $data);
    $this->data['delete_modal'] = $this->layouts->add_page_component('pos/_delete_modal');
    $this->data['close_bill_modal'] = $this->layouts->add_page_component('pos/_close_bill_modal', $this->data);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
