<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends CI_Model
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
      $data['viewName'] = 'stock/index';
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
        $newStock = $this->input->post();
        $newStock['userId'] = $this->session->userdata('id');
        return json_encode($this->core_model->createData('stock', $newStock));
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }    
  }

  public function read()
  {
    $data['stock'] = $this->core_model->readAllData('viewStock');
    return json_encode($data);
  }

  public function readDetail()
  {
    $data['detail'] = $this->core_model->readSomeData('viewStockList', 'productId', $this->input->post('id'));
    return json_encode($data);
  }

}

?>
