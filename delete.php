<?php 
include_once('functions/auth.php');
user_connect(); // AUTHENTIFICATION
petit_curieu('NORMAL');
petit_curieu('MODERATOR');

include_once('functions/functions.php');
deleteUSer($_GET['id']);

header('Location: /index.php');
?>