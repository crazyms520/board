<?php
function create_connection(){
   $link = @mysql_connect("127.0.0.1","root","0000") or die("無法建立連接");
   return $link;

}

function excute_sql($database,$sql,$link){
  $db_selected = mysql_select_db($database,$link) or die ('開啟失敗'.mysqli_error($link));
  $result =mysql_query($sql,$link);
  return $result;
}
?>