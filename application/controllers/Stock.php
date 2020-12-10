<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('stock_model');
    $this->load->model('core_model');
  }

  public function index(){
    $this->load->view('shared/template/management', $this->stock_model->content());
  }

  #API
  public function read()
  {
    echo $this->stock_model->read();
  }

  public function readDetail()
  {
    echo $this->stock_model->readDetail();
  }

  public function create()
  {
    echo $this->stock_model->create();
  }


}