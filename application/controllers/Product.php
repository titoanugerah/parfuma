<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('product_model');
    $this->load->model('core_model');
  }

  public function index(){
    $this->load->view('shared/template/management', $this->product_model->content());
  }

  #API
  public function read()
  {
    echo $this->product_model->read();
  }

  public function readDetail()
  {
    echo $this->product_model->readDetail();
  }

  public function recover()
  {
    echo $this->product_model->recover();
  }

  public function create()
  {
    echo $this->product_model->create();
  }

  public function update()
  {
    echo $this->product_model->update();
  }

  public function delete()
  {
    echo $this->product_model->delete();
  } 

  public function upload($id)
  {
    echo $this->core_model->upload('product', $id);
  }
}