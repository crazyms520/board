<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function create(){

		if(!user()){
			redirect();
		}

    $content = $this->input->post('content');

    if(!$content){
      redirect();
    }

    $this->load->model('message');
    date_default_timezone_set('Asia/Taipei');
    $data = array(
      'user_id'=>user()->id,
      'content'=>$content,
      'created_at'=>date('Y-m-d H:i:s')
      );
    $this->message->create($data);

    redirect();

	}

	public function index()
	{
    $this->load->model('message');
    $messages =$this->message->all();
		$this->load->view('welcome_message',array(
      'messages'=>$messages
      ));
	}
}

