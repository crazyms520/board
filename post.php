<?php
  date_default_timezone_set('Asia/Taipei');
  $userid = $_POST['userid'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $created_at = date("Y-m-d H:i:s");
  $link = @mysql_connect("127.0.0.1","root","0000");
  mysql_select_db("board",$link) or die('開啟失敗'.mysql_error($link));
  $result = mysql_query("INSERT INTO messages(user_id,content,created_at)VALUES('$userid','$content','$created_at')",$link);
  mysql_close($link);
  header("location:index.php");
  exit();
