<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zones extends CI_Controller {

  private $page_data = array();

  function __construct()
  {
    parent::__construct();
    $this->load->library('Layouts');
    $this->page_comoponent();

    //query data
    $this->load->model('Zone', '', TRUE);
  }

  public function index()
  {
    $this->layouts->set_title('Zone setting');

    $this->page_data['zone'] = $this->Zone->get_zone();
     
    $this->layouts->view('admin/zone/index', $this->page_data, 'admin');
  }

  public function edit($action = NULL, $id = NULL)
  {
    $id =  $this->input->get('id');
    
    $this->page_data['action'] = $this->input->get('action');

    switch ($this->page_data['action']) {
      case 'new':
        $this->layouts->set_title('New Zone');
        break;
      
      case 'edit':
        $this->layouts->set_title('Edit Zone');
        $this->page_data['data'] = $this->Zone->get_zone($id);
        break;

      default:
        redirect('admin/zone', 'refresh');
        break;
    }

    $this->layouts->view('admin/zone/edit', $this->page_data, 'admin');
  }

  public function create($action = '', $id = '')
  {
    $data = $this->input->post();
    if($this->Zone->create_zone($data))
      redirect('admin/zones', 'refresh');
  }

  public function del($action = '', $id = '')
  {
    $action = $this->input->get('action');
    $id =  $this->input->get('id');
    if($action == 'delete' && !empty($id)){
      $this->Zone->delete_zone($id);
    }
    redirect('admin/zones', 'refresh'); 
  }

  public function update()
  {
    $data = $this->input->post();
      
    if($this->Zone->update_zone($data))
      redirect('admin/zones', 'refresh'); 
  }

  private function page_comoponent()
  {
    $this->layouts->add_layout_component('admin/_sidebar');

    $data['page'] = "zone";
    $this->page_data['sidebar'] = $this->layouts->add_page_component('admin/zone/_sidebar', $data); 
  }

}
