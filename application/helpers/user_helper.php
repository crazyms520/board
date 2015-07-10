<?php



  if( ! function_exists('user')){
    function user ($user_id=''){
      // 取得 ci 資源 詳見ＣＩ手冊建立自己的程式庫
      $CI =& get_instance();

      // 取得存在 session 內的 user_id 詳見ＣＩ手冊session類別
      $user_id =  $CI->session->userdata ('user_id');


      if(!$user_id){
        return null ;
      }

      $CI->load->model('user');
      return $CI->user->get_user_by_id($user_id);
    }
  }
  if(! function_exists('user_login')) {
    function user_login($user_id) {
      // 取得 ci 資源 詳見ＣＩ手冊建立自己的程式庫
      $CI =& get_instance();

      // 設定存入 session 內的 user_id 詳見ＣＩ手冊session類別
      $CI->session->set_userdata('user_id', $user_id, 86500);
      return true;
    }
  }