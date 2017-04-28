<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('sms_model','sms_db');
  }

  public function get($table) {
    $data = $this->sms_db->get($table)->result();

    if($data) {
      $statuscode = 200;
      $msg = "Berhasil mengambil ke sms_db";
    } else {
      $statuscode = 500;
      $msg = "Gagal mengambil ke sms_db";
    }

    return $this->output
        ->set_content_type('application/json')
        ->set_output(
          json_encode(
            array(
              'statuscode' => $statuscode,
              'msg' => $msg,
              'data' => $data
            )
          )
        );
  }

  public function add(){
    $this->sms_db->recepient = $this->input->post('recepient');
    $this->sms_db->text = $this->input->post('text');

    $issucces = $this->sms_db->create();

    if($issucces) {
      $statuscode = 200;
      $msg = "Berhasil memasukkan ke sms_db";
    } else {
      $statuscode = 500;
      $msg = "Gagal memasukkan ke sms_db";
    }

    $data = null;

    return $this->output
        ->set_content_type('application/json')
        ->set_output(
          json_encode(
            array(
              'statuscode' => $statuscode,
              'msg' => $msg,
              'data' => $data
            )
          )
        );
  }
}
