<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
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
      $data['viewName'] = 'order/index';
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
        $newOrder = $this->input->post();
        $newOrder['userId'] = $this->session->userdata('id');
        return json_encode($this->core_model->createData('order', $newOrder));
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }    
  }

  public function read()
  {
    $data['order'] = $this->core_model->readAllData('viewOrder');
    return json_encode($data);
  }

  public function readDetail()
  {
    $data['order'] = $this->core_model->readSingleData('viewOrder', 'id', $this->input->post('id'));
    $data['detail'] = $this->core_model->readSomeData('viewOrderDetail', 'orderId', $this->input->post('id'));
    $data['log'] = $this->core_model->readSomeData('viewOrderLog', 'orderId', $this->input->post('id'));
     return json_encode($data);
  }

  public function readDetailTable($id)
  {
    $result['draw'] = 1;
    $result['recordsTotal'] = $this->core_model->getNumRows('viewOrderDetail', 'orderId', $id);
    $result['recordsFiltered'] = $this->core_model->getNumRows('viewOrderDetail', 'orderId', $id);
    $result['data'] = ($this->db->query('select product, price, qty, total from viewOrderDetail where orderId = '.$id))->result_array();
    return json_encode($result);
  }

  public function confirmDelivery()
  {
    $id = $this->input->post('id');
    $this->core_model->createLogTransaction($id, 4);
    $this->core_model->updateData('order', 'id', $id, 'lastLogId', $this->db->insert_id());
    return http_response_code(200);  
  }

  public function confirmPayment()
  {
    $id = $this->input->post('id');
    $this->core_model->createLogTransaction($id, 3);
    $this->core_model->updateData('order', 'id', $id, 'lastLogId', $this->db->insert_id());
    return http_response_code(200);
  }

}

?>
