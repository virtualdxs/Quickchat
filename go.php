<?php
if (! isset($_GET['group']))
{
	die('No group specified');
}

$group = $_GET['group'];

if ($group == '')
{
	die('Group name cannot be blank');
}

if (! file_exists('./rooms/' . $group . '/'))
{
    strip_tags($group);
    str_replace('\\', '', $group);
    mkdir('./rooms/' . $group . '/');
    touch('./rooms/' . $group . '/chat.txt');
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset='utf-8'>
<title>Quick Chat</title>
<link rel="stylesheet" type="text/css" href="./css/chat.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
<div class="title"><?php echo $group;?></div>
<div class="share">
Nickname: <input type="text" id="username">
<br>
<input type="checkbox" id="toggleAlert">
Play New Message Sound
</div>
<div id="chatBox">Loading chat...</div>
<div class='chat'>
<br><br>
<form onsubmit="return false;">
<input type="text" id="message">
<br><br>
<input type="submit" id="submitChat">Enter</button>
</form>
</div>
<script src='./js/mainjs.php?group=<?php echo $group;?>'></script>
<audio id="alert">
<source src="./sound/alert.mp3" type="audio/mpeg">
</audio>
</body>
</html>
