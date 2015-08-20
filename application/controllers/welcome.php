<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function create(){

		if(!user()){
			redirect();
		}

    $content = $this->input->post('content');
    $file = $_FILES['file']['name'];

    if(!$content && !$file){
      redirect();
    }
    move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']);
    $this->load->model('message');
    date_default_timezone_set('Asia/Taipei');
    $data = array(
      'user_id'=>user()->id,
      'content'=>$content,
      'created_at'=>date('Y-m-d H:i:s'),
      'picture'=>$_FILES['file']['name']
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

