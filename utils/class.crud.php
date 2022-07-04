<?php

class crud
{
    private $db;
    private $ln;

    function __construct($DB_con, $lang)
    {
        $this->db = $DB_con;
        $this->ln = $lang;
    }

    // Return the role value from email
    public function getRoleFromEmail($passhash)
    {
        $queryAddDomain = 'SELECT role FROM user WHERE passhash = :passhash';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':passhash', $passhash);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return $row['role'];
            }
        } else {
            return false;
        }
    }

    public function getPassword($passhash)
    {
        $sql =
            'SELECT password FROM user WHERE passhash = :passhash OR id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':passhash', $passhash);
        $stmt->bindparam(':id', $passhash);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return $row['password'];
            }
        } else {
            return false;
        }
    }

    public function getPasswordById($id)
    {
        $sql = 'SELECT password FROM user WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['password'];
        } else {
            return false;
        }
    }

    public function savePassword($passhash, $password)
    {
        $sql =
            'UPDATE user SET password = :password WHERE passhash = :passhash OR id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':passhash', $passhash);
        $stmt->bindparam(':id', $passhash);
        $stmt->bindparam(':password', $password);
        $stmt->execute();
        return true;
    }

    public function savePasswordById($id, $password)
    {
        $sql = 'UPDATE user SET password = :password WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':password', $password);
        $stmt->execute();
        return true;
    }

    // Return the id value from email
    public function getIdFromEmail($passhash)
    {
        $queryAddDomain = 'SELECT id FROM user WHERE passhash = :passhash';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':passhash', $passhash);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return $row['id'];
            }
        } else {
            return false;
        }
    }

    // Return the team value from email
    public function getAllTeamMember($id)
    {
        $team = '';
        $allMember = [];
        $queryAddDomain = 'SELECT team, team_2 FROM user WHERE id = :id';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $team = $row['team'];
                $team2 = $row['team_2'];
            }
        } else {
            return false;
        }

        $queryAddDomain = 'SELECT id FROM user WHERE team = :team AND role = 4';
        if (isset($team2)) {
            $queryAddDomain =
                'SELECT id FROM user WHERE (team = :team OR team = :team2) AND role = 4';
        }

        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':team', $team);
        if (isset($team2)) {
            $stmt->bindparam(':team2', $team2);
        }
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $allMember[] = $row['id'];
            }
        } else {
            return false;
        }

        return $allMember;
    }

    // Return whole detail by passhash
    public function getWholeDetailsFromHash($id)
    {
        $result = [];

        $queryAddDomain =
            'SELECT user.*, teams.name AS tName, teams2.name AS tName2 FROM user LEFT JOIN teams ON user.team = teams.id LEFT JOIN teams AS teams2 ON user.team_2 = teams2.id WHERE user.id = :id OR user.passhash = :passhash';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':passhash', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $key => $value) {
                    if ($key == 'id') {
                        $userId = $value;
                    }
                    $result[$key] = $value;
                }
            }

            $sql =
                'SELECT * FROM investment WHERE user_id = :user_id AND payed = 1 AND re_payed != 1';
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':user_id', $userId);
            $stmt->execute();
            $payedCount = $stmt->rowCount();

            $queryAddDomain =
                'SELECT * FROM investment WHERE user_id = :user_id AND status = 1 AND re_payed != 1 ORDER BY id DESC';
            $stmt = $this->db->prepare($queryAddDomain);
            $stmt->bindparam(':user_id', $userId);
            $stmt->execute();
            $totalCount = $stmt->rowCount();
            $result['flag'] = 0;
            if ($payedCount == $totalCount) {
                $result['flag'] = 1;
            }
            $result['kyc'] = [];
            $result['kyc']['id_file'] = $this->getFileInfo($userId, 1);
            $result['kyc']['utility_file'] = $this->getFileInfo($userId, 2);
            $result['kyc']['nda_file'] = $this->getFileInfo($userId, 3);
            $result['kyc']['nda_template'] = $this->getFileByName('nda');
            $result['invest'] = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result['invest'][$row['id']] = $row;
            }
            foreach ($result['invest'] as $key => $value) {
                if (!empty($value['project'])) {
                    $result['invest'][$key][
                        'project_name'
                    ] = $this->getProjectNameFromId($value['project']);
                }
            }

            return $result;
        } else {
            return false;
        }
    }

    // Return whole detail by passhash for admin/backoffice/loader
    public function getInvestDetailsFromHash($user_id = '')
    {
        $result = [];
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        if ($role == 3) {
            $teamMember = $this->getAllTeamMember($loginUser_->id);
            // print_r($teamMember); exit;
            $placeholders = str_repeat('?, ', count($teamMember) - 1) . '?';

            $sql = "SELECT invest.*, pro.name AS project_name FROM (SELECT investment.*, user.fname, user.address, user.kyc, user.country, user.zip, user.id AS userId, user.lname, user.email, user.notes, user.tel_1, user.tel_2, user.self_registered FROM investment LEFT JOIN user ON investment.user_id = user.id WHERE investment.user_id IN($placeholders)) AS invest LEFT JOIN project AS pro ON invest.project = pro.id";

            if ($user_id != '') {
                $sql .= " WHERE invest.user_id = $user_id";
            }

            $stmt = $this->db->prepare($sql);

            $stmt->execute($teamMember);
        } elseif ($role == 5) {
            $queryAddDomain =
                "SELECT invest.*, pro.name AS project_name FROM ((SELECT investL.* FROM (SELECT investment.*, user.id AS userId, user.kyc, user.fname, user.lname, user.office, user.address, user.city, user.zip, user.email, user.notes, user.tel_1, user.tel_2, user.self_registered FROM investment LEFT JOIN user ON investment.user_id = user.id GROUP BY investment.user_id) AS investL)) AS invest LEFT JOIN project AS pro ON invest.project = pro.id WHERE invest.office='2'";

            if ($user_id != '') {
                $queryAddDomain .= " AND invest.user_id = $user_id";
            }

            $stmt = $this->db->prepare($queryAddDomain);
            $stmt->execute();
        } elseif ($role == 6) {
            $queryAddDomain =
                "SELECT invest.*, pro.name AS project_name FROM ((SELECT investL.* FROM (SELECT investment.*, user.id AS userId, user.kyc, user.fname, user.lname, user.office, user.address, user.city, user.zip, user.email, user.notes, user.tel_1, user.tel_2, user.self_registered FROM investment LEFT JOIN user ON investment.user_id = user.id GROUP BY investment.user_id) AS investL)) AS invest LEFT JOIN project AS pro ON invest.project = pro.id WHERE invest.office='3'";

            if ($user_id != '') {
                $queryAddDomain .= " AND invest.user_id = $user_id";
            }

            $stmt = $this->db->prepare($queryAddDomain);
            $stmt->execute();
        } elseif ($role == 21) { 
        $queryAddDomain =
                'SELECT invest.*, pro.name AS project_name, country.de AS country_name FROM (SELECT investment.*, user.fname, user.lname, user.kyc, user.id AS userId, user.address, user.city, user.zip, user.email, user.notes, user.tel_1, user.gender, user.country, user.tel_2, user.self_registered FROM investment LEFT JOIN user ON investment.user_id = user.id) AS invest LEFT JOIN project AS pro ON invest.project = pro.id LEFT JOIN country ON invest.country = country.id WHERE invest.payed=1 AND invest.re_payed != 1 AND invest.shipping=1 AND invest.user_id != 7 AND invest.user_id != 58 AND invest.user_id != 36703';

            if ($user_id != '') {
                $queryAddDomain .= " AND invest.user_id = $user_id";
            }

            $queryAddDomain .= " ORDER BY invest.id DESC";

            $stmt = $this->db->prepare($queryAddDomain);
            $stmt->execute();
        } else if($role == 20) {
            $queryAddDomain =
                'SELECT invest.*, pro.name AS project_name FROM (SELECT investment.*, user.fname, user.lname, user.id AS userId, user.address, user.city, user.kyc, user.zip, user.email, user.notes, user.tel_1, user.tel_2, user.self_registered FROM investment LEFT JOIN user ON investment.user_id = user.id) AS invest LEFT JOIN project AS pro ON invest.project = pro.id WHERE invest.user_id != 7 AND invest.user_id != 58 AND invest.user_id != 36703 AND invest.status = 1';

            if ($user_id != '') {
                $queryAddDomain .= " AND invest.user_id = $user_id";
            }

            $stmt = $this->db->prepare($queryAddDomain);
            $stmt->execute();
        }
        else {
            $queryAddDomain =
                'SELECT invest.*, pro.name AS project_name FROM (SELECT investment.*, user.fname, user.lname, user.id AS userId, user.address, user.city, user.zip, user.kyc, user.email, user.notes, user.tel_1, user.tel_2, user.self_registered FROM investment LEFT JOIN user ON investment.user_id = user.id) AS invest LEFT JOIN project AS pro ON invest.project = pro.id';

            if ($user_id != '') {
                $queryAddDomain .= " WHERE invest.user_id = $user_id";
            }

            $stmt = $this->db->prepare($queryAddDomain);
            $stmt->execute();
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function updateCashs($cashs, $cashed_date)
    {
        if(count($cashs) > 0) {
            $placeholders = str_repeat('?, ', count($cashs) - 1) . '?';
            $query =  "UPDATE investment SET cashed=1, cashed_date='$cashed_date' WHERE id IN ($placeholders)";
            $stmt = $this->db->prepare($query);
            // $stmt->bindparam(':cashed_date', $cashed_date);
            $stmt->execute($cashs);
        }
    }

    public function getInvestAgreementIds()
    {
        $query = "SELECT _agreement FROM investment WHERE _agreement != ''";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $agreementIds = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agreementIds[] = $row['_agreement'];
        }
        return $agreementIds;
    }

    // Get the project detail using id
    public function getProjectNameFromId($project)
    {
        $queryAddDomain = 'SELECT * FROM project WHERE id = :id';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $project);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row['name'];
        }
    }

    // add hash to table
    public function addHash($email)
    {
        $hash = hash('md5', strtotime(date('Y-m-d h:i:sa')));
        $queryAddDomain =
            "UPDATE user SET passhash = :passhash, last_login='" .
            date('Y-m-d h:i:sa') .
            "' WHERE email = :email";
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':passhash', $hash);
        $stmt->bindparam(':email', $email);
        $stmt->execute();
        return $hash;
    }

    public function addLog($email)
    {
        $queryAddDomain = 'SELECT * FROM user WHERE email = :email';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':email', $email);
        $stmt->execute();

        $name = '';
        $user_id = '';

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = "{$row['lname']} ${$row['fname']}";
            $user_id = $row['id'];
        }

        $stmt = $this->db->prepare(
            'INSERT INTO z_logs(user_id, email, name) VALUES(:user_id, :email, :name)'
        );
        $stmt->bindparam(':user_id', $user_id);
        $stmt->bindparam(':email', $email);
        $stmt->bindparam(':name', $name);
        $stmt->execute();

        return true;
    }

    // Get all users
    public function getAllUser($type = null)
    {
        $isLoader = '';
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $query =
            'SELECT user.*, teams.name AS tName, teams2.name AS tName2 FROM user LEFT JOIN teams ON user.team = teams.id LEFT JOIN teams AS teams2 ON user.team_2 = teams2.id  WHERE role != 1';
        if (!empty($type)) {
            $query = $query . ' AND role = :role';
        }
        $file_list_string = '';
        $i = 0;
        $stmt = $this->db->prepare($query);

        if (!empty($type)) {
            $stmt->bindparam(':role', $type);
        }

        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            if ($row['role'] == 2) {
                $userType = 'Backoffice';
            } elseif ($row['role'] == 3) {
                $userType = 'Loader';
                $isLoader =
                    "<td class='symbol-detect c'>{$row['tName']}" .
                    (isset($row['tName2']) ? " + {$row['tName2']}" : '') .
                    '</td>';
            } elseif ($row['role'] == 5) {
                $userType = 'Izmir';
            } elseif ($row['role'] == 4) {
                $userType = 'Client';
            } else {
                $userType = 'Antalya';
            }

            $setPassword =
                "<a href='#' data-id='" .
                $row['id'] .
                "' data-email='" .
                $row['email'] .
                "' data-pass='" .
                $row['password'] .
                "' id='setPassword' data-bs-toggle='modal' title='Password Setting' data-bs-target='#setPasswordModal'><i class='fas fa-key'></i></a>";

            $addingHref =
                "<a href='#' data-id='" .
                $row['id'] .
                "' id='editUser' data-bs-toggle='modal' title='Edit $userType User' data-bs-target='#createUserModal'><i class='fas fa-edit'></i></a>";
            if ($row['status'] == 1) {
                $addingHrefRemove =
                    "
                    <a href='#' data-status='active' data-id='" .
                    $row['id'] .
                    "' data-user_name='" .
                    $row['fname'] .
                    ' ' .
                    $row['lname'] .
                    "' id='removeUser' data-bs-toggle='modal' data-bs-target='#removeUserModal' title='Block $userType User'><i class='fas fa-times-circle'></i></a>";
            } else {
                $addingHrefRemove =
                    "
                    <a href='#' data-status='blocked' data-id='" .
                    $row['id'] .
                    "' data-user_name='" .
                    $row['fname'] .
                    ' ' .
                    $row['lname'] .
                    "' id='removeUser' data-bs-toggle='modal' data-bs-target='#removeUserModal' title='Active $userType User'><i class='fas fa-check-circle'></i></a>";
            }
            $file_list_string .=
                '<tr>' .
                "<td class='symbol-detect c'>" .
                $row['lname'] .
                '</td>' .
                "<td class='symbol-detect c'>" .
                $row['fname'] .
                '</td>' .
                "<td class='symbol-detect c'>" .
                $row['email'] .
                '</td>' .
                $isLoader;

            if ($row['status'] == 1) {
                $file_list_string .=
                    "<td class='symbol-detect c'><span class='user-status active'>active</span></td>";
            } else {
                $file_list_string .=
                    "<td class='symbol-detect c'><span class='user-status block'>blocked</span></td>";
            }

            $file_list_string .=
                "<td class='c'>$addingHref " .
                ($role == 1 ? $setPassword : '') .
                "$addingHrefRemove</td></tr>";
        }
        return $file_list_string;
    }

    // Get all Client
    public function getAllClient()
    {
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $creator = $loginUser_->id;
        if ($role == '1' || $role == '2') {
            $query =
                'SELECT u.*, i.total, i.payed, i.token, teams.name AS tName, office.name AS oName, country.symbol FROM user AS u LEFT JOIN (SELECT t.total, t.token, p.payed, t.user_id FROM (SELECT SUM(investment) AS total, SUM(size) AS token, user_id FROM investment WHERE status = 1 AND re_payed != 1 GROUP BY user_id) AS t LEFT JOIN (SELECT SUM(investment) AS payed, user_id FROM investment WHERE payed = 1 AND re_payed != 1 AND status = 1 GROUP BY user_id) AS p ON t.user_id = p.user_id) AS i ON u.id = i.user_id LEFT JOIN teams ON u.team = teams.id LEFT JOIN office ON u.office = office.id LEFT JOIN country ON u.country = country.id WHERE role = 4';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        } elseif ($role == '5') {
            $query =
                "SELECT u.*, i.total, i.payed, i.token, teams.name AS tName, office.name AS oName, country.symbol FROM user AS u LEFT JOIN (SELECT t.total, t.token, p.payed, t.user_id FROM (SELECT investment AS total, size AS token, user_id FROM investment WHERE status = 1 AND re_payed != 1 GROUP BY user_id) AS t LEFT JOIN (SELECT investment AS payed, user_id FROM investment WHERE payed = 1 AND re_payed != 1 AND status = 1 GROUP BY user_id) AS p ON t.user_id = p.user_id) AS i ON u.id = i.user_id LEFT JOIN teams ON u.team = teams.id LEFT JOIN office ON u.office = office.id LEFT JOIN country ON u.country = country.id WHERE role = 4 AND office='2'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        } elseif ($role == '6') {
            $query =
                "SELECT u.*, i.total, i.payed, i.token, teams.name AS tName, office.name AS oName, country.symbol FROM user AS u LEFT JOIN (SELECT t.total, t.token, p.payed, t.user_id FROM (SELECT investment AS total, size AS token, user_id FROM investment WHERE status = 1 AND re_payed != 1 GROUP BY user_id) AS t LEFT JOIN (SELECT investment AS payed, user_id FROM investment WHERE payed = 1 AND re_payed != 1 AND status = 1 GROUP BY user_id) AS p ON t.user_id = p.user_id) AS i ON u.id = i.user_id LEFT JOIN teams ON u.team = teams.id LEFT JOIN office ON u.office = office.id LEFT JOIN country ON u.country = country.id WHERE role = 4 AND office='3'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        } else {
            $teamMember = $this->getAllTeamMember($loginUser_->id);
            $placeholders = '';
            if ($teamMember) {
                $placeholders = str_repeat('?, ', count($teamMember) - 1) . '?';
            }
            // $stmt = $this->db -> prepare("SELECT * FROM user WHERE creator IN($placeholders)");
            $stmt = $this->db->prepare(
                'SELECT u.*, i.total, i.payed, i.token, teams.name AS tName, office.name AS oName, country.symbol FROM user AS u LEFT JOIN (SELECT t.total, t.token, p.pay AS payed, t.user_id FROM (SELECT SUM(investment) AS total, SUM(size) AS token, user_id FROM investment WHERE status = 1 AND re_payed != 1 GROUP BY user_id) AS t LEFT JOIN (SELECT SUM(investment) AS pay, user_id FROM investment WHERE payed = 1 AND re_payed != 1 AND status = 1 GROUP BY user_id) AS p ON t.user_id = p.user_id) AS i ON u.id = i.user_id LEFT JOIN teams ON u.team = teams.id LEFT JOIN office ON u.office = office.id  LEFT JOIN country ON u.country = country.id ' .
                    ($placeholders != ''
                        ? "WHERE u.id IN ($placeholders)"
                        : 'WHERE 1 != 1')
            );

            $stmt->execute($teamMember ? $teamMember : null);
        }
        $file_list_string = '';
        $i = 0;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $addingHref =
                "<a href='#' data-id='" .
                $row['id'] .
                "' id='editUser' data-bs-toggle='modal' title='Edit Client User' data-bs-target='#createUserModal'><i class='fas fa-edit'></i></a>";

            $setPassword =
                "<a href='#' data-id='" .
                $row['id'] .
                "' data-email='" .
                $row['email'] .
                "' data-pass='" .
                $row['password'] .
                "' id='setPassword' data-bs-toggle='modal' title='Password Setting' data-bs-target='#setPasswordModal'><i class='fas fa-key'></i></a>";

            $linkInvest = "<a href='investment.php?user_id={$row['id']}' title='Investment Overview'><i class='fas fa-search-dollar'></i></a>";

            $loginClient = "<a href='#' class='login-as-client' data-id='{$row['id']}' data-email='{$row['email']}' title='Login as {$row['fname']} {$row['lname']}'><i class='fas fa-sign-in-alt'></i></a>";

            if ($row['status'] == 1) {
                $addingHrefRemove =
                    "<a href='#' data-status='active' data-id='" .
                    $row['id'] .
                    "' data-user_name='" .
                    $row['fname'] .
                    ' ' .
                    $row['lname'] .
                    "' id='removeUser' data-bs-toggle='modal' data-bs-target='#removeUserModal' title='Block Client User'><i class='fas fa-times-circle'></i></a>";
            } else {
                $addingHrefRemove =
                    "<a href='#' data-status='blocked' data-id='" .
                    $row['id'] .
                    "' data-user_name='" .
                    $row['fname'] .
                    ' ' .
                    $row['lname'] .
                    "' id='removeUser' data-bs-toggle='modal' data-bs-target='#removeUserModal' title='Activate Client User'><i class='fas fa-check-circle'></i></a>";
            }

            // $uploadButton = "<a href='#' data-id='".$row['id']."' id='uploadFileButton' data-bs-toggle='modal' data-bs-target='#uploadFileModal' title='File upload.'><i class='fas fa-file-upload' style='color: green;'></i></a>";
            $kyc = "<span class='kyc-status waiting-for-files'></span>";
            if ($row['kyc'] == 1) {
                $kyc = "<span class='kyc-status pending'></span>";
            } elseif ($row['kyc'] == 2) {
                $kyc =
                    "<span class='kyc-status active'><i class='fa fa-check'></i></span>";
            } elseif ($row['kyc'] == 3) {
                $kyc = "<span class='kyc-status block'></span>";
            }

            if ($row['status'] == 1) {
                $status =
                    "<td class='symbol-detect c'><span class='user-status active'>active</span></td>";
            } else {
                $status =
                    "<td class='symbol-detect c'><span class='user-status block'>blocked</span></td>";
            }

            $date = date_create($row['created_at']);
            $date = date_format($date, 'd.m.Y');

            $notes = '';
            if ($row['self_registered'] == 1) {
                $notes =
                    "<br><span class='user-status self_registered' style='width: auto;'>self_registered</span>";
            }

            $file_list_string .=
                '<tr>' .
                "<td class='symbol-detect' data-earch='{$row['fname']} {$row['lname']}' data-sort='{$row['lname']}'>
                <div class='d-flex justify-content-between'><p><b>{$row['fname']} {$row['lname']}</b></p> <p>{$row['id']}</p></div>
                <p>{$row['address']}</p>
                <div class='d-flex justify-content-between'>
                    <p>{$row['zip']} {$row['city']}</p>
                    <i data-address='{$row['fname']} {$row['lname']}-{$row['address']}-{$row['zip']} {$row['city']}'
                        class='fas fa-copy copy-address-clipboard' style='cursor: pointer; color: #aaa; font-size: 12px;'
                        data-toggle='tooltip' title='Copy address'></i>
                </div>
                <br>
                <p class='d-flex align-items-center justify-content-between'>{$row['email']}
                    <i class='fas fa-copy email_copy' data-toggle='tooltip' title='Copy Email'
                      style='color: #aaa; flex-wrap: nowrap; cursor: pointer; font-size: 12px;'
                      data-email='{$row['email']}'></i>
                </p>
            </td>" .
                "<td class='symbol-detect c'>
                <p>{$row['tel_1']}</p>
                <p>{$row['tel_2']}</p>
            </td>" .
                "<td class='symbol-detect c' data-sort='{$row['created_at']}'>
                <p>$date</p>
                <p>$notes</p>
            </td>" .
                "<td class='symbol-detect c' data-sort='{$row['kyc']}'>
                $kyc
            </td>" .
                $status;
            if ($role != 3 && $role != 5 && $role != 6) {
                $file_list_string .=
                    "<td class='symbol-detect c'>" . $row['tName'] . '</td>';
            }
            if ($role != 5 && $role != 6) {
                $file_list_string .=
                    "<td class='symbol-detect c'>" .
                    $row['oName'] .
                    "</td>".
                    "<td class='symbol-detect c'>" .
                ($row['token'] > 0
                    ? number_format($row['token'], 0, ',', '.')
                    : '') .
                '</td>' . "<td class='symbol-detect edit c'><span>" .
                    ($row['spec_price'] > 0 ? number_format($row['spec_price'], 2, ',', '.') : '') .
                    "</span> <i class='fa fa-edit editSpecPrice' data-id='{$row['id']}' data-price='{$row['spec_price']}' data-bs-target='#editSpecPrice' data-bs-toggle='modal'></i></td>
                ";
            } else {
                $file_list_string .=
                "<td class='symbol-detect c'>" .
                ($row['token'] > 0
                    ? number_format($row['token'], 0, ',', '.')
                    : '') .
                '</td>';
            }
            $file_list_string .="<td class='symbol-detect c'>" .
                ($row['total'] > 0
                    ? number_format($row['total'], 2, ',', '.')
                    : '') .
                '</td>'.
                "<td class='symbol-detect c'>" .
                ($row['payed'] > 0
                    ? ($row['payed'] == $row['total'] ? "<span class='user-status active'>payed</span>" : number_format($row['payed'], 2, ',', '.'))
                    : ($row['total'] > 0 ? "<span class='user-status block'>pending</span>" : "")) .
                '</td>';

            if ($role != 5 && $role < 20) {
                $file_list_string .=
                    "<td class='c'>$addingHref $setPassword $addingHrefRemove $linkInvest " .
                    ($role >= 1 && $role < 7 ? $loginClient : '') .
                    '</td></tr>';
            } else {
                $file_list_string .= "<td class='c'>$addingHref $addingHrefRemove $linkInvest $loginClient</td></tr>";
            }
        }

        return $file_list_string;
    }

    // Get All Client Data
    public function getAllClientData()
    {
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $creator = $loginUser_->id;
        $kycs = [];
        $query = "SELECT * FROM uploads";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $kycs[$row['user_id']][] = $row;
        }
        $query = "SELECT * FROM investment WHERE payed = 1 AND re_payed != 1 AND bank_loc = 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $invest = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invest[$row['user_id']][] = $row;
        }
        if ($role == '1') {
            $query =
                'SELECT u.*, i.total, i.payed, i.token, teams.name AS tName, office.name AS oName, country.symbol FROM user AS u LEFT JOIN (SELECT t.total, t.token, p.payed, t.user_id FROM (SELECT SUM(investment) AS total, SUM(size) AS token, user_id FROM investment WHERE status = 1 AND re_payed != 1 GROUP BY user_id) AS t LEFT JOIN (SELECT SUM(investment) AS payed, user_id FROM investment WHERE payed = 1 AND re_payed != 1 AND status = 1 GROUP BY user_id) AS p ON t.user_id = p.user_id) AS i ON u.id = i.user_id LEFT JOIN teams ON u.team = teams.id LEFT JOIN office ON u.office = office.id LEFT JOIN country ON u.country = country.id WHERE role = 4 AND u.id != 7 AND u.id != 58 AND u.id != 36703 AND i.payed > 0';
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        }
        $i = 0;

        $clients = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clients[$row['id']]['user'] = $row;
            $clients[$row['id']]['kyc'] = $kycs[$row['id']] ?? [];
            $clients[$row['id']]['invest'] = $invest[$row['id']] ?? [];
        }

        return $clients;
    }

    // Get all Price
    public function getAllPrice()
    {
        $isLoader = '';
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $query = 'SELECT * FROM price ORDER BY date DESC';
        $file_list_string = '';
        $i = 0;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $i++;

            $addingHref =
                "<a href='#' data-id='" .
                $row['id'] .
                "' id='editPrice' data-bs-toggle='modal' title='Edit Price' data-bs-target='#createPriceModal'><i class='fas fa-edit'></i></a>";

            $addingHrefRemove =
                "
                <a href='#' data-id='" .
                $row['id'] .
                "' id='removePrice' data-bs-toggle='modal' title='Delete Price' data-bs-target='#removePriceModal'><i class='fas fa-trash'></i></a>";
            $date = date_create($row['date']);
            $file_list_string .=
                '<tr>' .
                "<td class='symbol-detect c'>" .
                date_format($date, 'd.m.Y') .
                '</td>' .
                "<td class='symbol-detect c'>" .
                number_format($row['price'], 2, '.', '') .
                '</td>' .
                "<td class='c'>" .
                $addingHref .
                ' ' .
                $addingHrefRemove .
                '</td>' .
                '</tr>';
        }
        return $file_list_string;
    }

    // Get all Phase
    public function getAllPhase()
    {
        $isLoader = '';
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $query = 'SELECT * FROM phase';
        $file_list_string = '';
        $i = 0;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $pre = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            // $addingHref = "<a href='#' data-id='".$row['id']."' id='editPrice' data-bs-toggle='modal' title='Edit Price' data-bs-target='#createPriceModal'><i class='fas fa-edit'></i></a>";

            // $addingHrefRemove = "
            //     <a href='#' data-id='".$row['id']."' id='removePrice' data-bs-toggle='modal' title='Delete Price' data-bs-target='#removePriceModal'><i class='fas fa-trash'></i></a>";
            // $date=date_create($row['date']);
            $state = "<span class='phase-status ready'>waiting</span>";
            if ($row['status'] == 1) {
                $state = "<span class='phase-status active'>active</span>";
            } elseif ($row['status'] == 2) {
                $state = "<span class='phase-status complete'>completed</span>";
            }
            $action = '';
            if ($row['status'] == 0) {
                if ($i == 1) {
                    $action = "<button class='btn btn-sm btn-primary updatePhase' data-id='{$row['id']}' data-status='1' data-prev-id=''>activate</button>";
                } elseif ($pre['status'] == 1) {
                    $action = "<button class='btn btn-sm btn-primary updatePhase' data-id='{$row['id']}' data-status='1' data-prev-id='{$pre['id']}'>activate</button>";
                }
            } else {
                if ($i == $stmt->rowCount() && $row['status'] == 1) {
                    $action = "<button class='btn btn-sm btn-success updatePhase' data-id='{$row['id']}' data-status='2' data-prev-id=''>complete</button>";
                }
            }
            $file_list_string .=
                '<tr>' .
                "<td class='c'>" .
                $row['phase'] .
                '</td>' .
                "<td class='c'>" .
                $row['period'] .
                '</td>' .
                "<td class='c'>" .
                number_format($row['price'], 2) .
                ' €</td>' .
                "<td class='c'>" .
                $row['token'] .
                ' Mio</td>' .
                "<td class='c p-0'> $state </td>" .
                "<td class='c p-1'> $action </td>" .
                '</tr>';
            $pre = $row;
        }
        return $file_list_string;
    }

    public function getPhaseList()
    {
        $query = 'SELECT * FROM phase';
        $i = 0;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $list = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            $list[] = $row;
        }
        return $list;
    }

    public function updatePeriod($id, $period)
    {
        $stmt = $this->db->prepare(
            'UPDATE phase SET period = :period WHERE id=:id'
        );
        $stmt->bindparam(':period', $period);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;
    }

    public function updateSpecPrice($id, $price)
    {
        $stmt = $this->db->prepare(
            'UPDATE user SET spec_price = :price WHERE id=:id'
        );
        $stmt->bindparam(':price', $price);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;
    }

    public function getActivePhase()
    {
        $query = 'SELECT * FROM phase WHERE status = 1';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data = $row;
        }
        return $data;
    }

    public function updatePhase($id, $status)
    {
        $stmt = $this->db->prepare(
            'UPDATE phase SET status = :status WHERE id=:id'
        );
        $stmt->bindparam(':status', $status);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;
    }

    // Create user
    public function createUser(
        $userType,
        $email,
        $userFname,
        $userLname,
        $gender,
        $title,
        $team,
        $office,
        $userAddress,
        $userZip,
        $userCity,
        $userBirth,
        $userPlace,
        $userCountry,
        $userTelOne,
        $userTelTwo,
        $userNotes,
        $password = '',
        $specPrice,
        $self_registered = 0,
        $team2 = null
    ) {
        $now = new DateTime();
        $createdate = $now->format('Y-m-d H:i:s');
        $status = 0;
        $creator = '';
        if ($password == '') {
            $loginUser_ = json_decode($_COOKIE['user']);
            $creator = $loginUser_->id;
            $password = $this->randomPassword();
            $status = 1;
        }
        try {
            $stmt = $this->db->prepare('SELECT * FROM user WHERE email=:email');
            $stmt->bindparam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return false;
            }

            $stmt = $this->db->prepare(
                "INSERT INTO user(email, role, team, team_2, office, password, creator, fname, lname, gender, title, address, zip, city, birthday, place, country, tel_1, tel_2, notes, status, created_at, spec_price, self_registered) 
                        VALUES(:email, :role, :team, :team_2, :office, :password, :creator, :fname, :lname, :gender, :title, :address, :zip, :city, :birthday, :place, :country, :tel_1, :tel_2, :notes, :status, :created_at, :spec_price, :self_registered)"
            );
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':role', $userType);
            $stmt->bindparam(':team', $team);
            $stmt->bindparam(':team_2', $team2);
            $stmt->bindparam(':office', $office);
            $stmt->bindparam(':fname', $userFname);
            $stmt->bindparam(':lname', $userLname);
            $stmt->bindparam(':gender', $gender);
            $stmt->bindparam(':title', $title);
            $stmt->bindparam(':address', $userAddress);
            $stmt->bindparam(':zip', $userZip);
            $stmt->bindparam(':city', $userCity);
            $stmt->bindparam(':birthday', $userBirth);
            $stmt->bindparam(':place', $userPlace);
            $stmt->bindparam(':country', $userCountry);
            $stmt->bindparam(':tel_1', $userTelOne);
            $stmt->bindparam(':tel_2', $userTelTwo);
            $stmt->bindparam(':notes', $userNotes);
            $stmt->bindparam(':password', $password);
            $stmt->bindparam(':creator', $creator);
            $stmt->bindparam(':created_at', $createdate);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':spec_price', $specPrice);
            $stmt->bindparam(':self_registered', $self_registered);
            $stmt->execute();
            $lastId = $this->db->lastInsertId();

            // if(!empty($project)) {
            //     $userPrice = str_replace(".", "", subject);
            //     $stmt = $this->db->prepare("INSERT INTO investment(project, investment, price, size, created_at, user_id) VALUES(:project, :investment, :price, :size, :created_at, :user_id)");
            //     $stmt->bindparam(":project",$project);
            //     $stmt->bindparam(":investment",$userInvest);
            //     $stmt->bindparam(":price",$userPrice);
            //     $stmt->bindparam(":size", $userSize);
            //     $stmt->bindparam(":created_at", $createdate);
            //     $stmt->bindparam(":user_id",$lastId);
            //     $stmt->execute();
            // }
            return [$lastId, $password];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Insert Investment.
    public function insertInvest(
        $userInvest,
        $project,
        $userPrice,
        $userSize,
        $payMethod,
        $tracking_service,
        $tracking_id,
        $shipping = "1",
        $user_id,
        $status = "1",
        $agreement = null,
        $z_id = null
    ) {
        $now = new DateTime();
        $createdate = $now->format('Y-m-d H:i:s');
        $userSize = number_format($userSize, 2, '.', '');
        $userInvest = number_format($userInvest, 2, '.', '');
        try {
            $stmt = $this->db->prepare(
                'INSERT INTO investment(project, investment, price, size, payment_method, created_at, user_id, tracking_service, tracking_id, status, shipping, _agreement, z_id) VALUES(:project, :investment, :price, :size, :payment_method, :created_at, :user_id, :tracking_service, :tracking_id, :status, :shipping, :agreement, :z_id)'
            );
            $stmt->bindparam(':project', $project);
            $stmt->bindparam(':investment', $userInvest);
            $stmt->bindparam(':price', $userPrice);
            $stmt->bindparam(':size', $userSize);
            $stmt->bindparam(':payment_method', $payMethod);
            $stmt->bindparam(':created_at', $createdate);
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':tracking_service', $tracking_service);
            $stmt->bindparam(':tracking_id', $tracking_id);
            $stmt->bindparam(':shipping', $shipping);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':agreement', $agreement);
            $stmt->bindparam(':z_id', $z_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Insert Investment temp.
    public function insertInvestTemp(
        $userInvest,
        $project,
        $userPrice,
        $userSize,
        $user_id
    ) {
        $now = new DateTime();
        $createdate = $now->format('Y-m-d H:i:s');
        $userSize = number_format($userSize, 2, '.', '');
        try {
            $stmt = $this->db->prepare(
                'INSERT INTO z_tmp_investment(project, investment, price, size, user_id, created_at) VALUES(:project, :investment, :price, :size, :user_id, :created_at)'
            );
            $stmt->bindparam(':project', $project);
            $stmt->bindparam(':investment', $userInvest);
            $stmt->bindparam(':price', $userPrice);
            $stmt->bindparam(':size', $userSize);
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':created_at', $createdate);
            $stmt->execute();
            $query = "SELECT id FROM z_tmp_investment ORDER BY id DESC LIMIT 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['id'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function moveToInvestment($id, $agreement)
    {
        $query = "SELECT * FROM z_tmp_investment WHERE id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam(":id", $id);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->insertInvest(
                $row['investment'],
                $row['project'],
                $row['price'],
                $row['size'],
                '',
                '',
                '',
                '1',
                $row['user_id'],
                '3',
                $agreement,
                $id
            );

            $query = "DELETE FROM z_tmp_investment WHERE id=:id";
            $stmt = $this->db->prepare($query);
            $stmt->bindparam(":id", $id);
            $stmt->execute();
        }
    }

    // update user entry
    public function updateUser(
        // $userType,
        $email,
        $userFname,
        $userLname,
        $gender,
        $title,
        $team,
        $office,
        $userAddress,
        $userZip,
        $userCity,
        $userBirth,
        $userPlace,
        $userCountry,
        $userTelOne,
        $userTelTwo,
        $userNotes,
        $id,
        $specPrice,
        $team2 = null
    ) {
        $stmt = $this->db->prepare(
            'UPDATE user SET email=:email, fname=:fname, lname=:lname, gender=:gender, title=:title, ' .
                ($team == '' ? '' : 'team=:team, ') .
                ' team_2=:team_2, office=:office, address=:address, zip=:zip, city=:city, birthday=:birth, place=:place, country=:country, tel_1=:tel_1, tel_2=:tel_2, notes=:notes, spec_price=:spec_price WHERE id=:id'
        );
        // $stmt->bindparam(':role', $userType);
        $stmt->bindparam(':fname', $userFname);
        $stmt->bindparam(':lname', $userLname);
        $stmt->bindparam(':gender', $gender);
        $stmt->bindparam(':title', $title);
        if ($team != '') {
            $stmt->bindparam(':team', $team);
        }
        $stmt->bindparam(':team_2', $team2);
        $stmt->bindparam(':office', $office);
        $stmt->bindparam(':email', $email);
        $stmt->bindparam(':address', $userAddress);
        $stmt->bindparam(':zip', $userZip);
        $stmt->bindparam(':city', $userCity);
        $stmt->bindparam(':birth', $userBirth);
        $stmt->bindparam(':place', $userPlace);
        $stmt->bindparam(':country', $userCountry);
        $stmt->bindparam(':tel_1', $userTelOne);
        $stmt->bindparam(':tel_2', $userTelTwo);
        $stmt->bindparam(':notes', $userNotes);
        $stmt->bindparam(':spec_price', $specPrice);
        $stmt->bindparam(':id', $id);
        $stmt->execute();

        return true;
    }

    // Update user password
    public function updatePass($id, $pass)
    {
        $stmt = $this->db->prepare(
            'UPDATE user SET password = :pass WHERE id=:id'
        );
        $stmt->bindparam(':pass', $pass);
        $stmt->bindparam(':id', $id);
        $stmt->execute();

        return true;
    }

    // Update file password
    public function setSetting($field, $value)
    {
        $stmt = $this->db->prepare(
            'UPDATE settings SET value=:value WHERE field=:field'
        );
        $stmt->bindparam(':field', $field);
        $stmt->bindparam(':value', $value);
        $stmt->execute();
        return true;
    }

    // Get setting by key
    public function getSetting($field)
    {
        $stmt = $this->db->prepare('SELECT * FROM settings WHERE field=:field');
        $stmt->bindparam(':field', $field);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['value'];
        }
        return false;
    }

    public function getPublicFiles($pass)
    {
        $files = [];
        if ($pass) {
            $stmt = $this->db->prepare(
                "SELECT * FROM files WHERE public='1' ORDER BY file_name"
            );
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $files[] = $row;
                }
            }
            return $files;
        }
        return false;
    }

    // Check user email address

    public function checkEmail($email)
    {
        $stmt = $this->db->prepare(
            'SELECT user.*, teams.name AS tName FROM user LEFT JOIN teams ON teams.id = user.team WHERE email = :email'
        );
        $stmt->bindparam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $team = $row['tName'];
            }
            return ['isExist' => true, 'team' => $team];
        } else {
            return ['isExist' => false];
        }
    }

    // update investment
    public function updateInvestment(
        $invest_id,
        $investment,
        $price,
        $size,
        $payMethod,
        $shipping,
        $payed,
        $payed_date,
        $bank_loc,
        $prevPayed,
        $re_payed,
        $re_payed_date,
        $prevRePayed,
        $re_cashed,
        $re_cashed_date,
        $prevReCashed,
        $payed_email,
        $wallet,
        $status,
        $tracking_service,
        $tracking_id
    ) {
        $sql =
            'UPDATE investment SET investment=:investment, price=:price, size=:size, payment_method=:payment_method, payed=:payed, bank_loc=:bank_loc, re_payed=:re_payed, re_cashed=:re_cashed, payed_email=:payed_email, wallet=:wallet, status=:status, shipping=:shipping WHERE id= :id';
        if (isset($tracking_service) && isset($tracking_id) && $tracking_service != "" && $tracking_id != "") {
            $sql =
                'UPDATE investment SET investment=:investment, price=:price, size=:size, payment_method=:payment_method, payed=:payed, bank_loc=:bank_loc, re_payed=:re_payed, re_cashed=:re_cashed, payed_email=:payed_email, wallet=:wallet, status=:status, shipping=:shipping, tracking_service=:tracking_service, tracking_id=:tracking_id, tracking_date=:tracking_date WHERE id= :id';
        }
        $size = number_format($size, 2, '.', '');
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $invest_id);
        $stmt->bindparam(':investment', $investment);
        $stmt->bindparam(':price', $price);
        $stmt->bindparam(':size', $size);
        $stmt->bindparam(':payment_method', $payMethod);
        $stmt->bindparam(':shipping', $shipping);
        $stmt->bindparam(':payed', $payed);
        $stmt->bindparam(':bank_loc', $bank_loc);
        $stmt->bindparam(':re_payed', $re_payed);
        $stmt->bindparam(':re_cashed', $re_cashed);
        $stmt->bindparam(':payed_email', $payed_email);
        $stmt->bindparam(':wallet', $wallet);
        $stmt->bindparam(':status', $status);
        if (isset($tracking_service) && isset($tracking_id) && $tracking_service != "" && $tracking_id != "") {
            $tracking_date = date('Y-m-d h:i:s');
            $stmt->bindparam(':tracking_service', $tracking_service);
            $stmt->bindparam(':tracking_id', $tracking_id);
            $stmt->bindparam(':tracking_date', $tracking_date);
        }
        $stmt->execute();
        if ($payed == 1 && $prevPayed != 1) {
            // $sql =
            //     'SELECT * FROM investment WHERE payed=1 ORDER BY cert_num DESC LIMIT 1';
            // $stmt = $this->db->prepare($sql);
            // $stmt->execute();
            // $count = 25000;
            // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //     $count = $row['cert_num'];
            // }

            $sql =
                "UPDATE investment SET payed_date=:payed_date, cert_num=:cert_num WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            // $payed_date = date('Y-m-d h:i:s');
            $stmt->bindparam(':payed_date', $payed_date);
            $stmt->bindparam(':cert_num', $invest_id);
            $stmt->bindparam(':id', $invest_id);
            $stmt->execute();
        }
        if ($re_payed == 1 && $prevRePayed != 1) {

            $sql =
                "UPDATE investment SET re_payed_date=:re_payed_date, cert_num=NULL WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            // $re_payed_date = date('Y-m-d h:i:s');
            $stmt->bindparam(':re_payed_date', $re_payed_date);
            $stmt->bindparam(':id', $invest_id);
            $stmt->execute();
        }
        if ($re_cashed == 1 && $prevReCashed != 1) {

            $sql =
                "UPDATE investment SET re_cashed_date=:re_cashed_date WHERE id=:id";
            $stmt = $this->db->prepare($sql);
            // $re_cashed_date = date('Y-m-d');
            $stmt->bindparam(':re_cashed_date', $re_cashed_date);
            $stmt->bindparam(':id', $invest_id);
            $stmt->execute();
        }
    }

    // update tracking data
    public function updateTrackingData(
        $invest_id,
        $tracking_service,
        $tracking_id
    ) {
        $sql =
            'UPDATE investment SET tracking_service=:tracking_service, tracking_id=:tracking_id, tracking_date=:tracking_date WHERE id= :id';
        $stmt = $this->db->prepare($sql);
        $tracking_date = date('Y-m-d h:i:s');
        $stmt->bindparam(':id', $invest_id);
        $stmt->bindparam(':tracking_service', $tracking_service);
        $stmt->bindparam(':tracking_id', $tracking_id);
        $stmt->bindparam(':tracking_date', $tracking_date);
        $stmt->execute();
    }

    // remove user entry
    public function deactiveUser($id, $status)
    {
        if ($status == 'block') {
            $stmt = $this->db->prepare(
                "UPDATE user SET status='0' WHERE id= :id"
            );
        } else {
            $stmt = $this->db->prepare(
                "UPDATE user SET status='1' WHERE id= :id"
            );
        }
        $stmt->bindparam(':id', $id);
        $stmt->execute();
    }

    public function setPublicFile($id, $status)
    {
        $stmt = $this->db->prepare(
            'UPDATE files SET public=:public WHERE id=:id'
        );
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':public', $status);
        $stmt->execute();
    }

    // Get User details with id
    public function getUserDetailsWithId($id)
    {
        $isinResult = [];
        $queryAddDomain =
            'SELECT id, email, role, team, fname, gender, title, lname, team_2, address, zip, city, birthday, place, country, tel_1, tel_2, notes, spec_price, office FROM user WHERE id = :id';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $isinResult[] = $row;
        }

        $queryAddDomain = 'SELECT * FROM investment WHERE user_id = :id';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $isinResult[] = $row;
        }
        return $isinResult;
    }

    // Get User details with hash
    public function getUserByHash(
        $hash = '',
        $date = 'created_at',
        $flag = true
    ) {
        if ($hash == '') {
            return false;
        }
        $sql = 'SELECT * FROM user WHERE passhash = :passhash';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':passhash', $hash);
        $stmt->execute();
        $user = false;
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if ($flag) {
            $created = strtotime($user[$date]);
            $now = strtotime(date('Y-m-d h:m:s'));

            if ($now - $created > 3600) {
                return false;
            }
        }
        return $user;
    }

    public function getUserById($id)
    {
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $user = false;
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // $created = strtotime($user['last_login']);
        // $now = strtotime(date('Y-m-d h:m:s'));

        // if(($now - $created) > 7200) {
        //     return false;
        // }
        return $user;
    }

    public function resetUserHash($id)
    {
        $sql = 'UPDATE user SET passhash=NULL WHERE id=:id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        return true;
    }

    // Get All Price List
    public function getPriceList($userId = "")
    {
        $isinResult = [];
        $queryAddDomain = 'SELECT * FROM price ORDER BY date';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // $date = date_create($row["date"]);
            // $row["date"] = date_format($date,"d.m.Y");
            $isinResult[] = $row;
        }

        if($userId != "") {
            $sql = "SELECT * FROM price_clients WHERE user_id = :user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":user_id", $userId);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $isinResult[] = $row;
            }
        }
        return $isinResult;
    }

    // Get Price details by id
    public function getPriceById($id)
    {
        $isinResult = [];
        $queryAddDomain = 'SELECT * FROM price WHERE id = :id';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $isinResult[] = $row;
        }

        return $isinResult;
    }

    // Get Invest details with id
    public function getInvestDetails($id)
    {
        $isinResult = '';
        $queryAddDomain =
            'SELECT investment.*, user.fname, user.lname, user.email, project.name AS pname  FROM investment LEFT JOIN project ON project.id = investment.project LEFT JOIN user ON investment.user_id = user.id WHERE investment.id = :id';
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $isinResult = $row;
        }
        return $isinResult;
    }

    public function getInvestDateError()
    {
        $query = "SELECT * FROM investment WHERE payed = 1 AND (payed_date = '' OR payed_date IS NULL)";
        $stmt = $this->db->prepare($query);
        // $stmt->bindparam(':id', $id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>{$row['id']}</p>";
        }
    }

    public function getInvestmentData($user_id = "")
    {
        $invest = [];
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        // if($role == 1) {
        //     $invest[] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "=SUM(O4:O1000)", "", "=SUM(Q4:Q1000)", "", "=SUM(S4:S1000)", "", "=SUM(U4:U1000)", "" , "=SUM(W4:W1000)"];
        //     $invest[] = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
        //     $invest[] = ['Kundennummer', 'Name', 'Nachname', 'E-Mail', 'Stückzahl', 'Kurs', 'Betrag', 'Zeichnungsschein', 'Gegenzeichnung', 'Ü-trager', 'Geldeingang', 'Zertifikat erhalten', "Investment ID", "Adobe ID", "Payed", "Datum",  "Cashed", "Datum", "Re-Payed", "Datum", "Re-Cashed", "Datum", "offen"];
        // } else {
            $invest[] = ["", "", "", "", "", "", "", "", "", "", "=SUM(K4:K1000)", "", "=SUM(M4:M1000)", "", "=SUM(O4:O1000)", "", "=SUM(Q4:Q1000)", "", "=SUM(S4:S1000)"];
            $invest[] = ["", "", "", "", "", "", "", "", "", "", "",  "", "", "", "", "", "", ""];
            $invest[] = ['ID', 'Name', 'Nachname', 'E-Mail', 'Stückzahl', 'Kurs', 'Betrag', 'Zeichnungsschein', "Investment ID", "Adobe ID", "Payed", "Datum", "Cashed", "Datum", "Re-Payed", "Datum", "Re-Cashed", "Datum", "offen", "BL"];
        // }
        $query =
            'SELECT investment.id, investment.bank_loc, investment.z_id, investment.user_id AS Kundennummer, user.fname AS name, user.lname AS nachname, user.email AS Email, investment.size AS Stückzahl, investment.price AS Kurs, investment.investment AS Betrag, investment.created_at AS Zeichnungsschein, investment.created_at AS Gegenzeichnung, investment.payed_date, investment.payed, investment.status, investment.cashed, investment.cashed_date, investment.re_payed, investment.re_payed_date, investment.re_cashed, investment.re_cashed_date FROM investment LEFT JOIN project ON project.id = investment.project LEFT JOIN user ON investment.user_id = user.id WHERE (investment.user_id != 7 AND investment.user_id != 58 AND investment.user_id != 36703)  AND investment.status != 2';
        
        if($user_id != "") {
            $query .= " AND investment.user_id=$user_id";
        }
        if($role == 20) {
            // $query .= " AND investment.status != 2";
        }
        $query .= " ORDER BY investment.created_at asc";
        $stmt = $this->db->prepare($query);
        // $stmt->bindparam(':id', $id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if($role == 1 ) {
                $row["Kundennummer"] = "GWM-{$row['Kundennummer']}";
            } else if($role == 20) {
                $row["Kundennummer"] = "{$row['Kundennummer']}";
            }
            $date1 = date_create($row['Zeichnungsschein']);
            $date1 = date_format($date1, 'd.m.Y');
            $date2 = "";
            if(isset($row['payed_date'])) {
                $date2 = date_create($row['payed_date']);
                $date2 = date_format($date2, 'd.m.Y');
            }
            if(isset($row['cashed_date']) && $row['cashed_date'] != "0000-00-00"){
                $cashed_date = date_create($row['cashed_date']);
                $cashed_date = date_format($cashed_date, 'd.m.Y');
            }
            if(isset($row['re_payed_date']) && $row['re_payed_date'] != "0000-00-00"){
                $re_payed_date = date_create($row['re_payed_date']);
                $re_payed_date = date_format($re_payed_date, 'd.m.Y');
            }
            if(isset($row['re_cashed_date']) && $row['re_cashed_date'] != "0000-00-00"){
                $re_cashed_date = date_create($row['re_cashed_date']);
                $re_cashed_date = date_format($re_cashed_date, 'd.m.Y');
            }
            // if($role == 1) {
            //     $invest[] = [
            //         $row['Kundennummer'],
            //         $row['name'],
            //         $row['nachname'], 
            //         $row['Email'], 
            //         $row['Stückzahl'], 
            //         $row['Kurs'], 
            //         $row['Betrag'], 
            //         $date1,
            //         '',
            //         '',
            //         $date2,
            //         '',
            //         $row['id'], 
            //         $row['z_id'] > 0 ? $row['z_id'] : "",
            //         $row["payed"] == 1 ? $row['Betrag'] : "", 
            //         $row["payed"] == 1 ? $date2 : "", 
            //         $row["cashed"] == 1 ? $row['Betrag'] : "", 
            //         $row["cashed"] == 1 ? $cashed_date : "",
            //         $row["re_payed"] == 1 ? $row['Betrag'] : "", 
            //         $row["re_payed"] == 1 ? $re_payed_date : "",
            //         $row["re_cashed"] == 1 ? $row['Betrag'] : "", 
            //         $row["re_cashed"] == 1 ? $re_cashed_date : "",
            //         ($row["payed"] == 1 ? "" : $row['Betrag'])
            //     ];
            // } else if ($role == 20) {
                $invest[] = [
                    $row['Kundennummer'],
                    $row['name'],
                    $row['nachname'], 
                    $row['Email'], 
                    $row['Stückzahl'], 
                    $row['Kurs'], 
                    $row['Betrag'], 
                    $date1,
                    $row['id'], 
                    $row['z_id'] > 0 ? $row['z_id'] : "", 
                    $row["payed"] == 1 ? $row['Betrag'] : "", 
                    $row["payed"] == 1 ? $date2 : "", 
                    $row["cashed"] == 1 ? $row['Betrag'] : "", 
                    $row["cashed"] == 1 ? $cashed_date : "",
                    $row["re_payed"] == 1 ? $row['Betrag'] : "", 
                    $row["re_payed"] == 1 ? $re_payed_date : "",
                    $row["re_cashed"] == 1 ? $row['Betrag'] : "", 
                    $row["re_cashed"] == 1 ? $re_cashed_date : "",
                    $row["payed"] == 1 ? "" : $row['Betrag'],
                    $row['bank_loc'] == 1 ? "K" : "",
                ];
            // }
        }
        return $invest;
    }

    public function randomPassword()
    {
        $password_string =
            '!@#$%*abcdefghjkmnprstuwxyzABCDEFGHKLMNPQRTUWXYZ236789';
        $newPass = substr(str_shuffle($password_string), 0, 12);

        return $newPass; //turn the array into a string
    }

    // Send selectbox details
    public function getSelectBox(
        $table,
        $field = 'name',
        $order = '',
        $type = 'option'
    ) {
        if ($order == '') {
            $order = $field;
        }
        $i = 0;
        $query = "SELECT id, $field FROM " . $table . " ORDER BY $order";
        $file_list_string = '';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($type == 'option') {
                if ($i == 0) {
                    $file_list_string .=
                        "<option value='" .
                        $row['id'] .
                        "'>" .
                        $row[$field] .
                        '</option>';
                } else {
                    $file_list_string .=
                        "<option value='" .
                        $row['id'] .
                        "'>" .
                        $row[$field] .
                        '</option>';
                }
            } elseif ($type == 'radio') {
                if ($i == 0) {
                    $file_list_string .= "<div class='form-group'><input class='mb-4 mr-3' type='radio' name='office' id='radio{$row['id']}' value='{$row['id']}'{$row[$field]} style='margin-right: 15px;' checked required /> <label for='radio{$row['id']}' style='font-size: 13px; top:-0.25em !important; position: absolute;'>{$row[$field]}</label></div>";
                } else {
                    $file_list_string .= "<div class='form-group'><input class='mb-4 mr-3' type='radio' name='office' id='radio{$row['id']}' value='{$row['id']}'{$row[$field]} style='margin-right: 15px;' /> <label for='radio{$row['id']}' style='font-size: 13px; top:-0.25em !important; position: absolute;'>{$row[$field]}</label></div>";
                }
            }
            $i++;
        }
        return $file_list_string;
    }

    // Send selectbox details
    public function getCountryOption($lang)
    {
        $i = 0;
        $file_list_string = '';
        $query = "SELECT id, $lang FROM country LIMIT 4";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $file_list_string .=
                "<option value='" .
                $row['id'] .
                "'>" .
                $row[$lang] .
                '</option>';
            $i++;
        }
        $file_list_string .=
            "<option value='' disabled>-------------------------</option>";
        $query = "SELECT id, $lang FROM country WHERE id > 4 ORDER BY $lang";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $file_list_string .=
                "<option value='" .
                $row['id'] .
                "'>" .
                $row[$lang] .
                '</option>';
            $i++;
        }

        return $file_list_string;
    }

    public function getAllClientOption()
    {
        $i = 0;
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $teamMember = false;
        if ($role == 3) {
            $teamMember = $this->getAllTeamMember($loginUser_->id);
        }
        $where = '';
        if ($teamMember) {
            $placeholders = str_repeat('?, ', count($teamMember) - 1) . '?';
            $where = " AND id IN($placeholders) ";
        }
        $query = "SELECT * FROM user WHERE role = 4$where ORDER BY lname";
        $file_list_string = '';
        $stmt = $this->db->prepare($query);
        $stmt->execute($teamMember ? $teamMember : null);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($i == 0) {
                $file_list_string .=
                    "<option selected value='" .
                    $row['id'] .
                    "'>{$row['lname']} {$row['fname']} >{$row['email']}<</option>";
            } else {
                $file_list_string .=
                    "<option value='" .
                    $row['id'] .
                    "'>{$row['lname']} {$row['fname']} >{$row['email']}<</option>";
            }
            $i++;
        }
        return $file_list_string;
    }
    // Get All invest
    // public function getAllInvest($pass) {
    //     $wholeData = $
    // }

    // Create Price
    public function createPrice($project_id, $date, $price)
    {
        $now = new DateTime();
        $createdate = $now->format('Y-m-d H:i:s');
        $loginUser_ = json_decode($_COOKIE['user']);
        $creator = $loginUser_->id;
        $password = $this->randomPassword();
        try {
            $stmt = $this->db->prepare(
                "INSERT INTO price(project_id, date, price) 
                        VALUES(:project_id, :date, :price)"
            );
            $stmt->bindparam(':project_id', $project_id);
            $stmt->bindparam(':date', $date);
            $stmt->bindparam(':price', $price);
            $stmt->execute();
            $lastId = $this->db->lastInsertId();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Update Price entry
    public function updatePrice($id, $project_id, $date, $price)
    {
        $stmt = $this->db->prepare(
            'UPDATE price SET project_id=:project_id, date=:date, price=:price WHERE id=:id'
        );
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':project_id', $project_id);
        $stmt->bindparam(':date', $date);
        $stmt->bindparam(':price', $price);
        $stmt->execute();

        return true;
    }

    // Remove Price entry
    public function deletePrice($id)
    {
        $stmt = $this->db->prepare('DELETE FROM price WHERE id = :id');
        $stmt->bindparam(':id', $id);
        $stmt->execute();

        return true;
    }

    // Save upladed file name.
    public function upsertFile(
        $user_id,
        $file_name = '',
        $file_type,
        $valid = 0
    ) {
        try {
            $stmt = $this->db->prepare(
                'SELECT * FROM uploads WHERE user_id = :user_id AND file_type = :file_type'
            );
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':file_type', $file_type);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if (
                        file_exists('../clients/uploads/' . $row['file_name'])
                    ) {
                        if ($file_name == '') {
                            rename('../clients/uploads/' . $row['file_name'], '../clients/deleted/' . $row['file_name']);
                        }
                    }
                }

                if ($file_name == '') {
                    $stmt = $this->db->prepare(
                        'DELETE FROM uploads WHERE user_id = :user_id AND file_type = :file_type'
                    );
                    $stmt->bindparam(':user_id', $user_id);
                    $stmt->bindparam(':file_type', $file_type);
                } else {
                    $stmt = $this->db->prepare(
                        'UPDATE uploads SET file_name = :file_name, valid = :valid WHERE user_id = :user_id AND file_type = :file_type'
                    );
                    $stmt->bindparam(':user_id', $user_id);
                    $stmt->bindparam(':file_name', $file_name);
                    $stmt->bindparam(':file_type', $file_type);
                    $stmt->bindparam(':valid', $valid);
                }
                $stmt->execute();
            } else {
                if ($file_name == '') {
                } else {
                    $stmt = $this->db->prepare(
                        'INSERT INTO uploads(user_id, file_name, file_type, valid) VALUES(:user_id, :file_name, :file_type, :valid)'
                    );
                    $stmt->bindparam(':user_id', $user_id);
                    $stmt->bindparam(':file_name', $file_name);
                    $stmt->bindparam(':file_type', $file_type);
                    $stmt->bindparam(':valid', $valid);
                    $stmt->execute();
                }
            }

            $stmt = $this->db->prepare(
                'SELECT * FROM uploads WHERE user_id = :user_id'
            );
            $stmt->bindparam(':user_id', $user_id);
            $stmt->execute();

            $kyc = 0;

            if ($stmt->rowCount() < 3) {
                $kyc = 0;
            } else {
                $kyc = 1;
                $stmt = $this->db->prepare(
                    'SELECT * FROM uploads WHERE user_id = :user_id AND valid = :valid'
                );
                $stmt->bindparam(':user_id', $user_id);
                $valid = 1;
                $stmt->bindparam(':valid', $valid);
                $stmt->execute();
                $valid_count = $stmt->rowCount();
                $valid = 2;
                $stmt->bindparam(':valid', $valid);
                $stmt->execute();
                $inValid_count = $stmt->rowCount();
                // $valid = 0;
                // $stmt->bindparam(":valid", $valid);
                // $stmt->execute();
                // $file_count = $stmt->rowCount();
                if ($valid_count == 3) {
                    $kyc = 2;
                } elseif ($inValid_count == 0) {
                    $kyc = 1;
                } else {
                    $kyc = 0;
                }
            }
            $sql = 'UPDATE user SET kyc = :kyc WHERE id = :user_id';
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':kyc', $kyc);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Get file info.
    public function getFileInfo($user_id, $file_type)
    {
        try {
            $stmt = $this->db->prepare(
                'SELECT * FROM uploads WHERE user_id = :user_id AND file_type = :file_type'
            );
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':file_type', $file_type);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Save upladed DOCS/FORMS file name.
    public function saveFile($file_name)
    {
        try {
            $stmt = $this->db->prepare(
                'DELETE FROM files WHERE file_name = :file_name'
            );
            $stmt->bindparam(':file_name', $file_name);
            $stmt->execute();

            $stmt = $this->db->prepare(
                'INSERT INTO files(file_name) VALUES(:file_name)'
            );
            $stmt->bindparam(':file_name', $file_name);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Check file is exist.
    public function isExist($file_name)
    {
        try {
            $stmt = $this->db->prepare(
                'SELECT * FROM files WHERE file_name = :file_name'
            );
            $stmt->bindparam(':file_name', $file_name);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getFileByName($file_name)
    {
        try {
            $stmt = $this->db->prepare(
                "SELECT * FROM files WHERE file_name like '%$file_name%'"
            );
            // $stmt->bindparam(":file_name",$file_name);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Get all FORMS/DOCS
    public function getAllfiles()
    {
        $loginUser_ = json_decode($_COOKIE['user']);
        $role = $loginUser_->role;
        $query = 'SELECT * FROM files ORDER BY upload_date DESC';
        $file_list_string = '';
        $i = 0;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $i++;
            $downloadHref =
                "<a download title='Download File' href='files/" .
                $row['file_name'] .
                "' data-id='" .
                $row['id'] .
                "'><i class='fas fa-download ml-2'></i></a>";
            $sendHref =
                "<a href='#' class='send-file-btn' data-id='" .
                $row['id'] .
                "' data-bs-toggle='modal' data-bs-target='#sendFileModal' data-file_name='" .
                $row['file_name'] .
                "' title='Send File'><i class='fas fa-envelope ml-2'></i></a>";
            $addingHrefRemove =
                "<a href='#' data-id='" .
                $row['id'] .
                "' data-file_name='" .
                $row['file_name'] .
                "' id='removeFile' data-bs-toggle='modal' data-bs-target='#removeFileModal' title='Delete File'><i class='fas fa-trash ml-2'></i></a>";
            $setPublic =
                "<a href='#' data-id='" .
                $row['id'] .
                "' data-status='{$row['public']}' data-file_name='" .
                $row['file_name'] .
                "' id='setPublicFile' data-bs-toggle='modal' data-bs-target='#setPublicFileModal' title='" .
                ($row['public'] == 0 ? 'Activate' : 'Disable') .
                " Public View'><i class='fas fa-" .
                ($row['public'] == 0 ? 'globe' : 'times-circle') .
                "'></i></a>";

            $date = date_create($row['upload_date']);
            $file_list_string .=
                '<tr>' .
                "<td class='symbol-detect c'>" .
                $row['file_name'] .
                '</td>' .
                "<td class='symbol-detect c'>" .
                date_format($date, 'd.m.Y H:i') .
                '</td>' .
                "<td class='symbol-detect c'><i class='fas fa-" .
                ($row['public'] == 0 ? 'times-circle' : 'globe') .
                "'></i></td>" .
                "<td class='c'>" .
                ($role != 5 && $role != 6 && $role != 3 ? $setPublic : '') .
                $downloadHref .
                ($role != 5 ? '' : '') .
                ($role == 1 || $role == 2 ? $addingHrefRemove : '') .
                '</td>' .
                '</tr>';
        }
        return $file_list_string;
    }

    // Remove Price entry
    public function deleteFile($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM files WHERE id = :id');
        $stmt->bindparam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (file_exists('../backoffice/files/' . $row['file_name'])) {
                unlink('../backoffice/files/' . $row['file_name']);
            }
        }

        $stmt = $this->db->prepare('DELETE FROM files WHERE id = :id');
        $stmt->bindparam(':id', $id);
        $stmt->execute();

        return true;
    }

    // Add wallet address for user
    public function addWalletAddress($id, $wallet)
    {
        $stmt = $this->db->prepare('SELECT * FROM investment WHERE id = :id');
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!isset($row['wallet']) || $row['wallet'] == '') {
                $stmt = $this->db->prepare(
                    'UPDATE investment SET wallet = :wallet WHERE id = :id'
                );
                $stmt->bindparam(':id', $id);
                $stmt->bindparam(':wallet', $wallet);
                $stmt->execute();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function createTeamtable()
    {
        $stmt = $this->db
            ->prepare("CREATE TABLE teams (id int(11) NOT NULL AUTO_INCREMENT,
            name varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
            PRIMARY KEY (id) USING BTREE) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;");
        $stmt->execute();
        $stmt = $this->db->prepare("INSERT INTO teams VALUES (1, 'Team 1');
            INSERT INTO teams VALUES (2, 'Team 2');");
        $stmt->execute();

        echo 'true';
    }

    public function getTrackingServices()
    {
        try {
            $tracking_service_options = "";
            $tracking_service_urls = [];
            $tracking_services = [];
            $stmt = $this->db->prepare("SELECT * FROM tracking_service");
            // $stmt->bindparam(":file_name",$file_name);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tracking_service_options .= "<Option value='".$row['id']."'>{$row['name']}</Option>";
                $tracking_services[$row['id']] = $row['name'];
                $tracking_service_urls[$row['id']] = $row['url'];
            } 
            return ['tracking_service_options' => $tracking_service_options, 'tracking_services'=>$tracking_services, 'tracking_service_urls'=>$tracking_service_urls];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>