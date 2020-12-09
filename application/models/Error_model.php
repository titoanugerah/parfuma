<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Error_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
  }


}

 ?>
