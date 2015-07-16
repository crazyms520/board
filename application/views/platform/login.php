<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>登入</title>
    <style type="text/css">
      h1{
        margin-top: :50px;
      }
      .login{
        display: inline-block;
        width: :300px;
        text-align: center;
        margin-top: 30px;
      }
      .login input{
        width: 250px;
        height: 25px;
        margin-bottom: 2px;
        border-radius: 3px;
        border: 1px solid rgba(39,40,34..25);

        outline: 0;
      }
      .login input:focus{
        border:1px solid rgba(102,175,233,1);
        box-shadow: inset 0 1px rgba(0,0,0,.07)
      }
      hr {
        margin: 20px auto;
      }
      .login .buttons{
        text-align: right;
      }
      .login .buttons button {
        border:0 solid transparent;
        color:rgba(255,255,255,.85);
        padding: 2px 10px 4px 10px;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
        margin: 0;
        padding: 5px 15px;
        font-weight: bolder;

        border-radius: 2px;
        text-shadow:- 0 1px 3px rgba(0,0,0,0.3);
        box-shadow: inset -1px -1px 2px rgba(0,0,0,0.1),inset 1px 1px 2px rgba(255,255,255,0.1),0 3px 10px rgba(0,0,0,0.16);

        outline: 0;
        background-color: rgba(255,152,0,1);
      }
      .login .buttons button:active{
        text-shadow:0 1px 3px rgba(0,0,0,0.4);
        box-shadow: inset 2px 2px 10px rgba(0,0,0,0.255);
      }
      .login .buttons button:hover{
        background-color: rgba(245,142,0,1);
      }
      .login .buttons button [type='reset']{
        background-color: rgba(244,67,54,1);
      }
      .login.buttons button [type='reset']:hover{
        background-color: rgba(234,57,44,1);
      }

      </style>
  </head>

  <body>

    <?php include FCPATH . 'application/views/include/header.php';?>

    <h1>登入</h1>
    <form  class='login' action='<?php echo site_url ('platform/login_post')?>' method='post'>
      <p><input type='text' name='account' value='' placeholder='請輸入帳號..' /></p>
      <input type='password' name='password' value='' placeholder='請輸入密碼..' />
      <hr/>
      <div class='buttons'>
        <button type='reset'>重填</button>
        <button type='submit'>送出</button>
      </div>
    </form>

  </body>

</html>