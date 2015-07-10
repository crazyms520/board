<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <?php include APPPATH . 'views/include/header.php';?>

    <h1>註冊</h1>
    <form action='<?php echo site_url ('platform/register_post')?>' method='post'>
      <p><input type='text' name='name' value='' placeholder='請輸入暱稱..' /></p>
      <p><input type='text' name='account' value='' placeholder='請輸入帳號..' /></p>
      <p><input type='password' name='password' value='' placeholder='請輸入密碼..' /></p>
      <hr/>
        <button type='reset'>重填</button>
        <button type='submit'>送出</button>
    </form>

  </body>
</html>