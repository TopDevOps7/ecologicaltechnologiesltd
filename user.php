<?php 
    include_once('layouts/header.php');

    $user = $crud->getWholeDetailsFromHash(($hashValue != "") ? $hashValue : $loginUser['id']);
    // $project_id = $_GET['id'];
    // print_r($user['invest'][$project_id]); exit;
	
	//WHETHER OR NOT TO SHOW ERRORS
	// ini_set('display_errors', false);
	// ini_set('error_reporting', E_ALL);
	
?>

<style>
.spinner-container {
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #0006;
}

.loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    width: 100px;
    height: 100px;
    -webkit-animation: spin 2s linear infinite;
    /* Safari */
    animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
<div class="d-none spinner-container">
    <div class="loader"></div>
</div>
<section class="userDiv p-0 align-items-center justify-content-center sign-page-widget d-flex d-none"
    style="margin-top: 0rem; height: 10rem;">
    <h1 class="text-white m-0" style="text-align: center; line-height:0.75em;padding-top:0.4em;">
        <?= $ln['sign_title1'] ?>
    </h1>
</section>

<section class="register-section sign-page-widget d-none pt-5" style="margin-bottom: 100px;">
    <button class="btn btn-success site-btn mb-5 me-5" style="float: right" id="back-btn"><?= $ln['back'] ?></button>
    <div class="container" id="iframe-content">

    </div>
</section>
<!-- ---------------User----------- -->
<section id="user" class="userDiv p-0 user-page-widget">
    <div class="d-lg-flex justify-content-md-around">
        <div class="userInfo d-flex align-items-center">
            <div class="userLeft pe-5">
                <!-- <img src="assets/images/userCircle.png" alt="userLeftImg" class="img-fluid usercircle"> -->
            </div>
            <div class="userLeftInfo">
                <!-- <h1 class="userName"><?php echo $user['fname']." ".$user['lname']; ?></h1>
        <p class="userloc" style="margin-bottom: 10px;">
          <img src="assets/images/map.png" alt="map" class="img-fluid mr-4">
          <?= "{$user['zip']}, {$user['country']}" ?>
        </p> -->
                <div class="grayLine"></div>
                <p class="activeStatus" style="margin: 10px;"><b>Portfolio</b> : <span id="portfolio">0 EUR</span>
                </p>
                <div class="grayLine"></div>
                <p class="activeStatus" style="margin: 10px;"><b>Investment</b> : <span id="investment_size">0
                        EUR</span>
                </p>
                <div class="grayLine"></div>
                <p class="activeStatus" style="margin: 10px;"><b>Performance</b> : <span id="performance">+0 EUR
                        (+0%)</span>
                </p>
                <div class="grayLine"></div>
            </div>
        </div>

        <div class="chart-view">
            <div style="background-color: #fff9; position: absolute; width: 100%; height: 100%; top: 0; left: 0;"></div>
            <div id="priceChart"
                style="width: 100%; min-width: 350px; height:260px; margin-top: -30px; margin-left: -10px; margin-right: 10px;">
            </div>
        </div>

        <div class="userInfo d-flex align-items-center">
            <div class="userLeft pe-5">
                <!-- <img src="assets/images/singleUser.png" alt="userRight" class="img-fluid usercircle"> -->
            </div>
            <div class="userLeftInfo">
                <div class="d-flex justify-content-between">
                    <div class="me-md-3">
                        <p class="userloc mt-0 mb-1">
                            <img src="assets/images/clock.png" alt="clock" class="img-fluid mr-4 clock">
                            MO-FR | 08:00 - 20:00
                        </p>
                        <p class="userloc mt-2">
                            <img src="assets/images/email.png" alt="email" class="img-fluid mr-4 clock">
                            support@greenwavematerials.com
                        </p>
                    </div>
                    <div>
                        <button class="btncallsupport btnkaufen" data-bs-toggle='modal'
                            data-bs-target="#buyTokenModal"><?= $ln['buy'] ?></button>
                    </div>
                </div>
                <div>
                    <button class="btncallsupport btn-sm mt-2" data-bs-toggle='modal'
                        data-bs-target="#supportTicket">Support</button>
                    <button class="btncallsupport btn-sm mt-2" data-bs-toggle='modal'
                        data-bs-target="#changePasswordModal"><?= $ln['change_password'] ?></button>
                    <!-- <button class="btncallsupport btn-sm mt-2" data-bs-toggle='modal' data-bs-target="#kycUploadModal">KYC/NDA
            Upload</button> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ----------------PopUpCards ------------------ -->
