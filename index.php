<!docytpe html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>訪客留言表</title>
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


      $records_per_page = 5;

      if(isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;

      require_once('db.php');
      // $link = @mysql_connect("127.0.0.1","root","0000") or die ("無法建立連接");
      // mysql_select_db("board",$link) or die ('開啟失敗'.mysqli_error($link));
      // $result = mysql_query("SELECT * FROM messages INNER JOIN users ON users.id=messages.user_id ORDER BY created_at DESC",$link);
      $link = create_connection();
      $sql = "SELECT * FROM messages ORDER BY date DESC";
      $result = excute_sql("board",$sql,$link);
      $total_records = mysql_num_rows($result) ;

      $total_pages = ceil($total_records/$records_per_page);

      $started_record = $records_per_page * ($page-1);

      mysql_data_seek($result, $started_record);

      $bg[0] = "#D9D9FF";
      $bg[1] = "#FFCAEE";
      $bg[2] = "#FFFFCC";
      $bg[3] = "#B9EEB9";
      $bg[4] = "#B9E9FF";

      echo "<table width='800' align='center' cellspacing='3'>";

      $j=1;
      while ($row = mysql_fetch_array($result) and $j <= $records_per_page) {
        echo "<tr bgcolor='".$bg[$j-1]."'>";
        echo "<td width='80'><img src='images/default-avatar.png' width='80'></td>";
        echo "<td>author:".$row["author"]."<br>"."subject:".$row["subject"]."<br>"."content:".$row["content"]."<br>"."date:".$row['date']."</td></tr>";
        $j++;
      }
      echo "</table>";
      echo "<p align='center'>";
      if($page >= 2)
        echo "<a href='index.php?page=".($page-1)."'>上一頁</a>";
      for($i = 1; $i <= $total_pages ; $i++)
      {
        if($i == $page)
          echo "$i";
        else
          echo "<a href='index.php?page=$i'>$i</a>";
      }

      if($page < $total_pages)
        echo "<a href='index.php?page=".($page+1)."'>下一頁</a>";
      echo "</p>";
      mysql_free_result($result);
      mysql_close($link);
      ?>
      <form name='myForm' action='post.php' method='post'>
        <table border='0' width='800' align='center' cellspacing='0'>
          <tr bgcolor='#0084CA' align='center'>
            <td colspan='2'>
              <font color="#FFFFFF">請在此輸入新留言</font>
            </td>
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
            <td colspan='2' align="center">
              <input type='button' value='張貼留言' onclick="check_data()">
              <input type='reset' value='重新輸入'>
            </td>
          </tr>
        </table>
      </form>
  </body>