<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
  }
  //CONTENT
  public function content()
  {
    $data['viewName'] = 'dashboard/index';
    return $data;
  }
  ###

}

 ?>
