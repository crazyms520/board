<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function create(){

		if(!user()){
			redirect();
		}

    $content = $this->input->post('content');


    if($_FILES['file']['error'] > 0){
      echo 'Error'.$_FILES['file']['error'].'<br />';
    } else {

      // echo '檔案名稱:'.$_FILES['file']['name'].'<br />';
      // echo '檔案類型:'.$_FILES['file']['type'].'<br />';
      // echo '檔案大小:'.$_FILES['file']['size'].'<br />';
      // echo '暫存名稱:'.$_FILES['file']['tmp_name'].'<br />';

      if(file_exists('images/'.$_FILES['file']['name'])){
        echo "檔案已存在！";
      }else{
      move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']);
      }
    }
    if(!$content){
      redirect();
    }

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

