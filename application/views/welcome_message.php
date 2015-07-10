<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>留言板</title>


	</head>
	<body>
		<?php include APPPATH.'views/include/header.php'; ?>
		<?php if($messages){
		foreach ($messages as $message ){ ?>
		<p><?php echo $message->name;?>說:</p>
		<p><?php echo $message->content;?></p>
		<?php echo $message->created_at;?>
		<?php }
			} ?>

		<?php if (user()){?>
		<form action='<?php echo site_url('welcome/create')?>' method='POST'>
			<textarea name='content' placeholder='請輸入內容..'></textarea>
			<button type='submit'>送出</button>
			</form>
	<?php } else { ?>
			<p>請登入後,才可留言。</p>
	<?php } ?>


	</body>
</html>