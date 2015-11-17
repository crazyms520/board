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

    $started_record = $records_per_page*($page - 1);

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
    echo "</table>";

    echo "<p align='center'>";
    if($page > 1)
        echo "<a style='text-decoration:none' href='news.php?page=".($page-1)."'>下一頁</a>";
    for($i = 1 ; $i <=$total_pages; $i++){
      if($i == $page)
        echo "$i";
      else
        echo "<a style='text-decoration:none' href='news.php?page=$i'>$i</a>";
    }
    if($page < $total_pages)
      echo "<a style='text-decoration:none'hrfe='news.php?page=".($page + 1)."'>下一頁</a>";

    echo "</p>";

    mysql_free_result($result);
    mysql_close($link);
    ?>
    <hr>
    <form name="myForm" method='post' action='news_post.php'>
      <table border='0' width='800' align='center' cellspacing='0'>
        <tr bgcolor="#0084CA" align='center'>
          <td colspan='2'><font color='white'>請在此輸入新的討論區</td>
        </tr>
        <tr bgcolor='#D9F2FF'>
            <td width='15%'>作者</td>
            <td width='85%'>
              <input name='author' type='text' size='50'>
            </td>
          </tr>
          <tr bgcolor='#84D7FF'>
            <td width='15%'>主題</td>
            <td width='85%'>
              <input name='subject' type='text' size='50'>
            </td>
          </tr>
          <tr bgcolor='#D9F2FF'>
            <td width='15%'>內容</td>
            <td width='85%'>
              <textarea name='content' cols='50' rows='5'></textarea>
            </td>
          </tr>
          <tr>
            <td colspan='2' height='40' align="center">
              <input type='button' value='張貼討論' onclick="check_data()">
              <input type='reset' value='重新輸入'>
            </td>
          </tr>
      </table>

    </form>

  </body>
</html>