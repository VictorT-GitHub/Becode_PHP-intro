<?php
include_once('functions/auth.php');
user_connect(); // AUTHENTIFICATION
petit_curieu('NORMAL');

// QUERY TO MYSQL DATABASE
include_once('functions/functions.php');
$userInfo = queryUserById($_GET['id']);

// Empeche moderator d'avoir accès aux profils admin
$account_type = $_SESSION['connect']['account_type'];
if ($account_type === 'MODERATOR' && $userInfo['account_type'] === 'ADMIN') {
  header('Location: /index.php');
  exit();
}

// HEADER HTML
$title = "Details";
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
    <?php
      foreach($userInfo as $col){
        echo "<td>$col</td>";
      }
    ?>
  </tr>
</table>

</body>
</html>
