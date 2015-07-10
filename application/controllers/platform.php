<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Platform extends CI_Controller {

  public function login(){
    if(user()){
      redirect();
    }
    $this->load->view('platform/login');
  }

  public function login_post(){
    if(user()){
      redirect();
    }

    $account = $this->input->post('account');
    $password = $this->input->post('password');

    $this->load->model('user');

    $user =$this->user->get_user_by_ap($account,$password);

    if($user){

      user_login($user->id);
      $message = '登入成功';
    } else {
      $message = '登入失敗';
    }

    $this->load->view('platform/message',array(
      'message'=>$message
      ));

  }
  public function logout(){
    if(!user()){
      redirect();
    }
    $message='登出成功';

    user_login(0);

    $this->load->view('platform/logout',array(
      'message'=>$message
      ));
   }

  public function register(){
    if(user()){
      redirect();
    }
    $this->load->view('platform/register');

  }

  public function register_post(){
    if(user()){
      redirect();
  }

  $name = $this->input->post('name');
  $account = $this->input->post('account');
  $password = $this->input->post('password');

  if(!($name && $account && $password)) {
    return $this->load->view('platform/message',array(
      'message'=>'填寫資料有誤'
      ));
  }

  $this->load->model('user');

  $user = $this->user->get_user_by_ac ($account);

  if($user){
    return $this->load->view('platform/message',array(
      'message'=>'帳號重覆'
      ));
  }

  $data = array(
    'name'=>$name,
    'account'=>$account,
    'password'=>$password
    );

  $this->user->add_user($data);

  $this->load->view('platform/message',array(
    'message'=>'註冊成功'
    ));
  }
  public function index()
  {

    $this->load->view('welcome_message');
  }
}

