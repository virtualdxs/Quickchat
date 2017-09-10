<?php
if (! (isset($_GET['text']) and isset($_GET['group']) and isset($_GET['user']))) die("invalid request");

$text = strip_tags($_GET['text']);
$group = $_GET['group'];
$username = strip_tags($_GET['user']);

if ($group == '' or $text == '' or $username == '') die("invalid request");

date_default_timezone_set('America/Phoenix');
$text = '<p class="chatText">' . date('Y-m-d H:i') . ' - ' . $username . ': ' . $text . '</p>';
file_put_contents('./rooms/' . $group . '/chat.txt', $text, FILE_APPEND);
die(0);
?>
