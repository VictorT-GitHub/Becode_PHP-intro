<?php
  function dbConnect(){
    return new PDO("mysql:host=mysql;dbname=victorphp;", "root", "root",
      [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]
    );
  }
 
  function queryUsers($type, $userid){
    $db = dbConnect();

    if($type == 'ADMIN'){
      $query = $db->query("SELECT id, first_name, last_name, account_type, country 
      FROM `users`");
    }
    elseif ($type == 'MODERATOR') {
      $query = $db->prepare("SELECT id, first_name, last_name, account_type, country 
      FROM `users` WHERE account_type = ? OR account_type = ?");
      $query->execute(['NORMAL', 'MODERATOR']);
    }
    else{
      $query = $db->prepare("SELECT id, first_name, last_name, account_type, country 
      FROM `users` WHERE id=?");
      $query->execute([$userid]);
    }

    return $query->fetchAll();
  }

  function queryUserById($id){
    $db = dbConnect();

    $query = $db->prepare("SELECT id, first_name, last_name, email, account_type, country 
    FROM `users` WHERE id=?");
    $query->execute([$id]);

    return $query->fetch();
  }

  function editUSer($id, $first_name, $last_name, $email, $account_type, $country){
    $db = dbConnect();

    $query = $db->prepare("UPDATE `users` SET first_name=?, last_name=?, email=?, account_type=?, country=? WHERE id=?");
    $query->execute([$first_name, $last_name, $email, $account_type, $country, $id]);

    return $query->fetch();
  }
  
  function deleteUSer($id){
    $db = dbConnect();

    $query = $db->prepare("DELETE FROM `users` WHERE id=?");
    $query->execute([$id]);

    return $query->fetch();
  }

  // LOGIN AUTHENTIFICATION 
  function query_user_auth($useremail){
    $db = dbConnect();
  
    $query = $db->prepare("SELECT id, email, account_type, password 
    FROM `users` WHERE email=?");
    $query->execute([$useremail]);
  
    return $query->fetch();
  }
?>