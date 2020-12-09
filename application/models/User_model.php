<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
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
      $data['viewName'] = 'user/index';
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
      return json_encode($this->core_model->createData('user',  $this->input->post()));
    }    
  }

  public function read()
  {
    $data['user'] = $this->core_model->readAllData('user');
    return json_encode($data);
  }

  public function readDetail()
  {
    $data['detail'] = $this->core_model->readSingleData('user', 'id', $this->input->post('id'));
    return json_encode($data);
  }

  public function update()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      return json_encode($this->core_model->updateDataBatch('user',  'id', $this->input->post('id'), $this->input->post()));
    }
    
  }

  public function recover()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      return json_encode($this->core_model->recoverData('user', 'id', $this->input->post('id')));
    }
  }

  public function delete()
  {
    if ($this->session->userdata['roleId'] != $this->config->item('customer_role_id'))
    {
      return json_encode($this->core_model->deleteData('user', 'id', $this->input->post('id')));
    }
    
  }
}

?>
