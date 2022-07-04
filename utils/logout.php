<?php
    if (isset($_COOKIE['login_pass'])) {
        unset($_COOKIE['login_pass']);
    }
    setcookie('login_pass', null, -1, '/');
    setcookie('user', null, -1, '/');
    header("location: ../");
?>