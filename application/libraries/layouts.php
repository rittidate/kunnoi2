<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
/** 
 * Layouts Class. PHP5 only. 
 * 
 */
class Layouts { 
    
  // Will hold a CodeIgniter instance 
  private $CI; 
    
  // Will hold a title for the page, NULL by default 
  private $title_for_layout = NULL; 
    
  // The title separator, ' | ' by default 
  private $title_separator = ' | '; 

  private $file_includes = array();

  private $layout_componet = array();
    
  public function __construct()  
  { 
    $this->CI =& get_instance(); 
  } 
    
  public function set_title($title) 
  { 
    $this->title_for_layout = $title; 
  } 
    
  public function view($view_name, $params = array(), $layout = 'default') 
  {  
    // Handle the site's title. If NULL, don't add anything. If not, add a  
    // separator and append the title. 
    $separated_title_for_layout = '';

    if ($this->title_for_layout !== NULL)  
    { 
      $separated_title_for_layout = $this->title_separator . $this->title_for_layout; 
    } 
      
    // Load the view's content, with the params passed 
    $view_content = $this->CI->load->view($view_name, $params, TRUE); 
    
    $this->layout_componet['title_for_layout'] = $separated_title_for_layout;
    $this->layout_componet['content_for_layout'] = $view_content;

    // Now load the layout, and pass the view we just rendered 
    $this->CI->load->view('layouts/' . $layout, $this->layout_componet); 
  }

  public function add_layout_component($view_name, $params = array())
  {
      $pattern = "/\_(.*)$/";
      
      $view_content = $this->CI->load->view($view_name, $params, TRUE);

      $success = preg_match($pattern, $view_name, $match);

      if($success){
        $param_name = $match[1];
        $this->layout_componet[$param_name] = $view_content;
      }
  }

  public function add_page_component($view_name, $params = array())
  {
      return $this->CI->load->view($view_name, $params, TRUE);
  }
    
  public function add_include($path, $prepend_base_url = TRUE) 
  { 
    if ($prepend_base_url) 
    { 
      $this->CI->load->helper('url'); // Load this just to be sure 
      $this->file_includes[] = base_url() . $path; 
    } 
    else
    { 
      $this->file_includes[] = $path; 
    } 
  
    return $this; // This allows chain-methods 
  } 
  
  public function print_includes() 
  { 
    // Initialize a string that will hold all includes 
    $final_includes = ''; 
  
    foreach ($this->file_includes as $include) 
    { 
      // Check if it's a JS or a CSS file 
      if (preg_match('/js$/', $include)) 
      { 
        // It's a JS file 
        $final_includes .= '<script type="text/javascript" src="' . $include . '"></script>'; 
      } 
      elseif (preg_match('/css$/', $include)) 
      { 
        // It's a CSS file 
        $final_includes .= '<link href="' . $include . '" rel="stylesheet" type="text/css" />'; 
      } 
  
      return $final_includes; 
    } 
  } 
}
