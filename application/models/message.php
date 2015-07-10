<?php
class Message extends CI_Model {
  function __construct(){
    parent::__construct();
  }

  public function create($data){
    $this->db->insert('board.messages',$data);
  }

  public function all(){
    $this->db->select('*');
    $this->db->from('board.messages');
    $this->db->join('board.users','messages.user_id=users.id');

    $query = $this->db->get();
    $messages = $query->result();
    return $messages;
  }
}