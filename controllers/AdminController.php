<?php
include_once ROOT . '/models/Admin.php';

class AdminController
{
    public function actionIndex()
    {
        session_start();
        if (!isset($_SESSION['userid'])) {
            require_once ROOT . '/views/admin/head.php';
            require_once(ROOT . '/views/admin/index.php');
        } elseif ($_SESSION['usertype'] == 1) {
            $usersList = Admin::getUsersList();
            require_once ROOT . '/views/admin/head.php';
            require_once(ROOT . '/views/admin/welcomeAdmin.php');
        } elseif ($_SESSION['usertype'] == 0) {
            $usersList = Admin::getUsersList();
            require_once ROOT . '/views/admin/head.php';
            require_once(ROOT . '/views/admin/welcomeUser.php');
        }
        return true;
    }

    public function actionSignin()
    {
        $name = $_POST['username'];
        $pass = $_POST['pass'];
        $user = Admin::getUser($name);
        if ($user and ($user[0]['pass']) == $pass) {
            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['usertype'] = $user[0]['type'];
            if ($user[0]['type'] == 1) {
                $usersList = Admin::getUsersList();
                echo include_once ROOT . '/views/admin/welcomeAdmin.php';
            } elseif ($user[0]['type'] == 0) {
                $usersList = Admin::getUsersList();
                echo include_once ROOT . '/views/admin/welcomeUser.php';

            }
        }
        else  print 'error';
    }

    public function actionSignout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['userid']);
        unset($_SESSION['usertype']);
        echo include_once ROOT . '/views/admin/index.php';
    }
    public function actionMessages()
    {
        $messagesList = Admin::getMessagesList();
        echo include_once ROOT . '/views/admin/head.php';
        echo include_once ROOT . '/views/admin/messages.php';
    }


}