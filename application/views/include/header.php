<style type="text/css">
  body {
    text-align: center;
    background-color: rgba(239, 239, 239, 1);
  }

  }
  .header {
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(30,40,34, .5);
    margin: 10px auto;

  }
  .header a {
    font-size: 20px;
    color: rgba(72,98,163,1);
    text-decoration: none;
    margin-right: 10px;

  }
  .heager a:hover {
    text-decoration: underline;
  }
  </style>

  <div class='header'>
    <a href='<?php echo site_url ()?>'>首頁</a>
    <?php
      if(user()) {?>
        <a href='<?php echo site_url('platform/logout')?>'>登出</a>
        <hr>
    <?php
      } else { ?>
        <a href='<?php echo site_url('platform/login')?>'>登入</a>
        <a href='<?php echo site_url('platform/register')?>'>註冊</a>
        <hr>
    <?php } ?>
  </div>