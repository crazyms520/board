<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>留言板</title>
		<style type="text/css">
			.message_list {
				width: 400px;
				margin: 0 auto;
				margin-top: 50px;
				height: 500px;
				border: 1px solid rgba(161,161,161,1);
				overflow-y:auto;
				background-color: #2BC6F5;

			}
			.message_list .msg{
				border: 1px solid rgba(193,193,193,1);
				text-align: left;
				padding:10px;
				margin: 10px;
				border-radius: 4px;
				background-color: rgba(255,255,255,1);
			}
			.message_list .user{
				font-size: 20px;
				padding: 2px;
			}
			.message_list .content{
				padding: 10px;
				border-top: 1px solid rgba(39,40,34,.2);
				border-bottom: 1px solid rgba(39,40,34,.2);
				color: rgba(73,73,73,.8);
			}
			.message_list .created_at {
				text-align: right;
				color: rgba(73,73,73,.4);
				font-size: 12px;
				padding-top: 7px;
			}
			.input_area {
				width: 500px;
				margin: 0 auto;
				margin-top: 20px;
				height: 100px;
				border:1px solid rgba(255,0,0,0.3);
			}
			.file{
				margin: 0 auto;
				border:1px solid rgba(255,0,0,0.3);
			}
			img {
				border: 1px solid rgba(39,40,34,.25);
				width: 100px;
				height: 100px;
			}
			img:hover{
				-webkit-transform: scale(2,2);
			}
			textarea {
				margin-top: 10px;
				margin:10px auto;
				width: 495px;
				height: 105px;
				margin-bottom: 2px;
				border-radius: 3px;
				border: 1px solid rgba(39,40,34,.25);

				font-size: 19px;
				outline: 0;

			}
			textarea:focus {
				border:1px solid rgba(102,175,233,1);

				box-shadow: inset 0 1px 1px rgba(0,0,0,0.75),0,0,8px rgba(103,175,233,.6);

			}
			button {
				width: 500px;
        display: block;
        border: 0 solid transparent;
        color: rgba(255, 255, 255, .85);
        padding: 2px 10px 4px 10px;
        font-size: 25px;
        cursor: pointer;
        text-decoration: none;
        margin: 10px auto;
        padding: 20px 15px;
        font-weight: bolder;

        border-radius: 2px;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        box-shadow: inset -1px -1px 2px rgba(0, 0, 0, 0.1), inset 1px 1px 2px rgba(255, 255, 255, 0.1), 0 3px 10px rgba(0, 0, 0, 0.16);

        outline: 0;
        background-color: #FCC80A;
			}
			button:active {
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        box-shadow: inset 2px 2px 10px rgba(0, 0, 0, 0.225);
      }
      button:hover {
        background-color: rgba(245, 142, 0, 1);
      }
      .message {
        width: 400px;
        margin: 20px auto;
        text-align: center;
        font-size: 20px;
        padding: 10px;


        color: rgba(255, 0, 0, .6);
        border: 1px solid rgba(255, 0, 0, .3);
        background-color: rgba(255, 0, 0, .1);
        border-radius: 3px;
      }
		</style>

	</head>
	<body>
		<?php include FCPATH . 'application/views/include/header.php';?>
		<div class='message_list'>
			<?php if($messages){
				foreach ($messages as $message ){ ?>
				<div class='msg'>
					<div class='user'><?php echo $message->name;?>說:</div>
					<div class='content'><?php echo $message->content;?></div>
					<div class='created_at'><?php echo $message->created_at;?></div>
					<?php if ($message->picture) { ?>
					<img src='images/<?php echo $message->picture;?>'>
					<?php  } ?>
				</div>
		<?php }
			} ?>
		</div>
		<?php if (user()){?>
		<form action='<?php echo site_url('welcome/create')?>' method='POST' enctype="multipart/form-data">

			<textarea name='content' placeholder='請輸入內容..'></textarea>

			<P><input type='file' name='file' value='上傳檔案'></P>

			<button type='submit'>送出</button>
		</form>
	<?php } else { ?>
			<div class='message'>請登入後,才可留言。</div>
	<?php } ?>


	</body>
</html>