<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('order_model');
    $this->load->model('core_model');
  }

  public function index(){
    $this->load->view('shared/template/management', $this->order_model->content());
  }

  #API
  public function read()
  {
    echo $this->order_model->read();
  }

  public function readDetail()
  {
    echo $this->order_model->readDetail();
  }

  public function readDetailTable($id)
  {
    echo $this->order_model->readDetailTable($id);
  }

  public function confirmPayment()
  {
    echo $this->order_model->confirmPayment();
  }

  public function confirmDelivery()
  {
    echo $this->order_model->confirmDelivery();
  }

  public function recover()
  {
    echo $this->order_model->recover();
  }

  public function create()
  {
    echo $this->order_model->create();
  }

  public function update()
  {
    echo $this->order_model->update();
  }

  public function delete()
  {
    echo $this->order_model->delete();
  } 

  public function upload($id)
  {
    echo $this->core_model->upload('order', $id);
  }
}