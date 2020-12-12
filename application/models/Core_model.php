<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Core_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function readSingleData($table, $whereVar, $whereVal )
  {
    $data = $this->db->get_where($table, $where = array($whereVar => $whereVal ));
    return $data->row();
  }

  public function readSomeData($table, $whereVar, $whereVal )
  {
    $list = $this->db->list_fields($table);
    $keyword = $this->input->post('keyword');
    $likeQuery = "";
    foreach ($list as $item)
    {
      if ($item=='id') {
        
      } else {
        #$this->db->or_like($item, $this->input->post('keyword'));
        $likeQuery = $likeQuery .' '.$item.' LIKE "%'.$keyword.'%" or ';
      }
    }
    $query = 'SELECT * FROM '.$table.' where '.$whereVar.' = '.$whereVal.' and ('.rtrim($likeQuery, 'or ').')';
    $data = $this->db->query($query);
    #$data = $this->db->get_where($table, $where = array($whereVar => $whereVal));
    return $data->result();
  }

  public function readAllData($table)
  {
    $list = $this->db->list_fields($table);
    foreach ($list as $item)
    {
      $this->db->or_like($item, $this->input->post('keyword'));
    }
    $data = $this->db->get($table);
    return $data->result();
  }

  public function recoverData($table, $whereVar, $whereVal)
  {
    $result['isSuccess'] = false;
    $where = array($whereVar => $whereVal );
    $data = array('isExist' => 1 );
    $this->db->where($where);
    $result['isSuccess'] = $this->db->update($table, $data);
    $result['content'] = "Data berhasil dipulihkan";
    return $result;
  }

  public function updateDataBatch($table, $whereVar, $whereVal, $data)
  {
    $result['isSuccess'] = false;
    $where = array($whereVar => $whereVal );
    $this->db->where($where);
    $result['isSuccess'] = $this->db->update($table, $data);
    $result['content'] = "Data berhasil dirubah";
    return $result;
  }

  public function createData($table, $data)
  {
    $result['isSuccess'] = $this->db->insert($table, $data);
    $result['id'] = $this->db->insert_id();
    $result['content'] = "Data berhasil ditambahkan";
    return $result;
  }

  public function getNumRows($table, $whereVar, $whereVal )
  {
    $data = $this->db->get_where($table, $where = array($whereVar => $whereVal ));
    return $data->num_rows();
  }

  public function updateData($table, $whereVar, $whereVal, $setVar, $setVal)
  {
    $where = array($whereVar => $whereVal );
    $data = array($setVar => $setVal );
    $this->db->where($where);
    $this->db->update($table, $data);
    $result['content'] = "Data berhasil dirubah";
    return $result;
  }

  public function updateSomeData($table, $whereVar, $whereVal, $setArray)
  {
    $where = array($whereVar => $whereVal );
    $this->db->where($where);
    $this->db->update($table, $setArray);
  }


  public function deleteData($table, $whereVar, $whereVal)
  {
    $data['isSuccess'] = false;
    $where = array($whereVar => $whereVal );
    $data = array('isExist' => 0 );
    $this->db->where($where);
    $result['isSuccess'] = $this->db->update($table, $data);
    $result['content'] = "Data berhasil dihapus";
    return $result;
  }

  public function forceDeleteData($table, $whereVar, $whereVal)
  {
    $data['isSuccess'] = false;
    $where = array($whereVar => $whereVal );
    $result['isSuccess'] =     $this->db->delete($table, $where);
    $result['content'] = "Data berhasil dihapus";
    return $result;
  }

  public function createLog($log)
  {
    $log['userId'] = $this->session->userdata('id');
    return $this->createData('log', $log);
  }

  public function createLogTransaction($orderId, $statusId)
  {
    $name = $this->session->userdata('name');
    if($statusId == 2){
      $remark =  $name.' selaku pembeli berhasil melakukan checkout, selanjutnya pembeli diharuskan membayar sesuai subtotal yang ada dan penjual diharapkan mengkonfirmasi pembayaran yang dikirm oleh pembeli ';
    } else if($statusId == 3){
      $remark = $name.' selaku penjual berhasil melakukan konfirmasi pembayaran, selanjutnya barang sedang dikemas oleh penjual ';
    } else if($statusId == 4){
      $remark = $name.' selaku penjual berhasil melakukan pengiriman ';
    } 

    $log = array(
      'type' => 3,
      'key' => $orderId,
      'statusId' => $statusId,
      'remark' => $remark
    );
     return $this->createLog($log);
  }


  public function upload($type,$id)
  {

    $filename = $type.'_'.$id;
    $config['upload_path'] =  APPPATH.'../assets/picture/';
    $config['overwrite'] = TRUE;
    $config['file_name']     =  str_replace(' ','_',$filename);
    $config['allowed_types'] = 'jpg|png|jpeg';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('file')) {
      $upload['status']= 'danger';
      $upload['message']= "Mohon maaf terjadi error saat proses upload : ".$this->upload->display_errors();
    } else {
      $upload['status']= 'success';
      $upload['message'] = "File berhasil di upload";
      $upload['ext'] = $this->upload->data('file_ext');
      $upload['filename'] = $filename;
      $this->updateData($type, 'id', $id, 'image', $filename.$upload['ext']);
    }
    return json_encode($upload);
  }

  public function account()
  {
    try {
    //Call lib
      require_once 'vendor/autoload.php';
      $client = new Google_Client();
      $client->setAuthConfig('assets/client_credentials.json');
      $client->addScope("email");
      $client->addScope("profile");
      if (!$this->session->userdata('isLogin'))
      {
        if (isset($_GET['code']))
        {
          $token = $client->fetchAccessTokenWithAuthCode($this->input->get('code'));
          $client->setAccessToken($token['access_token']);
          $validUser = (new Google_Service_Oauth2($client))->userinfo->get();
          $data = array(
            'name' =>  $validUser->name,
            'image' => $validUser->picture,
          );
          
          $isRegisteredUser = $this->getNumRows('user', 'email', $validUser->email);
          if ($isRegisteredUser)
          {
            $this->updateSomeData('user', 'email', $validUser->email, $data);
          }
          else
          {
            $newUser = array(
              'name' => $data['name'],
              'email' => $validUser->email,
              'image' => $data['image'],
              'roleId' => $this->config->item('customer_role_id')
            );
            $this->createData('user', $newUser);
          }
          $user = $this->readSingleData('viewUser', 'email', $validUser->email);
          $userdata = array(
            'isLogin' => true,
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'image' => $user->image,
            'roleId' => $user->roleId,
            'role' => $user->role,
          );
          $this->session->set_userdata($userdata);
          redirect(base_url('home'));
        }
        else
        {
          $this->session->set_flashdata('link', $client->createAuthUrl());
        }
      }
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }


}
 ?>
