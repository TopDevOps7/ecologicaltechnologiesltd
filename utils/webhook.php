<?php
require '../lang/config.php';
require 'dbconfig.php';
require '../utils/config.php';

$to = 'dev@greenwavematerials.com';

$subject = '[Adobe WebHook Handler] Received';
$headers =
    "From: esign@greenwavematerials.com\r\n" .
    "MIME-Version: 1.0\r\n" .
    "Content-Type: text/html; charset=utf-8;\r\n" .
    " boundary=\"04CCAee0854\"\r\n";

try {
  
// Fetch client id
$clientid = $_SERVER['HTTP_X_ADOBESIGN_CLIENTID'];
if ($clientid == 'CBJCHBCAABAA3chlrDYNO1-k1jeJ0UMNahwYTeWy1Ijp') {
//Validate
header('Content-Type: application/json');
$body = ['xAdobeSignClientId' => $clientid];
echo json_encode($body);
header('HTTP/1.1 200 OK');
  $curl = curl_init();
  
  curl_setopt_array($curl, [
      CURLOPT_URL => 'https://api.na4.adobesign.com/oauth/v2/refresh',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => 'refresh_token=3AAABLblqZhBHJYwaEFD6qhvqFaAO08vMmE0CurHAsO2FczeMMbg-QJbqcaHlu5gj5aXtccNxwIE*&client_id=CBJCHBCAABAA3chlrDYNO1-k1jeJ0UMNahwYTeWy1Ijp&client_secret=DtUDuJGj7kqUjQInOj-Qywei4NzBCyx9&grant_type=refresh_token',
      CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
  ]);
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  
  $res = json_decode($response);
  
  $access_token = $res->access_token;

  $curl = curl_init();
  
  curl_setopt_array($curl, [
      CURLOPT_URL => "https://api.na4.adobesign.com/api/rest/v6/agreements",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => ["Authorization: Bearer $access_token"]
  ]);
  
  $response = curl_exec($curl);
  curl_close($curl);

  $res = json_decode($response);
  $tempInvestIds = [];
  $dbIds = $crud->getInvestAgreementIds();
  foreach ($res->userAgreementList as $key => $value) {
    if($value->status != "SIGNED") {
      $diff = array_diff([$value->id], $dbIds);
      if(count($diff) > 0){
        $te = explode("-", $value->name);
        if(count($te) == 2) {
          $tempInvestIds[] = ["agreement" => $value->id, "investId" => $te[1]];
        }
      }
    }
  }
  
  if(count($tempInvestIds) > 0) {
    foreach ($tempInvestIds as $key => $value) {
      $crud->moveToInvestment($value["investId"], $value['agreement']);
    }
  }
  
}
} catch (Exception $e) {
  $req = json_encode($e);
  $content = "<b>Wow! Hook Error! $req<br />";

  $result = mail(
      $to,
      $subject,
      $content,
      $headers,
      '-f esign@greenwavematerials.com'
    );
}
?>