<?php 
  include_once("lang/config.php");
  include_once('utils/dbconfig.php');

  if(!isset($_GET['passhash'])) {
  // if(!isset($_GET['passhash']) || empty($_GET['passhash'])) {
    header("location: ./");
    exit;
  } 
  
  $user = $crud->getUserByHash($_GET['passhash']);
  $newHash = "";
  if($user == false) {
  } else {
    $newHash = $crud->addHash($user['email']);
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all" />
  <title>Green Wave Materials</title>
  <link rel="icon" type="image/x-icon" href="assets/images/circleLogo.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

  <!-- font awesome CSS -->
  <link rel="stylesheet" type="text/css" href="assets/fontawesome-6.0.0/css/all.min.css">

  <!-- Datatable CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css">

  <!-- ----------Google Fonts------------- -->
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body style="background: #eee5;">
  <div class="container pt-5 pb-5" style="max-width: 650px; background: #fff; min-height: 100vh; position: relative;">
    <div class="text-center">
      <a href="./">
        <img src="assets/images/logo.png" width="45%" alt=" " />
      </a>
    </div>
    <?php if($user != false) { ?>
    <h1 class="mt-5 text-center">Willkommen</h1>
    <h5 class="mt-2 text-center">Hier können Sie Ihr Passwort ändern.</h5>
    <div class="userForm mt-5 m-auto" style="max-width: 400px;">
      <div class="alert alert-danger fade in d-none show">
        <strong class="mr-3"><i class="fa fa-exclamation-triangle" style="color: #e94e4e;"></i></strong> Passwort
        bestätigen stimmt nicht überein.
      </div>
      <form id="changePassForm">
        <div class="mb-3 userInputIconCtrl">
          <input type="password" class="form-control" id="password" name="password" placeholder="Neues Passwort"
            required>
          <img src="assets/images/lock.png" alt=" " class="img-fluid">
        </div>
        <div class="mb-3 userInputIconCtrl">
          <input type="password" class="form-control" id="password2" name="password2"
            placeholder="Neues Passwort bestätigen" required>
          <img src="assets/images/lock.png" alt=" " class="img-fluid">
        </div>
        <div class="text-right">
          <button type="submit" class="btn button" name="changePasswordOne">Senden</button>
        </div>
      </form>
    </div>
    <?php } else { ?>
    <div style="max-width: 400px; margin: 15px auto;">
      <div class="alert alert-danger fade in show">
        <strong class="mr-3"><i class="fa fa-exclamation-triangle" style="color: #e94e4e;"></i></strong>
        Abgelaufener Link
      </div>
    </div>
    <?php } ?>
    <div style="position: absolute; bottom: 10px; width: 100%">
      <p class="text-center">Ihr Green Wave Materials Team</p>
    </div>
  </div>
  <script>
  $('#changePassForm').submit((e) => {
    e.preventDefault();
    let pass = $("#password").val();
    let pass2 = $("#password2").val();
    if (pass != pass2) {
      return $('.alert-danger').removeClass('d-none');
    }
    $.ajax({
      url: "utils/middle.php",
      type: "POST",
      dataType: "JSON",
      data: {
        changePasswordOne: "changePasswordOne",
        pass,
        hash: "<?= $newHash ?>",
      },
      success: () => {
        location.href = "./";
      }
    })
  });
  </script>
</body>

</html>