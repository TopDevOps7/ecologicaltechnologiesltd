<?php
  if(isset($_POST['loginbtn'])) {
    $query_confirm = "SELECT * FROM user WHERE email=:email AND password=:passsword";
    $stmt = $DB_con->prepare($query_confirm);   
    $stmt->bindparam(":email",$_POST['email']);
    $stmt->bindparam(":passsword",$_POST['password']);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      if($row['status'] != "1") {
        $authMessage = $ln['user_blocked'];
      } else {
        $hash = $crud->addHash($_POST['email']);
        setcookie ("login_pass", $hash, time() + 7*86400, "/");
        setcookie ("user", json_encode(['id' => $row['id'], 'role' => $row['role']]), time() + 7*86400, "/");
        $role = $row['role'];
        $crud->addLog($_POST['email']);
        if($role == 4) {
          header("location: user.php");
        }
        else if($role == 1) {
          header("location: backoffice/index_x.php");
        } else {
          header("location: backoffice/index_x.php");
        }
        exit();
      }
    }
    else {
        $authMessage = $ln['invalid_msg'];
    }
  }
?>