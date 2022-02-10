<?php
session_start();
unset($_SESSION['connect']); // Supprime la connection de l'user (Delete 'connect' obj)

header('Location: /login.php'); // Redirige vers login.php
?>