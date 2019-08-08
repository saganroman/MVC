<?php


class Admin
{
	public static function getUser($name)
	{
		$db = Db::getConnection();
		$result = $db->prepare('SELECT * FROM users WHERE username=' . '"' . $name . '"');
		$result->execute();
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$results = $result->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public static function getUsersList()
	{
		$db = Db::getConnection();
		$usersList = array();
		$result = $db->query('SELECT * FROM users ORDER BY id ');
		$i = 0;
		while ($row = $result->fetch()) {
			$usersList[$i]['id'] = $row['id'];
			$usersList[$i]['username'] = $row['username'];
			$usersList[$i]['type'] = $row['type'];
			$i++;
		}
		return $usersList;
	}
}
