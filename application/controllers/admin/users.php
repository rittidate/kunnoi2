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

class Users extends CI_Controller {

  private $page_data = array();

  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    $this->load->library('Layouts');
    $this->load->library('form_validation');
    $this->page_comoponent();

    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
      redirect($this->config->item('base_url'), 'refresh');
  }

  function index()
  {
    $this->layouts->set_title('Users setting');

    $this->page_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

    //list the users
    $this->page_data['users'] = $this->ion_auth->get_users_array();

    $this->layouts->view('admin/users/index', $this->page_data, 'admin');
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
        $this->page_data['id'] = $id;
        $profile = $this->ion_auth->user_profile($id);
        break;

      default:
        redirect('admin/users', 'refresh');
        break;
    }

    $this->page_data['username'] = array('name' => 'username',
      'id' => 'username',
      'type' => 'text',
      'class' => 'form-control',
      'placeholder' => 'Username',
      'required' => '',
      'value' => !empty($profile) ? $profile->username : '',
    );
    $this->page_data['first_name'] = array('name' => 'first_name',
      'id' => 'first_name',
      'type' => 'text',
      'class' => 'form-control',
      'placeholder' => 'First name',
      'required' => '',
      'value' => !empty($profile) ? $profile->first_name : '',
    );
    $this->page_data['last_name'] = array('name' => 'last_name',
      'id' => 'last_name',
      'type' => 'text',
      'placeholder' => 'Last Name',
      'required' => '',
      'class' => 'form-control',
      'value' => !empty($profile) ? $profile->last_name : '',
    );
    $this->page_data['email'] = array('name' => 'email',
      'id' => 'email',
      'type' => 'text',
      'placeholder' => 'Email',
      'required' => '',
      'class' => 'form-control',
      'value' => !empty($profile) ? $profile->email : '',
    );
    $this->page_data['company'] = array('name' => 'company',
      'id' => 'company',
      'type' => 'text',
      'placeholder' => 'Company Name',
      'class' => 'form-control',
      'value' => !empty($profile) ? $profile->company : '',
    );
    $this->page_data['phone'] = array('name' => 'phone',
      'id' => 'phone',
      'type' => 'text',
      'class' => 'form-control',
      'placeholder' => 'Phone Number',
      'required' => 'number',
      'value' => !empty($profile) ? $profile->phone : '',
    );
    $this->page_data['password'] = array('name' => 'password',
      'id' => 'password',
      'type' => 'password',
      'placeholder' => 'Password',
      'class' => 'form-control',
      'value' => '',
    );
    $this->page_data['password_confirm'] = array('name' => 'password_confirm',
      'id' => 'password_confirm',
      'type' => 'password',
      'class' => 'form-control',
      'data-match' => '#password',
      'data-match-error' => 'Password doesn\'t match',
      'placeholder' => 'Confirm Password',
      'required' => '',
      'value' => '',
    );

    $this->layouts->view('admin/users/edit', $this->page_data, 'admin');
  }

  function create()
  {
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $password = $this->input->post('password');


      $additional_data = array('first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'company' => $this->input->post('company'),
        'phone' => $this->input->post('phone'),
        'group_id' => $this->input->post('group')
      );

      if ($this->ion_auth->register($username, $password, $email, $additional_data))
      { //check to see if we are creating the user
        //redirect them back to the admin page
        $this->session->set_flashdata('message', "User Created");
        redirect('admin/users', 'refresh');
      }else{
        $this->session->set_flashdata('message', "User can't create!!!");
        redirect('admin/users', 'refresh');
      }
      
  }

  function update()
  {
    redirect('admin/users', 'refresh');  
  }

  private function page_comoponent()
  {
    $this->layouts->add_layout_component('admin/_sidebar');
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
