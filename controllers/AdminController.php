<?php
require_once ROOT . '/models/Admin.php';
require_once ROOT . '/utils/RequestUtils.php';
require_once ROOT . '/controllers/FeedbackController.php';

class AdminController
{
	const SIMPLE_USER_TYPE_ID = 2;
	const ADMIN_USER_TYPE_ID = 1;

	public function __construct()
	{
		session_start();
	}

	public function actionIndex()
	{
		$usersList = Admin::getUsersList();
		if (!isset($_SESSION['userid'])) {
			$this->loadLoginSection();
		} elseif ($_SESSION['usertype'] == self::ADMIN_USER_TYPE_ID) {
			$this->loadAdminSection();
		} elseif
		($_SESSION['usertype'] == self::SIMPLE_USER_TYPE_ID) {
			$this->loadUserSection();
		}
		return true;
	}

	public function actionSignin()
	{
		$name = PostRequest::getPropertyFromRequest('username');
		$pass = PostRequest::getPropertyFromRequest('pass');
		$user = Admin::getUser($name);
		if (($user) && ($user[0]['pass']) == $pass) {
			$userType = $user[0]['type'];
			$_SESSION['userid'] = $user[0]['id'];
			$_SESSION['usertype'] = $userType;
			require_once ROOT . '/views/common/menu.php';
			if ($userType == self::ADMIN_USER_TYPE_ID) {
				FeedbackController::actionShowAll();
			} elseif ($userType == self::SIMPLE_USER_TYPE_ID) {
				FeedbackController::actionShowFeedbackForm();
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
		require_once ROOT . '/views/common/index.php';
	}

	public function actionHome()
	{
		$usersList = Admin::getUsersList();
		if ($_SESSION['usertype'] == self::ADMIN_USER_TYPE_ID) {
			require_once ROOT . '/views/admin/welcomeAdmin.php';

		} elseif ($_SESSION['usertype'] == self::SIMPLE_USER_TYPE_ID) {
			require_once ROOT . '/views/user/thanksPage.php';
		}
	}

	public function loadAdminSection()
	{
		$usersList = Admin::getUsersList();
		require_once ROOT . '/views/common/head.php';
		require_once ROOT . '/views/common/menu.php';
		require_once ROOT . '/views/admin/welcomeAdmin.php';
		require_once ROOT . '/views/common/footer.php';
	}

	public function loadUserSection()
	{
		require_once ROOT . '/views/common/head.php';
		require_once ROOT . '/views/common/menu.php';
		require_once ROOT . '/views/user/feedbackForm.php';
		require_once ROOT . '/views/common/footer.php';
	}

	public function loadLoginSection()
	{
		require_once ROOT . '/views/common/head.php';
		require_once ROOT . '/views/common/index.php';
		require_once ROOT . '/views/common/footer.php';
	}
}
