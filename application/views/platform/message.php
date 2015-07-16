<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <?php include FCPATH . 'application/views/include/header.php';?>


    <div class='message'>
      <h2><?php echo $message;?></h2>
    </div>


  </body>
</html>