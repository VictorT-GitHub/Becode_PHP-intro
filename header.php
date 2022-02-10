<?php
include_once('functions/auth.php');
$user_is_connected = is_connect(); // Permet de pas avoir le logout btn sur login page
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>
<body>
  <h1><?= $title ?></h1>
  
  <!-- Permet de pas avoir le logout btn sur login page -->
  <?php if ($user_is_connected === true) { ?>
    <button><a href="/logout.php">Log out</a></button>
  <?php } ?>