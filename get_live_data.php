<?php
    include_once("lang/config.php");
    include_once('utils/dbconfig.php');

	$arr = array();

    $flag = false;

    if(isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
        $sql = "SELECT price_clients.*, project.name FROM price_clients LEFT JOIN project ON price_clients.project_id = project.id  WHERE price_clients.user_id = :user_id";
        $stmt = $DB_con->prepare($sql);
        $stmt->bindparam(":user_id", $userId);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $specRow = $stmt->fetch(PDO::FETCH_ASSOC);
        	$specRow['price'] = number_format($specRow['price'], 2, '.', '\'');
            $arr[] = $specRow;
            $flag = true;
        }
    }

    $sql = "SELECT * FROM ticker ORDER BY id ASC";
    if($flag) {
        // $sql = "SELECT * FROM ticker WHERE name != '{$arr[0]['name']}' ORDER BY id ASC";
    }
    $stmt = $DB_con->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $infi = 1;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        	$row['perc'] = number_format($row['perc'], 2, '.', '\'');

        	if ($row['name']=="EURUSD") {$nfd = 4;}
        	else {$nfd = 2;}
            if($flag && $row["name"] == $arr[0]['name']) {
                $arr[0]['perc'] = $arr[0]['price'] / $row['price'] * 100 ;
                // $arr[0]['id'] = $row['id'];
                // $arr[0]['status'] = $arr[0]['price'] > $row['price'] ? "1" : "-1";
            } else {
                $row['price'] = number_format($row['price'], $nfd, '.', '\'');
                $arr[] = $row;
            }
        }
    }
    $data = [];
    $portfolio = [];
    $invest = 0;
    if(isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
        $sql = "SELECT investment.*, project.name as project_name FROM investment LEFT JOIN project ON investment.project = project.id WHERE user_id = :user_id AND payed = 1 AND re_payed != 1";
        $stmt = $DB_con->prepare($sql);
        $stmt->bindparam(":user_id", $userId);
        $stmt->execute();
        if($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $invest += $row['investment'];
                $portfolio[] = ["project" => $row["project_name"], "size" => $row['size']];
            }
        }
    }

    $data = ["portfolio" => $portfolio, "investment" => $invest];

    echo json_encode(["prices" => $arr, "data" => $data]);
    exit();
?>