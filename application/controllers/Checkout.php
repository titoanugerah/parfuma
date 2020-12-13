<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
   $this->load->model('checkout_model');
  }

  public function index()
  {
    $this->load->view('shared/template/customer', $this->checkout_model->content());
  }

  public function delete($id){
    $this->checkout_model->delete($id);
  }


  public function startCheckout()
  {
    $this->checkout_model->startCheckout();
  }

  public function update($id)
  {
    $this->checkout_model->update($id);
  }

}


 ?>
