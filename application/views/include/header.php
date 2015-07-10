<a href='<?php echo site_url ()?>'>首頁</a>
<?php
  if(user()) {?>
    <a href='<?php echo site_url('platform/logout')?>'>登出</a>
 <?php
  } else { ?>
    <a href='<?php echo site_url('platform/login')?>'>登入</a>
    <a href='<?php echo site_url('platform/register')?>'>註冊</a>
  <?php } ?>