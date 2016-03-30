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

    //query data
    
  }

  public function index()
  {
    $this->load->library('Layouts');

    $this->load->model('Zone', '', TRUE);
    $this->data['zone'] = $this->Zone->get_zone();

    $this->data['client'] = array();

    $this->layouts->view('pos/index', $this->data, 'pos');
  }

  public function order()
  {
    $this->load->model('Zone', '', TRUE);

    $this->data['zone_id'] =  $this->input->get('zone');
    $this->data['order_id'] =  $this->input->get('order');

    if($this->Zone->get_zone($this->data['zone_id']) == FALSE){
      redirect('pos', 'refresh');
    }else{

      $zone = $this->Zone->get_zone($this->data['zone_id']);
      $this->data['zone'] = $zone;

      $this->bookedTable($zone[0]->e_abb_name);
      $this->existedTable($zone[0]->e_abb_name);

      $this->load->library('Layouts');

      $this->data['product_modal'] = $this->layouts->add_page_component('pos/_product_modal');

      $this->layouts->view('pos/order', $this->data, 'pos');
    }
  }

  public function add_table()
  {
    $this->load->model('Order', '', TRUE);
    echo $this->Order->add_table($this->input->post('table'), $this->input->post('zone'), $this->input->post('order'));
  }

  public function remove_table()
  {
    $this->load->model('Order', '', TRUE);
    $this->Order->remove_table($this->input->post('table'), $this->input->post('zone'), $this->input->post('order'));
  }

  public function load()
  {
    $data = array();
    $this->load->model('Order', '', TRUE);
    $orders = $this->Order->get();
    if($orders){
        $i = 0;
        foreach ($orders as $item) {
          $data[$i]['#'] = $i+1;
          $data[$i]['order'] = $item->id;
          $data[$i]['Time'] = date('H:i:s', $item->created_on);
          $data[$i]['Subtotal'] =  $item->subtotal;
          $data[$i]['Qty'] =  $item->qty;

          $aTable = $this->getTableArray($item->id);
          $data[$i]['zone'] = $aTable[0];
          $data[$i]['Table'] = $aTable[1];
     
          $i++;
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

      $zone = $this->Order->get_zone($section);
    }



    return array($zone[0]->id, implode(", ",$strTable));
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
