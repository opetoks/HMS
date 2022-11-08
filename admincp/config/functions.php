<?php 
function is_logged_in()
	{
		if(isset($_SESSION['uid']))
		{
			return true;
		}
	}
function userinfo($uid)
{
	global $db;
	$query = $db->query("SELECT * FROM users WHERE id=? LIMIT 1", [$uid]);
	$row = $query->fetch();
	return $row;
}

function protect($string)
{
	$protection = htmlspecialchars(trim($string));
	return $protection;
}
function isValidURL($url)
{
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

function isValidEmail($str)
{
	return filter_var($str, FILTER_VALIDATE_EMAIL);
}

function Info($uid,$value){
	global $db;
	$query = $db->prepare("SELECT $value FROM admins WHERE id=$uid LIMIT 1");
	$query->execute();
	$row = $query->fetch();
	return $row[$value];
}


?>