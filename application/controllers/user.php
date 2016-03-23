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

class User extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
    $this->load->library('form_validation');
  }

  public function index()
  {

  }

  //log the user in
  function login()
  {
    $this->load->library('Layouts');

    $this->data['title'] = "Login";
    $this->data['message'] = '';
    
    if ($this->ion_auth->logged_in())
    {
      //already logged in so no need to access this page
      redirect($this->config->item('base_url'), 'refresh');
    }

    //validate form input
    $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == true)
    { //check to see if the user is logging in
      //check for "remember me"
      $remember = (bool) $this->input->post('remember');

      if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $remember))
      { //if the login is successful
        //redirect them back to the home page
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect($this->config->item('base_url'), 'refresh');
      }
      else
      { //if the login was un-successful
        //redirect them back to the login page
        $this->session->set_flashdata('message', $this->ion_auth->errors());
        redirect('user/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
      }
    }
    else
    {  //the user is not logging in so display the login page
      //set the flash data error message if there is one
      $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

      $this->data['form'] = array('class' => 'form-signin');

      $this->data['email'] = array('name' => 'email',
        'id' => 'email',
        'class' => 'form-control',
        'placeholder' => 'Email address',
        'required' => '',
        'type' => 'email',
        'value' => $this->form_validation->set_value('email'),
      );

      $this->data['password'] = array('name' => 'password',
        'id' => 'password',
        'class' => 'form-control',
        'placeholder' => 'Password',
        'required' => '',
        'type' => 'password',
      );

      $this->layouts->view('user/login', $this->data);
    }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
