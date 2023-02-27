<?php

class Session {

    static public function sessionStart() {
        session_start();
    }

    static public function userNotLogged() {
        if(!isset($_SESSION['user_email'])) {
            header("Location: login.php");
        }
    }

    static public function userLogged() {
        if(isset($_SESSION['user_email'])) {
            header("Location: index.php");
        }
    }

    static public function createSession($email) {
        $_SESSION['user_email'] = $email;
    }

    static public function logout() {
        echo "<a href='?action=logout'>Logout</a>";

        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if(strpos($url, 'action')) {
            if($_GET['action'] == 'logout') {
                session_unset();
                session_destroy();

                header("Location: index.php");
            }
        }
    }

}