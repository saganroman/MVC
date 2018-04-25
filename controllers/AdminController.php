<?php
include_once ROOT . '/models/Admin.php';

class AdminController
{
    public function __construct()
    {
        session_start();

    }

     public function actionIndex()
    {
        $usersList = Admin::getUsersList();
        if (!isset($_SESSION['userid'])) {
            require_once ROOT . '/views/admin/head.php';
            require_once ROOT . '/views/admin/index.php' ;
            require_once ROOT . '/views/admin/footer.php' ;
        } elseif ($_SESSION['usertype'] == 1) {
            require_once ROOT . '/views/admin/head.php';
            require_once ROOT . '/views/admin/menu.php';
            require_once ROOT . '/views/admin/welcomeAdmin.php' ;
            require_once ROOT . '/views/admin/footer.php' ;
        } elseif
        ($_SESSION['usertype'] == 0) {
            require_once ROOT . '/views/admin/head.php';
            require_once ROOT . '/views/admin/menu.php';
            require_once ROOT . '/views/admin/welcomeUser.php' ;
            require_once ROOT . '/views/admin/footer.php' ;
        }
        return true;
    }

    public function actionSignin()
    {
        $name = $_POST['username'];
        $pass = $_POST['pass'];
        $user = Admin::getUser($name);
        if ($user and ($user[0]['pass']) == $pass) {
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['usertype'] = $user[0]['type'];
            $usersList = Admin::getUsersList();
            if ($user[0]['type'] == 1) {
                 require_once ROOT . '/views/admin/menu.php';
                 require_once ROOT . '/views/admin/welcomeAdmin.php';
            } elseif ($user[0]['type'] == 0) {
                 require_once ROOT . '/views/admin/menu.php';
                 require_once ROOT . '/views/admin/welcomeUser.php';

            }
        } else {
            print 'error';
        }
    }

    public function actionSignout()
    {
        session_destroy();
        unset($_SESSION['userid']);
        unset($_SESSION['usertype']);
         require_once ROOT . '/views/admin/index.php';
    }

    public function actionHome()
    {
        $usersList = Admin::getUsersList();
        if ($_SESSION['usertype'] == 1) {
            require_once ROOT .'/views/admin/welcomeAdmin.php';

        } elseif ($_SESSION['usertype'] == 0) {
             require_once ROOT . '/views/admin/welcomeUser.php';
        }
    }

    public function actionMessages()
    {
        $messagesList = Admin::getMessagesList();
        if ($_SESSION['usertype'] == 1) {

             require_once ROOT . '/views/admin/messagesAdmin.php';
        } elseif ($_SESSION['usertype'] == 0) {

             require_once ROOT . '/views/admin/messagesUser.php';
        }
    }

    public function actionAddmes()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $priority = $_POST['priority'];
        Admin::addMessage($title, $content, $priority);
        $this->actionMessages();

    }

    public function actionEdit()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $priority = $_POST['priority'];
        $res = Admin::editMessage($id, $title, $content, $priority);
        $this->actionMessages();
    }

    public function actionDestroy()
    {
        $id = $_POST['id'];
        Admin::destroyMessage($id);
        $this->actionMessages();
    }


}