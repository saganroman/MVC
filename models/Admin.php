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

	public static function getMessagesList()
	{
		$db = Db::getConnection();
		$messagesList = array();
		$result = $db->query('SELECT * FROM messages ORDER BY id ');
		$i = 0;
		while ($row = $result->fetch()) {
			$messagesList[$i]['id'] = $row['id'];
			$messagesList[$i]['title'] = $row['title'];
			$messagesList[$i]['content'] = $row['content'];
			$messagesList[$i]['priority'] = $row['priority'];
			$i++;
		}
		return $messagesList;
	}

	public static function addMessage($title, $content, $priority)
	{
		$db = Db::getConnection();
		$result = $db->query("INSERT INTO messages (title, content, priority) VALUES ('" . $title . "','" . $content . "','" . $priority . "')");
		return $result;
	}

	public static function editMessage($id, $title, $content, $priority)
	{
		$db = Db::getConnection();
		$result = $db->query("UPDATE messages SET title = '" . $title . "', content = '" . $content . "', priority = '" . $priority . "' WHERE id = '" . $id . "'");
		return $result;
	}

	public static function destroyMessage($id)
	{
		$db = Db::getConnection();
		$result = $db->query('DELETE FROM messages WHERE id =' . '"' . $id . '"');
		return $result;
	}

}