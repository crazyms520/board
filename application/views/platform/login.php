<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>登入</title>

  </head>
  <body>
    <?php include APPPATH . 'views/include/header.php';?>

    <h1>登入</h1>
    <form  action='<?php echo site_url ('platform/login_post')?>' method='post'>
      <input type='text' name='account' value='' placeholder='請輸入帳號..' />
      <input type='password' name='password' value='' placeholder='請輸入密碼..' />
      <hr/>

        <button type='reset'>重填</button>
        <button type='submit'>送出</button>

    </form>

  </body>
</html>