<?php
// If user is already connected -> redirect to homepage
include_once('functions/auth.php');
if (is_connect()) {
  header('Location: /index.php');
  exit();
}

include_once('functions/functions.php');

// YOU SHALL NOT PASS
$error = null;
if (isset($_POST['email'], $_POST['password'])) {

  $regex_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $regex_mdp = strlen($_POST['password']) < 8 ? false : true;

  if ($regex_email && $regex_mdp) {
    
    $user_data = query_user_auth($_POST['email']);

    if ($user_data) {

      if ($user_data['password'] === $_POST['password']) {

        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
        // Create a 'connect' object in $_SESSION for this user 
        $_SESSION['connect'] = [
          'userid' => $user_data['id'],
          'account_type' => $user_data['account_type']
        ];
        header('Location: /index.php'); // Redirect to homepage
        exit();
  
      } else {
        $error = "Password incorrect";
      }
    } else {
      $error = "E-mail inconnu";
    }
  } else {
    $error = "Champs mal ou pas remplits";
  }
}

// HEADER HTML
$title = "Log in";
require 'header.php';
?>

<?php if ($error) { echo "<p>$error</p>"; } ?>
 
<form action="" method="post">
  <input type="email" name="email" placeholder="email@victor.bg">
  <input type="password" name="password" placeholder="password">

  <input type="submit" value="Se connecter">
</form>

</body>
</html>