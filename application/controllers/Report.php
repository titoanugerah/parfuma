<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('report_model');
    $this->load->model('core_model');
  }

  public function index(){
    $this->load->view('shared/template/management', $this->report_model->content());
  }

  #API
  public function read()
  {
    echo $this->report_model->read();
  }

  public function chart()
  {
    echo $this->report_model->chart();
  }
}