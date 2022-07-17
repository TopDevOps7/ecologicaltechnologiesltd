<?php 

	$link = $_SERVER['PHP_SELF'];
	$link_array = explode('/',$link);
	$pagePath = $link_array[count($link_array) - 2];
	$page = end($link_array);
	// $authMessage = "";

	$basePath = "";
	if($pagePath == "backoffice") {
		$basePath = "../";
	}
	$loginUser = [];
  $isLogin = isset($_COOKIE['login_pass']);
	if(isset($_COOKIE['user'])) {
		$loginUserData = json_decode($_COOKIE['user']);
		$loginUser = [
			"id" => $loginUserData->id,
			"role" => $loginUserData->role,
		];
	}
	if($isLogin) {
		$role = $loginUser['role'] ?? null;
		
		$profile_url = "backoffice/index_x.php";
		
		switch ($role) {
			case 1:
        $title = "Admin Panel";
        break;
			case 2:
				$title = "Backoffice Panel";
			break;
			case 3:
				$title = "Loader Panel";
				break;
			case 5:
				$title = "Izmir Panel";
				break;
			case 20:
				$title = "Paymaster Panel";
				break;
			case 21:
				$title = "Postmaster Panel";
				break;
			case 6:
				$title = "Antalya Panel";
				break;
			case 4:
				$title = $ln["profile"];
				$profile_url = "user.php";
				break;
			default:
				$isLogin = false;
      break;
    }
	}

	$trackings = $crud->getTrackingServices();

	$tracking_service_options = $trackings['tracking_service_options'];
	$tracking_service_urls = $trackings['tracking_service_urls'];
	$tracking_services = $trackings['tracking_services'];
?>