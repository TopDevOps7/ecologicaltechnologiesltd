<?php

// Include db config file.
require '../lang/config.php';
require 'dbconfig.php';
require '../utils/config.php';
$supportEmail = "support@greenwavematerials.com";
// $supportEmail = "support@fxattack.com";

// Create user
if(isset($_POST["createUser"])) {
    $team = "";
    $office = "";
    $userType = $_POST['userType'];
    $email = $_POST['userEmail'];
    $userFname = $_POST['userFname'];
    $userLname = $_POST['userLname'];
    if(isset($_POST['team'])) {
        $team = $_POST['team'];
    }

    if(isset($_POST['team_2'])) {
        $team2 = $_POST['team_2'];
    }

    if(isset($_POST['office'])) {
        $office = $_POST['office'];
    }
    
    $userAddress = "";
    $userZip = "";
    $userCity= "";
    $userBirth= "";
    $userPlace= "";
    $userCountry = "";
    $userTelOne = "";
    $userTelTwo = "";
    $userNotes = "";
    $specPrice = "";
    
    if(!empty($_POST['userId'])) {
        $crud->updateUser($email, $userFname, $userLname, "", "", $team, $office, $userAddress, $userZip, $userCity, $userBirth,$userPlace, $userCountry, $userTelOne, $userTelTwo, $userNotes, $_POST['userId'], $specPrice, $team2);
    }

    else {
        $crud->createUser($userType, $email, $userFname, $userLname, "", "", $team, $office, $userAddress, $userZip,  $userCity, $userBirth,$userPlace, $userCountry, $userTelOne, $userTelTwo, $userNotes, $specPrice, $team2);
    }

    // if($userType == "2") {
    //     $page = "backoffice";
    // }
    // elseif($userType == "3") {
    //     $page = "loader";
    // }
    // elseif($userType == "5") {
    //     $page = "Izmir";
    // }
    // else {
    //     $page = "index";
    // }

    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST["createUserAjax"])) {
    $team = "";
    $userType = $_POST['userType'];
    $email = $_POST['userEmail'];
    $userFname = $_POST['userFname'];
    $userLname = $_POST['userLname'];
    if(isset($_POST['team'])) {
        $team = $_POST['team'];
    }
    $office = $_POST['office'];
    $gender = $_POST['gender'];
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $userAddress = isset($_POST['userAddress']) ? $_POST['userAddress'] : "";
    $userAddress = str_replace('tr.', 'tr. ', $userAddress);
    $userAddress = str_replace('tr.  ', 'tr. ', $userAddress);
    $userBirth = isset($_POST['userBirth']) ? $_POST['userBirth'] : "";
    $userPlace = isset($_POST['userPlace']) ? $_POST['userPlace'] : "";
    $userCity = isset($_POST['userCity']) ? $_POST['userCity'] : "";
    $userZip = isset($_POST['userZip']) ? $_POST['userZip'] : "";
    $userCountry = isset($_POST['userCountry']) ? $_POST['userCountry'] : "";
    $userTelOne = isset($_POST['userTelOne']) ? $_POST['userTelOne'] : "";
    $userTelTwo = isset($_POST['userTelTwo']) ? $_POST['userTelTwo'] : "";
    $userNotes = isset($_POST['userNotes']) ? $_POST['userNotes'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $specPrice = isset($_POST['specPrice']) ? $_POST['specPrice'] : "";
    $self_registered = isset($_POST['self_registered']) ? $_POST['self_registered'] : 0;
    if(!empty($_POST['userId'])) {
        $crud->updateUser($email, $userFname, $userLname, $gender, $title, $team, $office, $userAddress, $userZip, $userCity, $userBirth, $userPlace, $userCountry, $userTelOne, $userTelTwo, $userNotes, $_POST['userId'], $specPrice);
        $user_id = $_POST['userId'];
    } 
    else {
        $data = $crud->createUser($userType, $email, $userFname, $userLname, $gender, $title, $team, $office, $userAddress, $userZip,  $userCity, $userBirth, $userPlace, $userCountry, $userTelOne, $userTelTwo, $userNotes, $password, $specPrice, $self_registered);

        if(!$data) {
            echo json_encode(["success" => false, "message" => $ln['error_register']]);
            exit;
        }

        $to = $email;
        // if(strpos(strtolower($to), 'user') !== false) {
        //     $to = $supportEmail;
        // }
        
        $fromName = "$userFname $userLname";
        $fromEmail = $supportEmail;
        $password1 = $data[1];

        $subject = "[GWM Support] Willkommen";
        $headers = "From: $fromEmail\r\n".
            "MIME-Version: 1.0\r\n".
            "Content-Type: text/html; charset=utf-8\r\n".
            " boundary=\"04CCAee0854\"\r\n";
        require_once '../template/welcome.php';

        $hash = $crud->addHash($email);

        $template = new Welcome($email, $password1, $hash);
        $content = $template->getTemplate();

        if($self_registered == 1) {
            $to = $supportEmail;
            
            $fromName = "$userFname $userLname";
            $fromEmail = $email;

            $subject = "[Registrierung] $fromName";
            $headers = "From: $fromEmail\r\n".
                "MIME-Version: 1.0\r\n".
                "Content-Type: text/html; charset=utf-8\r\n".
                " boundary=\"04CCAee0854\"\r\n";
                
            $content = "Neuer Benutzer registriert. <br> Bitte überprüfen und zulassen.";
            mail($to, $subject, $content, $headers, "-f $fromEmail");
        } else {
            mail($to, $subject, $content, $headers, "-f $fromEmail");
            mail($fromEmail, $subject, $content, $headers, "-f $fromEmail");
        }

    }

    echo json_encode(["success" => true, "user_id" => $data[0] ?? $user_id, "message" => $ln['success_register']]);
    // header("Location: ../backoffice/".$page.".php");
}

if(isset($_POST['IDfileUpload'])) {
    // file upload
    $user_id = $_POST["user_id"];
    $base = "../clients/uploads/";
    if(!file_exists($base)) {
        mkdir($base);
    }
    $preg_path =  date('Y-m-d_H-i-s') . "_" . $user_id ."_";
    $ID_file_name = $preg_path . basename( $_FILES['ID_file']['name']); 
    
    if(move_uploaded_file($_FILES['ID_file']['tmp_name'], $base.$ID_file_name)) {
        // $res = $crud->upsertFile($user_id, $ID_file_name, 1, $_POST['id_status']);
        echo json_encode($ID_file_name);
    } else {
        echo json_encode(false);
    }

}

if(isset($_POST['UtilityfileUpload'])) {
    // file upload
    $user_id = $_POST["user_id"];
    $base = "../clients/uploads/";
    if(!file_exists($base)) {
        mkdir($base);
    }
    $preg_path =  date('Y-m-d_H-i-s') . "_" . $user_id ."_";

    $Utility_file_name = $preg_path . basename( $_FILES['Utility_file']['name']);

    if(move_uploaded_file($_FILES['Utility_file']['tmp_name'], $base.$Utility_file_name)) {
        // $res = $crud->upsertFile($user_id, $Utility_file_name, 2, $_POST['utility_status']);
        echo json_encode($Utility_file_name);
    } else {
        echo json_encode(false);
    }
}

if(isset($_POST['ndafileUpload'])) {
    // file upload
    $user_id = $_POST["user_id"];
    $base = "../clients/uploads/";
    if(!file_exists($base)) {
        mkdir($base);
    }
    $preg_path =  date('Y-m-d_H-i-s') . "_" . $user_id ."_";

    $nda_file_name = $preg_path . basename( $_FILES['nda_file']['name']);

    if(move_uploaded_file($_FILES['nda_file']['tmp_name'], $base.$nda_file_name)) {
        // $res = $crud->upsertFile($user_id, $nda_file_name, 2, $_POST['utility_status']);
        echo json_encode($nda_file_name);
    } else {
        echo json_encode(false);
    }
}


if(isset($_POST['kycUserUpload'])) {
    $to = $supportEmail;
    
    $fromName = $_POST['senderName'];
    $fromEmail = $_POST['senderEmail'];

    $headers = "From: $fromEmail\r\n".
		"MIME-Version: 1.0\r\n".
		"Content-Type: multipart/alternative;\r\n".
		" boundary=\"04CCAee0854\"\r\n";

    $content = "\n--04CCAee0854\r\n".
		"Content-Type: text/html; charset=utf-8\r\n".
		"Content-Transfer-Encoding: quoted-printable\r\n\r\n"."User uploaded the KYC file.";

    // file upload
    $user_id = $_POST["userId"];
    $base = "../clients/uploads/";
    if(!file_exists($base)) {
        mkdir($base);
    }
    $preg_path =  date('Y-m-d_H-i-s') . "_" . $user_id ."_";

    if(isset($_FILES['ID_file'])) {
        $id_file_name = $preg_path . basename( $_FILES['ID_file']['name']);
    
        if(move_uploaded_file($_FILES['ID_file']['tmp_name'], $base.$id_file_name)) {
            $res = $crud->upsertFile($user_id, $id_file_name, 1);
            $subject = "[File Upload] $fromName (ID)";
            mail($to, $subject, $content, $headers, "-f $fromEmail");
        }
    }

    if(isset($_FILES['Utility_file'])) {
        $utility_file_name = $preg_path . basename( $_FILES['Utility_file']['name']);
    
        if(move_uploaded_file($_FILES['Utility_file']['tmp_name'], $base.$utility_file_name)) {
            $res = $crud->upsertFile($user_id, $utility_file_name, 2);
            $subject = "[File Upload] $fromName (Utility Bill)";
            mail($to, $subject, $content, $headers, "-f $fromEmail");
        }
    }


    if(isset($_FILES['nda_file'])) {
        $nda_file_name = $preg_path . basename( $_FILES['nda_file']['name']);
    
        if(move_uploaded_file($_FILES['nda_file']['tmp_name'], $base.$nda_file_name)) {
            $res = $crud->upsertFile($user_id, $nda_file_name, 3);
            $subject = "[File Upload] $fromName (NDA)";
            mail($to, $subject, $content, $headers, "-f $fromEmail");
        }
    }
    
    echo json_encode(true);
}

if(isset($_POST['kycAjax'])) {
    $user_id = $_POST['userId'];
    $ID_file_name = $_POST['id_file_name'];
    $Utility_file_name = $_POST['utility_file_name'];
    $nda_file_name = $_POST['nda_file_name'];

    // if($ID_file_name) {
        $crud->upsertFile($user_id, $ID_file_name, 1, $_POST['id_status']);
    // }
    // if($Utility_file_name) {
        $crud->upsertFile($user_id, $Utility_file_name, 2, $_POST['utility_status']);
    // }
    // if($nda_file_name) {
        $crud->upsertFile($user_id, $nda_file_name, 3, $_POST['nda_status']);
    // }

    echo json_encode(true);
}

// User Invest.
if(isset($_POST['userInvestAjax'])) {
    $user_id = $_POST['userId'];
    $userInvest = $_POST['userInvest'];
    $project = $_POST['project'];
    $userPrice = $_POST['userPrice'];
    $userSize = $_POST['userSize'];
    $payMethod = $_POST['payMethod'];
    $tracking_service = $_POST['tracking_service'];
    $tracking_id = $_POST['tracking_id'];
    $shipping = $_POST['shipping'] ?? 1;

    $result = $crud->insertInvest($userInvest, $project, $userPrice, $userSize, $payMethod, $tracking_service, $tracking_id, $shipping, $user_id);

    echo json_encode($result); exit;
}

// User Invest temp.
if(isset($_POST['userInvestTemp'])) {
    $user_id = $_POST['userId'];
    $userInvest = $_POST['userInvest'];
    $project = $_POST['project'];
    $userPrice = $_POST['userPrice'];
    $userSize = $_POST['userSize'];

    $result = $crud->insertInvestTemp($userInvest, $project, $userPrice, $userSize, $user_id);

    echo json_encode($result); exit;
}

// Get KYC info
if(isset($_POST['getKYC'])){
    $id = $_POST['user_id'];
    $idFile = $crud->getFileInfo($id, 1);
    $utilityFile = $crud->getFileInfo($id, 2);
    $ndaFile = $crud->getFileInfo($id, 3);
    echo json_encode(['id_file' => $idFile, 'utility_file' => $utilityFile, 'nda_file' => $ndaFile]); 
}

// Remove user entry
if(isset($_POST['removeUser'])) {
    $entry_id = $_POST['id'];
    $status = $_POST['status'];
    $crud->deactiveUser($entry_id, $status);
    echo true; exit;
}

// Set Public File
if(isset($_POST['setPublicFile'])) {
    $entry_id = $_POST['id'];
    $status = $_POST['status'];
    $crud->setPublicFile($entry_id, $status);
    echo true; exit;
}

// get user details for edit
if(isset($_POST['getUserInfoById'])) {
    $id = $_POST['user_id'];
    $result = $crud->getUserDetailsWithId($id);
    $idFile = $crud->getFileInfo($id, 1);
    $utilityFile = $crud->getFileInfo($id, 2);
    $ndaFile = $crud->getFileInfo($id, 3);
    $teamOptions = $crud->getSelectBox("teams");
    echo json_encode(['data' => $result, 'id_file' => $idFile, 'utility_file' => $utilityFile, 'nda_file' => $ndaFile, "options" => $teamOptions]); exit();
}

// get user details for edit
if(isset($_POST['getDataInvest'])) {
    $invest_id = $_POST['invest_id'];
    $result = $crud->getInvestDetails($invest_id);
    echo json_encode(['data' => $result]); exit();
}

// update investment
if(isset($_POST['updateInvest'])) {
    $invest_id = $_POST['investId'];
    
    $prevInvestState = $crud->getInvestDetails($invest_id);

    $user_id = $_POST['userId'];
    $investment = $_POST['investment'] ?? $prevInvestState['investment'];
    $price = $_POST['price'] ?? $prevInvestState['price'];
    $size = $_POST['size'] ?? $prevInvestState['size'];
    $payMethod = $_POST['payMethod'] ?? $prevInvestState['payment_method'];
    $shipping = $_POST['shipping'] ?? $prevInvestState['shipping'];
    $payed = $_POST['payed'] ?? $prevInvestState['payed'];
    $bank_loc = $_POST['bank_loc'] ?? $prevInvestState['bank_loc'];
    $re_payed = $_POST['re_payed'] ?? $prevInvestState['re_payed'];
    $payed_date = $_POST['payed_date'] ?? $prevInvestState['payed_date'];
    $re_payed_date = $_POST['re_payed_date'] ?? "";
    $re_cashed = $_POST['re_cashed'] ?? $prevInvestState['re_cashed'];
    $re_cashed_date = $_POST['re_cashed_date'] ?? "";
    $payed_email = $_POST['payed_email'] ?? $prevInvestState['payed_email'];
    $wallet = $_POST['wallet'] ?? $prevInvestState['wallet'];
    $status = $_POST['status'] ?? $prevInvestState['status'];
    $tracking_service = $_POST['tracking_service'] ?? $prevInvestState['tracking_service'];
    $tracking_id = $_POST['tracking_id'] ?? $prevInvestState['tracking_id'];


    $prevPayed = 1;

    if(isset($payed) && $prevInvestState != '') {
        $prevPayed = $prevInvestState['payed'];
    }
    $prevRePayed = 1;

    if(isset($re_payed) && $prevInvestState != '') {
        $prevRePayed = $prevInvestState['re_payed'];
    }
    $prevReCashed = 1;

    if(isset($re_cashed) && $prevInvestState != '') {
        $prevReCashed = $prevInvestState['re_cashed'];
    }

    // $prevPayedEmail = $payed_email;

    // if($prevInvestState != '') {
    //     $prevPayedEmail = $prevInvestState['payed_email'];
    // }

    $result = $crud->updateInvestment($invest_id, $investment, $price, $size, $payMethod, $shipping, $payed, $payed_date, $bank_loc, $prevPayed, $re_payed, $re_payed_date, $prevRePayed, $re_cashed, $re_cashed_date, $prevReCashed, $payed_email, $wallet, $status, $tracking_service, $tracking_id);

    if(isset($payed) && $prevPayed != 1 && $payed == 1) {
        $to = $supportEmail;
        
        $fromName = "#$invest_id";
        $fromEmail = "paymaster@greenwavematerials.com";

        $subject = "[Payed] $fromName";
        $headers = "From: $fromEmail\r\n".
            "MIME-Version: 1.0\r\n".
            "Content-Type: text/html; charset=utf-8\r\n".
            " boundary=\"04CCAee0854\"\r\n";
            
        $content = "Die Investition #$invest_id von {$prevInvestState['fname']} {$prevInvestState['lname']} wurde bezahlt.";

        mail($to, $subject, $content, $headers, "-f $fromEmail");
    }

    // if($prevPayedEmail != $payed_email && $payed_email == 1) {
    //     $to = $prevInvestState['email'];
        
    //     $fromName = "Investment #$invest_id";
    //     $fromEmail = $supportEmail;

    //     $subject = "[GWM Support Team] $fromName";
    //     $headers = "From: $fromEmail\r\n".
    //         "MIME-Version: 1.0\r\n".
    //         "Content-Type: text/html; charset=utf-8\r\n".
    //         " boundary=\"04CCAee0854\"\r\n";
            
    //     require_once '../template/confirm.php';

    //     $template = new Confirm($crud->getInvestDetails($invest_id));
    //     $content = $template->getTemplate();

    //     // mail($to, $subject, $content, $headers, "-f $fromEmail");
    // }
    
    header("Location: ../backoffice/investment.php" . ($user_id ? "?user_id=$user_id" : ""));
}

// get user details for edit
if(isset($_POST['updateTrackingData'])) {
    $invest_id = $_POST['investId'];
    $tracking_service = $_POST['tracking_service'];
    $tracking_id = $_POST['tracking_id'];

    $result = $crud->updateTrackingData($invest_id, $tracking_service, $tracking_id);
    header("Location: ../backoffice/investment.php");
}

// get user details for edit
if(isset($_POST['setCashed'])) {
    $cashs = $_POST['cashs'];
    $cashed_date = $_POST['cashed_date'];

    $crud->updateCashs($cashs, $cashed_date);
    echo json_encode(true);
}

// Create Price
if(isset($_POST["createPrice"])) {
    $date = date_create($_POST['date']);
    $date = date_format($date,"Y-m-d");
    $project_id = $_POST['project_id'];
    $price = $_POST['price'];

    if(!empty($_POST['priceId'])) {
        $crud->updatePrice($_POST['priceId'], $project_id, $date, $price);
        $res = json_encode(['data' => "true"]);
    }
    else {
        $crud->createPrice($project_id, $date, $price);
    }

    header("Location: ../backoffice/price.php");
}

// Active Phase
if(isset($_POST['updatePhase'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $prev = $_POST['prev'];

    $crud->updatePhase($id, $status);
    if($prev != "") {
        $crud->updatePhase($prev, 2);
    }

    echo json_encode(true);
}

// Remove Price entry
if(isset($_POST['removePrice'])) {
    $entry_id = $_POST['id'];
    $crud->deletePrice($entry_id);
    echo true; exit;
}

// Remove File entry
if(isset($_POST['removeFile'])) {
    $entry_id = $_POST['id'];
    $crud->deleteFile($entry_id);
    echo true; exit;
}

// get user details for edit
if(isset($_POST['getPriceById'])) {
    $id = $_POST['price_id'];
    $result = $crud->getPriceById($id);
    echo json_encode(['data' => $result]); exit();
}

// Get All PRice List.
if(isset($_POST['getPriceList'])) {
    $userId = $_POST['userId'] ?? "";
    $result = $crud->getPriceList($userId);
    echo json_encode(['data' => $result]); exit();
}

// Send Order Mail
if(isset($_POST["sendOrderMail"])) {
   
    $to = $supportEmail;
    
    $fromName = $_POST['senderName'];
    $fromEmail = $_POST['senderEmail'];
    $fromPhone = $_POST["senderPhoneNumber"];
    $message = $_POST["orderMessage"];

    $subject = "[Termin buchen] $fromName";
    $headers = "From: $fromEmail\r\n".
		"MIME-Version: 1.0\r\n".
		"Content-Type: multipart/alternative;\r\n".
		" boundary=\"04CCAee0854\"\r\n";
    // $headers = "Content-type: text/html; charset=8859-1\r\n From: $fromEmail \r\n";
    $content = "\n--04CCAee0854\r\n".
		"Content-Type: text/html; charset=utf-8\r\n".
		"Content-Transfer-Encoding: quoted-printable\r\n\r\n"."<b>Name: </b> $fromName<br /><b>Email : </b> $fromEmail<br /><b>Phone Number : </b> $fromPhone<br /><b>Message : </b> $message<br />";
    
    $result = mail($to, $subject, $content, $headers, "-f $fromEmail");
    echo json_encode(["success" => $result, "message" => $ln["success_req"]]);
}

// Send Forgot Paasword Request
if(isset($_POST["forgotPassword"])) {
    // $to = $supportEmail;
    
    $email = $_POST['email'];
    
    $result = $crud->checkEmail($email);
    if(!$result["isExist"]) {
        echo json_encode(["success" => false, "message" => "This email address doesn't exist."]);
    } else {   
        
        $to = $email;
        if(strpos(strtolower($to), 'user') !== false) {
            $to = $supportEmail;
        }
        $fromEmail = $supportEmail;
        // $password1 = $data[1];

        $subject = "[GWM Support] Passwort zurücksetzen";
        $headers = "From: $fromEmail\r\n".
            "MIME-Version: 1.0\r\n".
            "Content-Type: text/html; charset=utf-8\r\n".
            " boundary=\"04CCAee0854\"\r\n";
        require_once '../template/forgot.php';

        $hash = $crud->addHash($email);

        $template = new Forgot($hash);
        $content = $template->getTemplate();
        $res = mail($to, $subject, $content, $headers, "-f $fromEmail");
        
        echo json_encode(["success" => $res, "message" => $ln["password_req"]]);
    }
}

// Send White Paper Request
if(isset($_POST["sendWhitePaper"])) {
    $to = $supportEmail;
    
    $fromName = $_POST['senderName'];
    $fromEmail = $_POST['senderEmail'];
    $fromPhone = $_POST['senderPhoneNumber'];
    $message = $_POST["whitePaperMessage"];

    $subject = "[Whitepaper anfordern] $fromName";
    $headers = "From: $fromEmail\r\n".
		"MIME-Version: 1.0\r\n".
		"Content-Type: multipart/alternative;\r\n".
		" boundary=\"04CCAee0854\"\r\n";
    $content = "\n--04CCAee0854\r\n".
		"Content-Type: text/html; charset=utf-8\r\n".
		"Content-Transfer-Encoding: quoted-printable\r\n\r\n"."<b>Name : </b> $fromName<br /><b>Email : </b> $fromEmail<br /><b>Phone Number : </b> $fromPhone<br /><b>Message : </b> $message<br />";

    $result = mail($to, $subject, $content, $headers, "-f $fromEmail");
    echo json_encode(["success" => $result, "message" => $ln["success_req"]]);
}

// Send Support Ticket Request
if(isset($_POST["sendTicket"])) {
    $to = $supportEmail;
    
    $fromName = $_POST['senderName'];
    $fromEmail = $_POST['senderEmail'];
    $fromPhone = $_POST['senderPhoneNumber'];
    $message = $_POST["ticketMessage"];

    $subject = "[Support Ticket] $fromName";
    $headers = "From: $fromEmail\r\n".
		"MIME-Version: 1.0\r\n".
		"Content-Type: multipart/alternative;\r\n".
		" boundary=\"04CCAee0854\"\r\n";
    $content = "\n--04CCAee0854\r\n".
		"Content-Type: text/html; charset=utf-8\r\n".
		"Content-Transfer-Encoding: quoted-printable\r\n\r\n"."<b>Name : </b> $fromName<br /><b>Email : </b> $fromEmail<br /><b>Phone Number : </b> $fromPhone<br /><b>Message : </b> $message<br />";

    $result = mail($to, $subject, $content, $headers, "-f $fromEmail");
    echo json_encode(["success" => $result, "message" => $ln["success_req"]]);
}

// Send File to Client
if(isset($_POST['sendFile'])) {
    $to = $_POST['toClient'];
    if(strpos(strtolower($to), 'user') !== false) {
            $to = $supportEmail;
        }
    $file_name = $_POST['file_name'];

    $fromEmail = $supportEmail;
    $subject = "[Green Wave Material] Support Team";

    $content = file_get_contents("../clients/uploads/" . $file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: $fromEmail" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= "Check this file." . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    //SEND Mail
    $res = mail($to, $subject, $body, $headers);

    echo json_encode(["success" => $res, "message" => "File sent successfully."]);
}

// Send Current Password Request
if(isset($_POST["currentPassword"])) {

    $to = $_POST['email'];
    if(strpos(strtolower($to), 'user') !== false) {
            $to = $supportEmail;
        }
    $pass = $_POST['pass'];
    
    $fromEmail = $supportEmail;

    $subject = "[GWM Support] Current Password";
    $headers = "From: $fromEmail\r\n".
		"MIME-Version: 1.0\r\n".
		"Content-Type: multipart/alternative;\r\n".
		" boundary=\"04CCAee0854\"\r\n";
    $content = "\n--04CCAee0854\r\n".
		"Content-Type: text/html; charset=utf-8\r\n".
		"Content-Transfer-Encoding: quoted-printable\r\n\r\n"."Don't share your password with others. <br /> Your current password is <b>$pass</b>";

    $result = mail($to, $subject, $content, $headers, "-f $fromEmail");
    echo json_encode(["success" => $result, "message" => $ln["success_pass"]]);
}

// Save & Send Current Password Request
if(isset($_POST["setPassword"])) {

    $to = $_POST['email'];
    if(strpos(strtolower($to), 'user') !== false) {
            $to = $supportEmail;
        }
    $user_id = $_POST['user_id'];
    $pass = $_POST['pass'];

    $crud->updatePass($user_id, $pass);
    
    // $fromEmail = $supportEmail;

    // $subject = "[GWM Support] New Password";
    // $headers = "From: $fromEmail\r\n".
	// 	"MIME-Version: 1.0\r\n".
	// 	"Content-Type: multipart/alternative;\r\n".
	// 	" boundary=\"04CCAee0854\"\r\n";
    // $content = "\n--04CCAee0854\r\n".
	// 	"Content-Type: text/html; charset=utf-8\r\n".
	// 	"Content-Transfer-Encoding: quoted-printable\r\n\r\n"."Don't share your password with others. <br /> New password is <b>$pass</b>";

    // $result = mail($to, $subject, $content, $headers, "-f $fromEmail");
    echo json_encode(["success" => true, "message" => $ln["success_pass_set"]]);
}

// Save Current File Password
if(isset($_POST["setFilePassword"])) {
    $pass = $_POST['pass'];
    $crud->setSetting("file_pass", $pass);
    echo json_encode(["success" => true, "message" => $ln["success_pass_set"]]);
}

if(isset($_POST["checkUploadFiles"])) {
    $file_name = $_POST["file_name"];
    
    if($crud->isExist($file_name)) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

if(isset($_POST["uploadFiles"])) {
    // File Upload (ID, Utilify bill file.);
    // $user_id = $_POST["user_id"];
    $base = "../backoffice/files/";
    if(!file_exists($base)) {
        mkdir($base);
    }
    // $preg_path =  date('Y-m-d_H-i-s') . "_" . time() ."_";

    $upload_file_name = basename( $_FILES['uploadFile']['name']); 

    if(file_exists($base.$upload_file_name)) {
        unlink($base.$upload_file_name);
    }

    if(move_uploaded_file($_FILES['uploadFile']['tmp_name'], $base.$upload_file_name)) {
        $crud->saveFile($upload_file_name);
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

if(isset($_POST["filesLogin"])) {
    $password = $_POST['file_pass'];
    $file_pass = $crud->getSetting('file_pass');
    if ($file_pass == $password) {
        setcookie ("file_login_pass", "file_login", 0, "/");
        echo json_encode(["success" => true, "msg" => ""]);
    } else {
        echo json_encode(["success" => false, "msg" => $ln['wrong_pass']]);
    }
}

if(isset($_POST["userLogin"])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $role = "";
    if($isLogin) {
        $role = $loginUser['role'];
    } else {
        echo json_encode(["success" => false, "hash" => ""]);
        exit;
    }
    $user = $crud->getUserById($id);
    if($user == false) {
        echo json_encode(["success" => false, "hash" => ""]);
        exit;
    }
    $created = strtotime($user['last_login']);
    $now = strtotime(date('Y-m-d h:m:s'));
    
    // if(($now - $created) > 7200) {
    //     // echo json_encode(["success" => false, "hash" => "$now,$created".date('Y-m-d h:m:s').($now - $created)]);
    //     // exit;
    // }

    if(!isset($user['passhash']) || ($now - $created) > 7*86400) {
        $hash = $crud->addHash($email);
    } else {
        $hash = $user['passhash'];
    }
    // $hash = $crud->addHash($email);
    // if ($file_pass == $password) {
        // setcookie ("file_login_pass", "file_login", 0, "/");
    echo json_encode(["success" => true, "hash" => $hash]);
    // } else {
        // echo json_encode(["success" => false, "hash" => ""]);
    // }
}

if(isset($_POST["changePassword"])) {
    $current = $_POST['current'];
    $newPass = $_POST['newPass'];
    $hash = $_POST['hash'] ?? '';
    $password = false;
    if($hash == "") {
        $hash = $loginUser['id'];
    }
    $password = $crud->getPassword($hash);
    if($password && ($current == $password)) {
        $crud->savePassword($hash, $newPass);
        echo json_encode(["success" => true, "msg" => "Success."]);
    } else {
        echo json_encode(["success" => false, "msg" => $ln['wrong_pass']]);
    }
}

if(isset($_POST["changePasswordOne"])) {
    
    $hash = $_POST['hash'];
    $pass = $_POST['pass'];

    $user = $crud->getUserbyHash($hash, 'last_login');

    if($hash != "" && $user != false) {
        $crud->savePasswordById($user['id'], $pass);
    }

    echo json_encode(true);
}

if(isset($_POST["getFiles"])) {
    $files = $crud->getPublicFiles(true);
    echo json_encode(["data" => $files]);
}

if(isset($_POST["getPhases"])) {
    $phases = [];
    if(isset($_COOKIE['file_login_pass'])) {
        $phases = $crud->getPhaseList();
    }
    echo json_encode(["data" => $phases]);
}

if(isset($_POST["updatePeriod"])) {
    $id = $_POST['phaseId'];
    $from = $_POST['fromDate'];
    $to = $_POST['toDate'];
    $from = date_create($from);
    $from = date_format($from, 'm.d.Y');
    $to = date_create($to);
    $to = date_format($to, 'm.d.Y');
    $data = "$from - $to";
    $crud->updatePeriod($id, $data);
    header('Location: ' . str_replace('?tab=3', '', $_SERVER['HTTP_REFERER']) . '?tab=3');
}

if(isset($_POST["updateSpecPrice"])) {
    $id = $_POST['userId'];
    $specPrice = $_POST['specPrice'];
    $crud->updateSpecPrice($id, $specPrice);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['addWallet'])){
    $invest_id = $_POST['investId'];
    $wallet = $_POST['wallet'];

    $res = $crud->addWalletAddress($invest_id, $wallet);
    echo json_encode($res);
}

if(isset($_GET["languageSet"])) {
    $_SESSION["lang"] = $_GET["lang"];
    echo json_encode(true);
}

?>