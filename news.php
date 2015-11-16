<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>娛樂討論區</title>
    <script type="text/javascript">
      function check_data(){
          if(document.myForm.author.value.length == 0)
            alert("作者欄位不可空白！");
          else if (document.myForm.subject.value.length == 0)
            alert("主題欄位不可空白！");
          else if(document.myForm.content.value.length == 0)
            alert("內容欄位不可空白！");
          else
            myForm.submit();
        }
    </script>
  </head>
  <body>
    <?php
    require_once('db.php');

    $records_per_page = 5;

    if(isset($_GET['page']))
      $page = $_GET['page'];
    else
      $page = 1;

    $link = create_connection();
    $sql = "SELECT id,author,subject,date FROM messages ORDER BY date DESC";

    $result = excute_sql('board',$sql,$link);

    $total_records = mysql_num_rows($result);

    $total_pages = ceil($total_records/$records_per_page);

    $start_record = $records_per_page*($page - 1);

    mysql_data_seek($result,$started_record);

    echo "<table width='800' align='center' cellspacing='3'>";

    $bg[0] = "#D9D9FF";
    $bg[1] = "#FFCAEE";
    $bg[2] = "#FFFFCC";
    $bg[3] = "#B9EEB9";
    $bg[4] = "#B9E9FF";

    $j =1;
    while ($row = mysql_fetch_array($result) and $j <= $records_per_page)
    {
      echo "<tr>";
      echo "<td width='120' align='center'><img src='images/default-avatar.png' width='80'></td>";
      echo "<td bgcolor='".$bg[$j - 1]."'>作者:".$row["author"]."<br>";
      echo "主題:".$row["subject"]."<br>";
      echo "時間:".$row["date"]."<hr>";
      echo "<a href='show_news.php?id=";
      echo $row["id"]."'>閱讀與加入討論</a></td></tr>";
      $j++;
    }
    echo "</table>"
    ?>
  </body>
</html>