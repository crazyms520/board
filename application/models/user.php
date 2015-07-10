<?php
class User extends CI_Model {
  function __construct(){
    parent::__construct();
  }

  public function get_user_by_id($id){
    $this->db->where('id',$id);

    $query = $this->db->get('board.users');

    $users = $query->result();

    if(count($users) > 0 ){
      return $users[0];
    } else {
      return null;
    }
  }
  public function add_user($data){
    $this->db->insert('board.users',$data);
  }

  public function get_user_by_ac($account){
    $this->db->where('account',$account);

    $query = $this->db->get('board.users');

    $users = $query->result();

    if(count($users) > 0){
      return $users[0];
    } else {
      return null;
    }

  }

  public function get_user_by_ap($account,$password){
    $this->db->where('account',$account);
    $this->db->where('password',$password);

    $query = $this->db->get('board.users');
    $users = $query->result();

    if(count($users) > 0){
      return $users[0];
    } else {
      return null;
    }

  }
}