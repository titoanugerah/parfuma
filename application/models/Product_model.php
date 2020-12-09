<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
  }

  public function content()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      $data['viewName'] = 'product/index';
      return $data;
    }
    else
    {
      notify("Tidak Ada Akses", "Mohon maaf anda tidak memiliki hak akses untuk dapat mengakses halaman ini, silahkan hubungi IT Admin atau Super Admin", "danger", "fas fa-ban", "home" );
    }
  }

  public function create()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      try {  
        $newProduct = $this->input->post();
        $newProduct['userId'] = $this->session->userdata('id');
        return json_encode($this->core_model->createData('product', $newProduct));
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }    
  }

  public function read()
  {
    $data['product'] = $this->core_model->readAllData('product');
    return json_encode($data);
  }

  public function readDetail()
  {
    $data['detail'] = $this->core_model->readSingleData('product', 'id', $this->input->post('id'));
    return json_encode($data);
  }

  public function update()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      return json_encode($this->core_model->updateDataBatch('product',  'id', $this->input->post('id'), $this->input->post()));
    }
    
  }

  public function recover()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      return json_encode($this->core_model->recoverData('product', 'id', $this->input->post('id')));
    }
  }

  public function delete()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      return json_encode($this->core_model->deleteData('product', 'id', $this->input->post('id')));
    }
    
  }
}

?>
