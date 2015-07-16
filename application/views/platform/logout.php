<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>登出</title>
  </head>
  <style type="text/css">
    .message {
      display: inline-block;
      width: 300px;
      margin: 0 auto;
      margin-top: 30px;
      border: 1px solid rgba(255, 0, 0, .3);
      border-radius: 3px;
      background-color: rgba(255, 0, 0, .1);
      color: rgba(255, 0, 0, .8);
    }
  </style>

  <body>
    <?php include APPPATH . 'views/include/header.php';?>

    <div class='message'>
      <?php echo $message;?>
    </div>

  </body>
</html>