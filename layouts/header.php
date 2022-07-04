<?php 
    include_once("lang/config.php");
    include_once('utils/dbconfig.php');
    include_once("utils/login.php");
    include_once("utils/config.php");

    $hashValue = "";
    if($page == "user.php") {
      if(isset($_GET['passhash'])) {
        $hashValue = $_GET['passhash'];
        $existUser = $crud->getUserByHash($hashValue, 'created_at', false);
        if($existUser == false) {
          $hashValue = "";
        }
      }
    }

    if(!$isLogin) {
      if($hashValue == "") {
        if($pagePath == "backoffice") { 
          header("location: ../");
        }
        if($page == "user.php") {
          header("location: ./");
        }
      }
    }
    
    if($isLogin && $pagePath == "backoffice") {
        if($role == 4) {
            header("location: ../user.php");
        } else if($role == 1) {
          if($hashValue == "") {
            header("location: ./");
          } else {
            
          }
        } else {
          header("location: ./");
        }
    }

    if($page == "user.php") {
        if($role != 4) {
          if($role >= 1 && $role < 6) {
            if($hashValue == "") {
              header("location: backoffice");
            } else {

            }
          } else {
            header("location: backoffice");
          }
        }
    }

    if($hashValue != "") {
      $role = $crud->getRoleFromEmail($hashValue);
      $user = $crud->getWholeDetailsFromHash($hashValue);
				$title = $ln["profile"];
				$profile_url = "user.php?passhash=$hashValue";
    }
?>


<script>
let rPath = "<?php echo $basePath; ?>";
</script>

<!doctype html>
<html lang="<?= $lang ?>">

<head>
    <!-- Required meta tags -->
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
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">


    <style>
    .marquee {
        position: relative;
        overflow: hidden;
        text-align: center;
        margin: 0 auto;
        width: 100%;
        height: 30px;
        display: flex;
        align-items: center;
        white-space: nowrap;
    }

    .currency_up {
        background: #0ca133;
        padding: 3px 10px;
        border-radius: 10px;
        margin-left: 10px;
        color: #fff;
    }

    .currency_down {
        background: #db4418;
        padding: 3px 10px;
        border-radius: 10px;
        margin-left: 10px;
        color: #fff;
    }

    .diff_up {
        color: #0ca133;
        font-size: 12px;
    }

    .diff_down {
        color: #db4418;
        font-size: 12px;
    }

    .container-fluid {
        position: fixed;
        bottom: 0;
        z-index: 99999;
        background: #fff;
        border: 1px solid #198754;
    }

    .submission_form {
        margin-top: 3rem;
    }

    .imprint_form {
        margin-bottom: 15rem;
    }

    .navbar.top-toolbar {
        background: transparent;
        z-index: 1000;
    }

    .dropdown-item>img {
        width: 20px;
    }

    .navbar-nav {
        align-items: center;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

</head>

<body>
    <!-- Header Begin -->
    <header>
        <!-- <nav class="navbar top-toolbar <?= $hashValue != "" ? "administration" : "" ?>">
           
        </nav> -->
        <nav class="navbar navbar-expand-lg main-header">
            <div class="container">
                <!-- <div id="google_translate_element"></div> -->
                <a class="navbar-brand" href="./">
                    <img src="assets/images/Ecological-tech-Logo.png" alt="Green Wave Materials" class="img-fluid">
                </a>

                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ms-auto me-0">
                        <li class="nav-item">
                            <a class="nav-link" href="./#home"><?= $ln["home"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./#about_us"><?= $ln["about_us"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./#portfolio"><?= $ln["portfolio"] ?></a>
                        </li>
                        <li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./#strategy"><?= $ln['documents'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link contact" href="./#contact_us"><?= $ln["whyus"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link contact" href="./#contact_us"><?= $ln["technology"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link contact" href="./#contact_us"><?= $ln["videos"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link contact" href="./#contact_us"><?= $ln["investors"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link contact" href="./#contact_us"><?= $ln["contact"] ?></a>
                        </li>
                        <li class="nav-item">
                            <div class="container">
                                <div class="dropdown">
                                    <button type="button"
                                        class="btn btn-light border-0 dropdown-toggle p-0 bg-transparent"
                                        data-bs-toggle="dropdown">
                                        <img src="assets/images/flags/<?= $lang ?>.svg" alt="de">
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item <?= $lang == "de" ? "active": "" ?>" data-lang='de'
                                            href="javascript:void(0);"><img src="assets/images/flags/de.svg" alt="de">
                                            German</a>
                                        <a class="dropdown-item <?= $lang == "en" ? "active": "" ?>" data-lang='en'
                                            href="javascript:void(0);"><img src="assets/images/flags/en.svg" alt="en">
                                            English</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- <?php if(!$isLogin) { ?>
                        <li class="nav-item auth-btn login">
                            <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Login</a>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="<?= $profile_url ?>"><?= ($role == 4 || $hashValue != "") ? $title : "Backoffice" ?></a>
                        </li>
                        <li class="nav-item auth-btn logout">
                            <?php if($hashValue == "") { ?>
                            <a href="utils/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                            <?php } else {?>
                            <a href="backoffice"><i class="fas fa-sign-out-alt"></i></a>
                            <?php } ?>
                        </li>
                        <?php } ?> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->