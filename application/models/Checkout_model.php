<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Checkout_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('core_model');
//    $this->load->model('product_model');
  }
  //CONTENT
  public function content()
  {
    $data['viewName'] = 'Checkout/index';
    $id = $this->input->post('id');
    if(empty($id)){
      $id = ($this->core_model->readSingleData2('viewOrder', array('userId' => $this->session->userdata('id'), 'statusId' => 2)))->id;   
    }
    $data['order'] = $this->core_model->readSingleData('viewOrder', 'id', $id);
    $data['detail'] = $this->core_model->readSomeData('viewOrderDetail', 'orderId', $id);
   return $data;
  }

  public function delete($id)
  {
    $this->core_model->forceDeleteData('orderDetail', 'id', $id);
    redirect(base_url('checkout'));
  }

  public function update($id)
  {
    // $log = $this->core_model->createLogTransaction($id, 2);
    // $this->core_model->updateData('order', 'id', $id, 'lastLogId', $log['id']);
    $this->core_model->updateData('order', 'id', $id, 'address', $this->input->post('address'));    
    redirect(base_url('home'));
  }

  public function startCheckout()
  {
    $checkout = $this->input->post();
    $newOrder = array (
      'userId' => $this->session->userdata('id'),
      'lastLogId' => 0      
    );
    $order = $this->core_model->createData('order', $newOrder);
    $log = $this->core_model->createLogTransaction($order['id'], 2);
    $this->core_model->updateData('order', 'id', $order['id'], 'lastLogId', $log['id']);
    for($i = 1; !empty($checkout['quantity_'.$i]); $i++){
      $detail = array(
        'orderId' => $order['id'],
        'productId' => ($this->core_model->readSingleData('product', 'name', $checkout['transmitv_item_'.$i]))->id,
        'price' => $checkout['amount_'.$i],
        'qty' => $checkout['quantity_'.$i]
      );
      $this->core_model->createData('orderDetail', $detail);
    }
    redirect(base_url('checkout'));
  }
}

 ?>