<section id="popUpCard" class="mainpopsec user-page-widget" style="min-height: calc(100vh - 590px);">
    <div class="container ">
        <?php foreach ($user['invest'] as $key => $value) { ?>
        <div class="row d-md-flex justify-content-md-around">
            <div class="col-md-5 col-12 popUpImg">
                <h1 class="amoount">€ <?php echo explode (",", number_format($value['investment'] , 1, ',', "."))[0]; ?>
                </h1>
                <p class="amountDetail">
                    <?php echo number_format(round($value['size']) , 0, ',', ".")." ".$value['project_name']; ?>
                    Token/Shares</p>
                <p class="colorAmount">€ <?php echo number_format($value['price'], 2, ',', "."); ?></p>
            </div>
            <div class="col-md-5 col-12 popUpImgTwo">
                <div class="popText d-flex justify-content-between">
                    <p>Status: </p>
                    <div>
                        <p><?= $value['payed'] == 1 ? $ln['active_investor'] : $ln['payment_pending'] ?>
                            <?php if($value['payed'] == 1) {?>
                            <i class="fas fa-check"></i>
                            <?php } else {?>
                            <i class="fas fa-times-circle"></i>
                            <?php }?>
                        </p>
                        <p style="text-align:right;"> <small class="greenTxt"><?php $abc = $value['created_at']; 
                $date = date_create($abc);
                echo date_format($date, 'Y-m-d H:i'); ?></small></p>
                    </div>
                </div>
                <div class="dividerOne"></div>
                <div class="popText d-flex justify-content-between align-items-center pt-5">
                    <p><?= $ln['wallet_address'] ?>:</p>
                    <div>
                        <p style="font-size: 12px;"><?php echo $value['wallet']; ?></p>
                        <!-- <p>mo9RizkvTu5Z2n <br>
                                    mGqx15rBnxN5SWrBTTY2</p> -->
                        <?php if($value['payed'] == "1" && $value['wallet'] == "") { ?>
                        <p href="#" class="text-end add-wallet-address" data-bs-toggle="modal" style="cursor: pointer;"
                            data-id="<?= $key ?>" data-bs-target="#addWalletModal"> <small class="greenTxt"> <img
                                    src="assets/images/card.png" alt="card"
                                    class="img-fluid cardImg">&nbsp;<?= $ln['add_address'] ?></small></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="dividerTwo"></div>

                <div class="popText d-flex justify-content-between pt-5">
                    <p><?= $ln['payment_mode'] ?>:</p>
                    <div>
                        <p><?= $value['payment_method'] == 1 ? "Bank" : $ln['crypto'] ?></p>
                    </div>
                </div>

                <div class="dividerOne"></div>

                <div class="popText d-flex justify-content-between pt-5">
                    <p><?= $ln['certificate'] ?>:</p>
                    <div>
                        <?php if($value['payed'] == 1 && $value['re_payed'] != 1) {?>
                        <p>
                            <?php 
              $start_date = $value['tracking_date'];  
              $start_date = strtotime($start_date);
              $end_date = strtotime("+21 day", $start_date);
              // $end_date = date('Y/m/d', $date);
              $today = time();
              if($value['tracking_service'] && $value['tracking_id'] && $end_date >= $today) { 
                $url = "#";
                if ($value['tracking_service'] != "") {
                  $url = $tracking_service_urls[$value['tracking_service']];
                }
                ?>
                            <a class="track_link" href="<?= $url ?><?= $value['tracking_id'] ?>" target="_blank"><i
                                    class="fa-solid fa-truck-fast" style="font-size: 16px;"></i></a>
                            <?php } ?>
                            <a download class="cert_link"
                                href="utils/pdfGenerate.php?id=<?= $key ?>&passhash=<?= $hashValue ?>"
                                class="cert-download text-decoration-none">#<?= $value['cert_num'] ?></a>
                        </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(count($user['invest']) == 0) { ?>
        <div class="row d-md-flex justify-content-md-around">
            <div class="col-md-5 col-12 popUpImg">
                <h1 class="amoount">€ 0</h1>
                <p class="amountDetail"> 0 Token/Shares</p>
                <p class="colorAmount">€ 0,00</p>
            </div>
            <div class="col-md-5 col-12 popUpImgTwo">
                <div class="popText d-flex justify-content-between">
                    <p>Status: </p>
                    <div>
                        <p>
                        </p>
                        <p style="text-align:right;"></p>
                    </div>
                </div>
                <div class="dividerOne"></div>
                <div class="popText d-flex justify-content-between align-items-center pt-5">
                    <p><?= $ln['wallet_address'] ?>:</p>
                    <div>
                        <p style="font-size: 12px;"></p>
                    </div>
                </div>

                <div class="dividerTwo"></div>

                <div class="popText d-flex justify-content-between pt-5">
                    <p><?= $ln['payment_mode'] ?>:</p>
                    <div>
                        <p></p>
                    </div>
                </div>

                <div class="dividerOne"></div>

                <div class="popText d-flex justify-content-between pt-5">
                    <p><?= $ln['certificate'] ?>:</p>
                    <div></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<!--Support ticket Modal Pass-->
<div class="modal fade" id="supportTicket" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modalContents">
                    <div class="text-center">
                        <img src="assets/images/circleLogo.png" alt="circleLogo" class="circleLogo img-fluid">
                    </div>
                    <h1 class="sectionTitle text-light resetTxt"><span>Support Ticket</span></h1>

                    <div class="userForm">
                        <form id="supportTicketForm">
                            <div class="mb-3 userInputIconCtrl">
                                <input type="text" class="form-control" id="ticketName" placeholder="Name"
                                    aria-describedby="emailHelp" required>
                                <img src="assets/images/user.png" alt="user" class="img-fluid">
                            </div>
                            <div class="mb-3 userInputIconCtrl">
                                <input type="email" class="form-control" id="ticketEmail" placeholder="E-Mail" required>
                                <img src="assets/images/email.png" alt="email" class="img-fluid">
                            </div>
                            <div class="mb-3 userInputIconCtrl">
                                <input type="text" pattern="\+?[0-9]+"
                                    oninvalid="this.setCustomValidity('Die Telefonnummer ist nicht korrekt. Erlaubte Zeichen: +0123456789')"
                                    oninput="this.setCustomValidity('')" class="form-control" id="ticketPhoneNumber"
                                    placeholder="<?= $ln["telephone"] ?>">
                                <!-- <img src="assets/images/email.png" alt="email" class="img-fluid"> -->
                                <i class="fas fa-phone-alt phone-icon"></i>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="ticketMessage" rows="3" placeholder=""
                                    required></textarea>
                            </div>
                            <!-- <p class="forgotPassWordCtrl text-end">
                  <a href="#" class="forgotPass" data-bs-toggle="modal"
                  data-bs-target="#forgotPasswordModal">Forgot Password?</a>
                </p> -->
                            <div class="text-center">
                                <button type="submit" class="btn button"><?= $ln["send"] ?></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--Change Password Modal Pass-->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modalContents">
                    <div class="text-center">
                        <img src="assets/images/circleLogo.png" alt="circleLogo" class="circleLogo img-fluid">
                    </div>
                    <h1 class="sectionTitle text-light resetTxt"><span><?= $ln['change_password'] ?></span></h1>

                    <div class="userForm">
                        <form id="changePasswordForm">
                            <input type="hidden" name="hash" id="hashValue" value="<?= $hashValue ?>">
                            <div class="mb-3 userInputIconCtrl">
                                <input type="password" class="form-control" id="currentPassword"
                                    placeholder="<?= $ln['current_password'] ?>" aria-describedby="emailHelp" required>
                                <img src="assets/images/lock.png" alt="lock" class="img-fluid">
                            </div>
                            <div class="mb-3 userInputIconCtrl">
                                <input type="password" class="form-control" id="newPassword"
                                    placeholder="<?= $ln['new_password'] ?>" required>
                                <img src="assets/images/lock.png" alt="lock" class="img-fluid">
                            </div>
                            <div class="mb-3 userInputIconCtrl">
                                <input type="password" class="form-control" id="newPassword2"
                                    placeholder="<?= $ln['confirm_password'] ?>" required>
                                <img src="assets/images/lock.png" alt="lock" class="img-fluid">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn button"><?= $ln["send"] ?></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!--KYC Upload Modal Pass-->
<div class="modal fade" id="kycUploadModal" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modalContents">
                    <div class="text-center">
                        <img src="assets/images/circleLogo.png" alt="circleLogo" class="circleLogo img-fluid">
                    </div>
                    <h1 class="sectionTitle text-light resetTxt"><span>KYC/NDA Upload</span></h1>
                    <form id="kycUploadForm" action="utils/middle.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                        <input type="hidden" name="senderName" value="<?= $user['fname'] ?> <?= $user['lname'] ?>">
                        <input type="hidden" name="senderEmail" value="<?= $user['email'] ?>">
                        <div class="d-flex justify-content-around mb-3 align-items-center">
                            <div class="form-group w-85" style="position: relative;">
                                <label for="id_file">ID <?= $ln['file'] ?></label>
                                <?php 
                    $idFile = $user["kyc"]["id_file"];
                    $utilityFile = $user["kyc"]["utility_file"];
                    $ndaFile = $user["kyc"]["nda_file"];
                    if($idFile && $idFile['valid'] != 2) {
                  ?>
                                <span
                                    class="form-control <?= $idFile['valid'] == 1 ? "bg-success text-white" : ($idFile['valid'] == 2 ? "bg-danger" : "bg-warning") ?>"><?= $ln['already_uploaded'] ?>
                                    (<?= $idFile['valid'] == 1 ? $ln['approved'] : ($idFile['valid'] == 2 ? $ln['declined'] : $ln['pending']) ?>).</span>
                                <?php } else { ?>
                                <input type="file" class="form-control" name="ID_file" style="line-height: 2.4rem;"
                                    accept="application/pdf, .jpg, .jpeg, .png">
                                <?php } ?>
                            </div>
                            <div class="mt-4">
                                <a href="clients/uploads/<?= $idFile ? $idFile['file_name'] : "" ?>"
                                    style="visibility: <?= ($idFile && $idFile['valid'] != 2) ? "" : "hidden" ?>"
                                    target="_blank" title="ID file download" id="id_file_download" download><i
                                        class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-3 align-items-center">
                            <div class="form-group w-85" style="position: relative;">
                                <label for="utility_file">Utility <?= $ln['file'] ?></label>
                                <?php if($utilityFile && $utilityFile['valid'] != 2) { ?>
                                <span
                                    class="form-control <?= $utilityFile['valid'] == 1 ? "bg-success text-white" : ($utilityFile['valid'] == 2 ? "bg-danger" : "bg-warning") ?>"><?= $ln['already_uploaded'] ?>
                                    (<?= $utilityFile['valid'] == 1 ? $ln['approved'] : ($utilityFile['valid'] == 2 ? $ln['declined'] : $ln['pending']) ?>).</span>
                                <?php } else { ?>
                                <input accept="application/pdf, .jpg, .jpeg, .png" type="file" class="form-control"
                                    id="utility_file" name="Utility_file" style="line-height: 2.4rem;">
                                <?php } ?>
                            </div>
                            <div class="mt-4">
                                <a href="clients/uploads/<?= $utilityFile ? $utilityFile['file_name'] : "" ?>"
                                    style="visibility: <?= ($utilityFile && $utilityFile['valid'] != 2) ? "" : "hidden" ?>"
                                    target="_blank" title="Utility file download" id="utility_file_download" download><i
                                        class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around mb-3 align-items-center">
                            <div class="form-group w-85" style="position: relative;">
                                <label for="nda_file">NDA <?= $ln['file'] ?></label>
                                <?php if($ndaFile && $ndaFile['valid'] != 2) { ?>
                                <span
                                    class="form-control <?= $ndaFile['valid'] == 1 ? "bg-success text-white" : ($ndaFile['valid'] == 2 ? "bg-danger" : "bg-warning") ?>"><?= $ln['already_uploaded'] ?>
                                    (<?= $ndaFile['valid'] == 1 ? $ln['approved'] : ($ndaFile['valid'] == 2 ? $ln['declined'] : $ln['pending']) ?>).</span>
                                <?php } else { ?>
                                <input accept="application/pdf, .jpg, .jpeg, .png" type="file" class="form-control"
                                    id="nda_file" name="nda_file" style="line-height: 2.4rem;">
                                <?php } ?>
                            </div>
                            <div class="mt-4">
                                <a href="clients/uploads/<?= $ndaFile ? $ndaFile['file_name'] : "" ?>"
                                    style="visibility: <?= ($ndaFile && $ndaFile['valid'] != 2) ? "" : "hidden" ?>"
                                    target="_blank" title="NDA file download" id="nda_file_download" download><i
                                        class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <?php if($user['kyc']['nda_template'] && (!$ndaFile || $ndaFile['valid'] == 2)) { ?>
                        <br>
                        <hr>
                        <div class="form-group mt-4 px-4">
                            <a class="text-decoration-none" title="ID file download" id="id_file_download"><i
                                    class="fas fa-download"></i></a>
                            href="backoffice/files/<?= $user['kyc']['nda_template']['file_name'] ?>" >NDA
                            <?= $ln['file'] ?> <i class="ms-3 fas fa-download"></i></a>
                        </div>
                        <?php } ?>
                        <div class="modal-footer mt-4 pb-0">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"><?= $ln['cancel'] ?></button>
                            <!-- <button type="button" class="btn btn-secondary" id="kyc_kip">Skip</button> -->
                            <button type="submit" class="btn btn-primary kycUserUpload"
                                name="kycUserUpload"><?= $ln['file_upload'] ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Wallet Address Modal -->
<div class="modal fade" id="addWalletModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAsinLabel"><?= $ln['add_address'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <hr>
                <br>
                <form method="post" id="addWalletForm" action="utils/middle.php">
                    <input type="hidden" class="form-control" id="invest_id" name="investId">
                    <div class="form-group">
                        <input type="text" class="form-control" id="wallet" name="wallet"
                            placeholder="<?= $ln['enter_your_wallet_address'] ?>">
                    </div>

                    <div class="modal-footer mt-5 pb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary add-wallet" name="addWallet">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Buy Token Modal -->
<div class="modal fade" id="buyTokenModal" tabindex="-1" role="dialog" aria-labelledby="createAsinLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="createAsinLabel">Buy Token</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modalContents">
                    <div class="text-center">
                        <img src="assets/images/circleLogo.png" alt="circleLogo" class="circleLogo img-fluid">
                    </div>
                    <h1 class="sectionTitle text-light resetTxt"><span><?= $ln['buy_token'] ?></span></h1>
                    <form method="post" id="buyTokenForm" action="utils/middle.php">
                        <input type="hidden" class="form-control" id="user_id" name="userId">
                        <div class="form-group">
                            <label for="amount"><?= $ln['token_amount'] ?></label>
                            <input type="hidden" id="price" name="price">
                            <input type="number" class="form-control" id="amount" name="amount" min="0" required>
                        </div>

                        <div class="modal-footer mt-5 pb-0">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"><?= $ln['cancel'] ?></button>
                            <button type="submit" class="btn btn-primary buy-token"
                                name="buyToken"><?= $ln['confirm_'] ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

  include_once("layouts/footer.php");

?>
<script src="assets/js/adobe.sign.api.js"></script>
<script>
// Chart setting.
// Initialize the echarts instance based on the prepared dom

let priceChart = echarts.init(document.getElementById("priceChart"));
let option = {
    tooltip: {
        trigger: "axis",
        position: function(pt) {
            return [pt[0], "10%"];
        },
    },
    title: {
        left: "center",
        text: "",
    },
    toolbox: {
        show: false,
        feature: {
            dataZoom: {
                yAxisIndex: "none",
            },
            restore: {},
            saveAsImage: {},
        },
    },
    xAxis: {
        type: "category",
        boundaryGap: false,
        axisLabel: {
            //   rotate: -30,
            color: "green",
            formatter: function(value, index) {
                let te = value.split('.');
                return te[0] + "." + te[1] + ".";
            }
        }
    },
    yAxis: {
        type: "value",
        boundaryGap: [0, "20%"],
        position: "right",
        axisLabel: {
            color: "green",
            formatter: function(value, index) {
                return Number(value).toFixed(1);
            }
        }
    },
    //   dataZoom: [{
    //       type: "inside",
    //       start: 0,
    //       end: 20,
    //     },
    //     {
    //       type: "inside",
    //       start: 0,
    //       end: 20,
    //     },
    //   ],
    series: [{
        name: "Price",
        type: "line",
        smooth: false,
        symbol: "none",
        animation: true,
        lineStyle: {
            color: "green",
            width: 1,
        },
        areaStyle: {
            opacity: 0.2,
            color: "green"
        },
        data: [],
    }, ],
};

function refreshChart() {
    $.ajax({
        url: "utils/middle.php",
        type: "POST",
        dataType: "JSON",
        data: {
            getPriceList: "getPriceList",
            userId: <?= isset($user) ? $user['id'] : "" ?>
        },
        success: (res) => {
            let data = [];
            res.data.forEach(({
                date,
                price
            }, index, arr) => {
                let sdate = new Date(date + " 00:00:00");
                if (index + 1 == arr.length) {
                    if (sdate > new Date()) {
                        data.push([moment(date).format("DD.MM.YYYY"), price]);
                    } else {
                        for (
                            sdate; sdate < new Date(); sdate.setDate(sdate.getDate() + 1)
                        ) {
                            data.push([moment(sdate).format("DD.MM.YYYY"), price]);
                        }
                    }
                    return;
                }
                let edate = new Date(arr[index + 1].date + " 00:00:00");
                for (sdate; sdate < edate; sdate.setDate(sdate.getDate() + 1)) {
                    data.push([moment(sdate).format("DD.MM.YYYY"), price]);
                }
            });

            option.series[0].data = data;
            priceChart.setOption(option);
            // priceChart.resize();
        },
        error: () => {
            console.log("getPriceList error!");
        },
    });
}

refreshChart();

$(window).on("resize", function() {
    if (priceChart != null && priceChart != undefined) {
        priceChart.resize();
    }
});

$(function() {
    $(".nav-item").eq(4).addClass("active");

    // $('.cert-download').click(function () {
    //   let invest = $(this).data('id');
    //   $.ajax({})
    // });
});

$(window).on("scroll", function(e) {
    if ($(document).scrollTop() == 0) {
        $(".nav-item").eq(4).addClass("active");
    }
});

$("#buyTokenForm").submit(e => {
    e.preventDefault();
    $("body").addClass("overflow-hidden");
    $(".spinner-container").removeClass("d-none");
    let amount = $('#amount').val();
    let price = $('#price').val();
    <?php if($user['spec_price'] > 0) { ?>
    price = "<?= $user['spec_price'] ?>";
    <?php } ?>
    let fname = "<?= $user['fname'] ?>",
        lname = "<?= $user['lname'] ?>",
        email = "<?= $user['email'] ?>",
        birthday = "<?= $user['birthday'] != "0000-00-00" ? $user['birthday']  : "" ?>",
        address = "<?= $user['address'] ?>",
        zipCity = "<?= $user['zip'] ?> <?= $user['city'] ?>",
        telPhone = "<?= $user['tel_1'] ?>",
        fax = "",
        token = new Intl.NumberFormat('de-DE').format(amount),
        price1 = new Intl.NumberFormat('de-DE', {
            minimumFractionDigits: 2
        }).format(price),
        size = new Intl.NumberFormat('de-DE', {
            minimumFractionDigits: 2
        }).format(Number(amount) * Number(price)),
        userId = '<?= $user['id'] ?>';
    if (birthday != "") {
        birthday = moment(birthday).format("DD.MM.YYYY");
    }
    console.log($('#price').val(), price1, token, size, price, birthday);
    setTimeout(() => {
        let investId = "";
        $.ajax({
            url: "utils/middle.php",
            type: "POST",
            dataType: "JSON",
            async: false,
            data: {
                userInvestTemp: "userInvestTemp",
                userId: "<?= $user['id'] ?>",
                userPrice: price,
                userInvest: Number(price) * Number(amount),
                project: "1",
                userSize: amount
            },
            success: (res) => {
                investId = res;
            },
        });
        AdobeAPI.getAccessToken();
        AdobeAPI.createWebForm(`<?= $ln['agreement_title'] ?>-${investId}`);
        setTimeout(() => {
            // AdobeAPI.getFormFields(investId);
            // AdobeAPI.setFormFields();
            AdobeAPI.getUrl();

            if (AdobeAPI.iframeURL != "") {
                $("#iframe-content").html(`<iframe
        src="${AdobeAPI.iframeURL}#Name=${lname}&Vorname=${fname}&Geburtsdatum=${birthday}&Straße Nr=${address}&PLZ Ort=${zipCity}&TelMobil=${telPhone}&EMail=${email}&TokenShares=${token}&Text3=${price1}&Text4=${size}&EUR=${size}&undefined_5=GWM-${userId}"
        width="100%" height="100%" frameborder="0"
        style="border: 0; overflow: hidden; max-height: calc(100vh - 140px); min-width: 600px;"></iframe>`);
                $('.user-page-widget').addClass("d-none");
                $('.sign-page-widget').removeClass("d-none");
                $("body").removeClass("overflow-hidden");
                $('#buyTokenModal').modal("hide");
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#iframe-content").offset().top - 40
                }, 1000);
            }
            $(".spinner-container").addClass("d-none");
        }, 500);
    }, 50);
});
$("#amount").keydown(e => {
    if (e.keyCode == 190 || e.keyCode == 110 || e.keyCode == 190 || e.keyCode == 189 || e.keyCode == 69 || e
        .keyCode == 107) e.preventDefault();

    // If the input is empty and the key pressed is "0" nothing is printed
    if (!e.target.value && e.key == 0) {

        e.preventDefault();

    } else {
        const regex = new RegExp(/(^\d*$)|(Backspace|Tab|Delete|ArrowLeft|ArrowRight)/);
        if (!event.key.match(regex)) event.preventDefault();
        // If the key pressed is not a number or a period, nothing is printed
        // if (!/[0-9.]/.test(e.key)) {
        //   e.preventDefault();
        // }

    }
});
$('#back-btn').click(e => {
    $('.user-page-widget').removeClass("d-none");
    $('.sign-page-widget').addClass("d-none");
    $("#iframe-content").html(``);
    location.reload();
});
</script>