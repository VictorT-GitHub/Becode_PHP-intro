<?php
// Check si un obj 'connect' existe dans $_SESSION
function is_connect (): bool {
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  return !empty($_SESSION['connect']);
}

// Redirect to login.php if user not connected
function user_connect (): void {
  if (!is_connect()) {
    header('Location: /login.php'); // Redirige vers login.php
    exit(); // Stop l'execution du reste du script
  }
}

// Empeche users d'avoir accès aux profils non-permis via [id] dans l'url
function petit_curieu(string $type) {
  $userid = $_SESSION['connect']['userid'];
  $account_type = $_SESSION['connect']['account_type'];

  if ($account_type === $type && $userid != $_GET['id']) {
    header('Location: /index.php');
    exit();
  }
}