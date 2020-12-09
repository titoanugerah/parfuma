<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('home_model');
  }

  public function index()
  {
    $this->load->view('shared/template/customer', $this->home_model->content());
  }

}


 ?>
