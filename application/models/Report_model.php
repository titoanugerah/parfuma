<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model
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
      $data['viewName'] = 'report/index';
      return $data;
    }
    else
    {
      notify("Tidak Ada Akses", "Mohon maaf anda tidak memiliki hak akses untuk dapat mengakses halaman ini, silahkan hubungi IT Admin atau Super Admin", "danger", "fas fa-ban", "home" );
    }
  }

  public function read()
  {
    $result['draw'] = 1;
    $result['recordsTotal'] = $this->core_model->getNumRow('viewOrderDetail','','');
    $result['recordsFiltered'] = $this->core_model->getNumRow('viewOrderDetail','','');
    $data['data'] = $this->core_model->readAllData('viewOrderDetail');
    return json_encode($data);
  }

  public function readDetail()
  {
    $data['detail'] = $this->core_model->readSomeData('viewReportList', 'productId', $this->input->post('id'));
    return json_encode($data);
  }

}

?>
