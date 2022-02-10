<?php
include_once('functions/auth.php');
user_connect(); // AUTHENTIFICATION

// QUERY TO MYSQL DATABASE
include_once('functions/functions.php');
$userid = $_SESSION['connect']['userid'];
$account_type = $_SESSION['connect']['account_type'];
$results = queryUsers($account_type, $userid);

// HEADER HTML
$title = "Home";
require 'header.php';
?>

<table>
  <?php foreach($results as $row){ ?>
    <tr>
      <?php
      foreach($row as $col){
        echo "<td>$col</td>";
      }
      ?>
      <td><a href="details.php?id=<?= $row["id"]; ?>">details</a></td>
      <?php
      if ($account_type === "ADMIN" || $account_type === "NORMAL") {
      ?>
      <td><a href="edit.php?id=<?= $row["id"]; ?>">edit</a></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>

</body>
</html>
