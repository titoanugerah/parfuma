<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
    $this->load->model('product_model');
  }
  //CONTENT
  public function content()
  {
    $data['viewName'] = 'home/index';
    $list = $this->db->list_fields('product');
    foreach ($list as $item)
    {
        $this->db->or_like($item, $this->input->post('keyword'));
    }
    $data['products'] = ($this->db->get('product'))->result();
    $this->core_model->account();
    return $data;
  }
  ###

}

 ?>
