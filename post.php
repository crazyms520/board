<?php
  date_default_timezone_set('Asia/Taipei');
  require_once("db.php");
  $author = $_POST['author'];
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  $date = date("Y-m-d H:i:s");
  $link = create_connection();
  $sql = "INSERT INTO messages(author,subject,content,date)VALUES('$author','$subject','$content','$date')";
  $result = excute_sql("board",$sql,$link);
  mysql_close($link);
  header("location:index.php");
  exit();
