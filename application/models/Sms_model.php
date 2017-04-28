<?php
class Sms_model extends CI_Model {
  public $recepient;
  public $text;

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function create() {
    $query = $this->db->query(
      " INSERT INTO outbox (
        CreatorID,
        DestinationNumber,
        TextDecoded,
        Class
      ) VALUES (
        'Gammu 1.37.0',
        '".$this->recepient."',
        '".$this->text."',
        -1
      );
      "
    );

    return $query;
  }

  public function get($table){
    return $this->db->get($table);
  }
}
