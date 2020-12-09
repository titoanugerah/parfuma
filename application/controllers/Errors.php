<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('error_model');
  }

  public function index()
  {
    $this->load->view('errors/404');
  }

}


 ?>
