<?php
    include_once("../lang/config.php");
    include_once('../utils/dbconfig.php');
    include_once('../utils/config.php');

    if(!$isLogin) {
      header("location: ../");
    }
    
    if($role == 4) {
      header("location: ../user.php");
    }

    if(($role == 20 || $role == 21) && $page != "investment.php") {
      header("location: investment.php");
    }

    if($page != "index.php" && $page != "investment.php" && $page != "forms.php") {
      if($role != 1) {
        header("location: ./");
      }
    }

    $user = $crud->getWholeDetailsFromHash($loginUser['id']);

?>
<script>
let rPath = "<?php echo $basePath; ?>";
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="all" />
    <title>Green Wave Gold</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/circleLogo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- font awesome CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-6.0.0/css/all.min.css">


    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.0.0/css/fixedColumns.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">
    <style>
    .submission_form {
        margin-top: 3rem;
    }

    .imprint_form {
        margin-bottom: 5rem !important;
    }

    .submission_form hr {
        background-color: #ccc !important;
    }
    </style>
</head>

<body>
    <!-- Header Begin -->
    <header>
        <!-- <nav class="navbar top-toolbar">
            <div class="container">
                <div class="dropdown">
                    <button type="button" class="btn btn-light border-0 dropdown-toggle p-0 bg-transparent"
                        data-bs-toggle="dropdown">
                        <img src="../assets/images/flags/<?= $lang ?>.svg" alt="de">
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item <?= $lang == "de" ? "active": "" ?>" data-lang='de'
                            href="javascript:void(0);"><img src="../assets/images/flags/de.svg" alt="de"> German</a>
                        <a class="dropdown-item <?= $lang == "en" ? "active": "" ?>" data-lang='en'
                            href="javascript:void(0);"><img src="../assets/images/flags/en.svg" alt="en"> English</a>
                    </div>
                </div>
            </div>
        </nav> -->
        <nav class="navbar navbar-expand-lg main-header">
            <div class="container">
                <a class="navbar-brand" href="../">
                    <img src="../assets/images/logo.png" alt="Green Wave Gold" class="img-fluid">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav ml-auto me-0" style="align-items:center">
                        <li class="nav-item">
                            <div class="container backoffice" style="margin-right:30px">
                                <div class="dropdown">
                                    <button type="button"
                                        class="btn btn-light border-0 dropdown-toggle p-0 bg-transparent"
                                        data-bs-toggle="dropdown">
                                        <img src="../assets/images/flags/<?= $lang ?>.svg" alt="de">
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item <?= $lang == "de" ? "active": "" ?>" data-lang='de'
                                            href="javascript:void(0);"><img src="../assets/images/flags/de.svg"
                                                alt="de"> German</a>
                                        <a class="dropdown-item <?= $lang == "en" ? "active": "" ?>" data-lang='en'
                                            href="javascript:void(0);"><img src="../assets/images/flags/en.svg"
                                                alt="en"> English</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../#about_us"><?= $ln["about_us"] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../#green_wave_gold">GWG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../#strategy"><?= $ln['strategy'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link contact" href="../#contact_us"><?= $ln["contact"] ?></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link contact" href="javascript:void(0);">Backoffice</a>
                        </li>
                        <li class="nav-item auth-btn logout">
                            <a href="../utils/logout.php"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->

    <section class="userDiv p-0 d-flex align-items-center justify-content-center"
        style="margin-top: 0rem; height: 10rem;">
        <h1 class="text-white m-0" style="text-align: center; line-height:0.75em;padding-top:0.4em;"><?= $title ?>
            <?php if($role == 3) { ?>
            <br><span style="font-size:0.7em"><?= $user['tName'] ?>
                <?= isset($user['tName2']) ? "+ {$user['tName2']}" : "" ?></span>
            <?php } ?>
        </h1>
    </section>
    <div class="mt-4" style="margin-left: 30px; margin-right:12.5px;">
        <?php 
    if($role != 20 && $role != 21) {
    if($role == 1) { ?>
        <!-- <a class="btn btn-success text-right site-btn" href="backoffice.php">Backoffice</a>
    <a class="btn btn-success text-right site-btn" href="loader.php">Loader</a>
    <a class="btn btn-success text-right site-btn" href="Izmir.php">Izmir</a>
    <a class="btn btn-success text-right site-btn" href="Antalya.php">Antalya</a> -->
        <div class="dropdown d-inline-block" id="users-btn">
            <button
                class="btn btn-success site-btn dropdown-toggle<?= ($page == 'backoffice.php' || $page == 'loader.php' || $page == 'Izmir.php' || $page == 'antalya.php') ? " active" : "" ?>"
                type="button">User <span class="caret"></span></button>
            <ul class="dropdown-menu user-btn-list">
                <li class="<?= $page == "backoffice.php" ? "active" : "" ?>"><a href="backoffice.php">Backoffice</a>
                </li>
                <hr class='m-0'>
                <li class="<?= $page == "loader.php" ? "active" : "" ?>"><a href="loader.php">Loader</a></li>
                <hr class='m-0'>
                <li class="<?= $page == "Izmir.php" ? "active" : "" ?>"><a href="Izmir.php">Izmir</a></li>
                <hr class='m-0'>
                <li class="<?= $page == "antalya.php" ? "active" : "" ?>"><a href="antalya.php">Antalya</a></li>
            </ul>
        </div>
        <a class="btn btn-success text-right site-btn<?= $page == 'index.php' ? " active" : "" ?>"
            href="index.php">Clients</a>
        <a class="btn btn-success text-right site-btn<?= $page == 'investment.php' ? " active" : "" ?>"
            href="investment.php">Investments</a>
        <a class="btn btn-success text-right site-btn<?= $page == 'price.php' ? " active" : "" ?>"
            href="price.php">Price/Chart</a>
        <?php } else { ?>
        <a class="btn btn-success text-right site-btn<?= $page == 'index.php' ? " active" : "" ?>"
            href="index.php">Clients</a>
        <a class="btn btn-success text-right site-btn<?= $page == 'investment.php' ? " active" : "" ?>"
            href="investment.php">Investments</a>
        <?php } ?>
        <a class="btn btn-success text-right site-btn<?= $page == 'forms.php' ? " active" : "" ?>"
            href="forms.php">Forms/Docs</a>

        <?php if(($role == 1) && $page == "investment.php") { ?>
        <a href="../utils/excelExport.php?user_id=<?= $user_id ?>" class="btn site-btn p-1 mr-4"
            style="float: right;"><i class="fa-solid fa-file-excel" style="margin-right: 8px;">
            </i> Export</a>
        <?php } ?>

        <?php if(($role == 1 || $role == 2 || $role == 5) && isset($href)) { ?>
        <a href="#" data-bs-toggle='modal' class="<?= $class ?> mr-4" data-bs-target="<?= $href ?>"
            style="float: right; <?= $role == 5 ? "display: none;" : "" ?>"><i class="fas <?= $icon ?>"
                style="margin-right: 8px;">
            </i><?= $text ?></a>
        <?php } ?>

        <?php if(($role == 1) && $page == "index.php") { ?>
        <a href="../utils/zipUserExport.php" class="btn site-btn p-1 mr-4" style="float: right;"><i
                class="fa-solid fa-folder-tree" style="margin-right: 8px;">
            </i> KYC</a>
        <a href="../utils/zipUserExport.php?type=R" class="btn site-btn p-1 mr-4" style="float: right;"><i
                class="fa-solid fa-folder-tree" style="margin-right: 8px;">
            </i> KYC R</a>
        <?php } ?>

        <?php if($text == "Upload" && $role != 5 && $role != 6 && $role != 3) { ?>
        <a href="#" data-bs-toggle='modal' class="btn site-btn p-1" data-bs-target="#setPasswordModal"
            style="float: right; margin-right: 4px;"><i class="fas fa-key" style="margin-right: 8px;">
            </i>Password</a>
        <?php }
    }
    ?>
        <?php if($page == "investment.php" && $role == 21) { ?>
        <a download href="../utils/zipGenerate.php" id="export-new" class="btn site-btn p-1"
            style="float: right; margin-right: 4px;"><i class="fas fa-file-zipper" style="margin-right: 8px;">
            </i>Export New</a>
        <a download href="../utils/zipGenerate.php?kyc=_KYC" id="export-kyc" class="btn site-btn p-1"
            style="float: right; margin-right: 4px;"><i class="fas fa-file-zipper" style="margin-right: 8px;">
            </i>Export KYC</a>
        <a download href="../utils/zipGenerateAll.php" class="btn site-btn p-1"
            style="float: right; margin-right: 4px;"><i class="fas fa-file-zipper" style="margin-right: 8px;">
            </i>Export All</a>
        <br>
        <?php } ?>
        <?php if($page == "investment.php" && $role == 20) { ?>
        <a href="../utils/excelExport.php?user_id=<?= $user_id ?>" class="btn site-btn p-1 mr-4"
            style="float: right;"><i class="fa-solid fa-file-excel" style="margin-right: 8px;">
            </i> Export</a>
        <br>
        <?php } ?>
    </div>