<?php
include_once('functions/auth.php');
user_connect(); // AUTHENTIFICATION
petit_curieu('NORMAL');
petit_curieu('MODERATOR');

// QUERY TO MYSQL DATABASE
include_once('functions/functions.php');
$userInfo = queryUserById($_GET['id']);

// HEADER HTML
$title = "Edit";
require 'header.php';
?>

<table>
  <tr>
    <?php
      foreach($userInfo as $key => $col){
        echo "<td>$key</td>";
      }
    ?>
  </tr>
  
    <tr>
      <td><input type='number' /></td>
      <td><input type='text' /></td>
      <td><input type='text' /></td>
      <td><input type='text' /></td>
      <td><input type='text' /></td>
      <td><input type='text' /></td>
      <td><button><a href="/edit.php?id=<?= $_GET['id']; ?>">edit</a></button></td>
    </tr>

  <tr>
    <?php
      foreach($userInfo as $col){
        echo "<td>$col</td>";
      }
    ?>
    <td><button><a href="/delete.php?id=<?= $_GET['id']; ?>">delete</a></button></td>
  </tr>
</table>

</body>
</html>
