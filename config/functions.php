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

function SingleInfo($uid,$value){
	global $db;
	$query = $db->query("SELECT $value FROM users WHERE id=? LIMIT 1", [$uid]);
	$row = $query->fetch();
	return $row[$value];
}

function usercategory($uid){
	global $db;
	$query = $db->query("SELECT * FROM users WHERE id=? LIMIT 1",[$uid]);
	$row = $query->fetch();
	if($row['userType'] == 'Driver'){
		$usercategory = '1';
	}else{
		$usercategory = '2';
	}
	return $usercategory;
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

function info($uid, $value)
{
	global $db;
	$query = $db->query("SELECT $value FROM users WHERE id=?", [$uid]);
	$row = $query->fetch();
	return $row[$value];
}

function roomInfo($roomNo, $value)
{
	global $db;
	$query = $db->query("SELECT $value FROM Rooms WHERE roomNo = ?", [$roomNo]);
	$row = $query->fetch();
	return $row[$value];
}

function driverinfo($uid, $value)
{
	global $db;
	$query = $db->query("SELECT $value FROM drivers WHERE id=?", [$uid]);
	$row = $query->fetch();
	return $row[$value];
}
function AvailableRide(){
	global $db;
	$query = $db->query("SELECT * FROM ride_offers");
	$row = $query->fetch();
	return $row;
}

function login($email,$pw)
	{
		try
		{
		    global $db;
			$query = $db->query("SELECT * FROM users WHERE emailaddress=? AND password = ? LIMIT 1", [$email,$pw]);
			$userRow=$query->fetch(PDO::FETCH_ASSOC);//possible error
			if($query->rowCount() == 1)//if($query->num_rows() == 1);
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['password']==md5($pw))
					{
						$_SESSION['uid'] = $userRow['id'];
						return true;
					}
					else
					{
						$db->redirect('auth?error');//wrong password
						//exit;
					}
				}
				else
				{
					header("Location: account?inactive");//Account not activated or confirmed
					exit;
				}	
			}
			else
			{
				header("Location:auth?error1");//user don't exist. 
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

function get_verify_type($uid)
{
	global $db;

	$stmt = $db->query("SELECT * FROM users WHERE id = ? LIMIT 1", [$uid]);
	$userid = $stmt->fetch();
	//print_r($userid);
	if ($userid['vehicleRegistration'] == "1" && $userid['email_verified'] == "1" && $userid['phone_verified'] == "1")
	{
		$status = '1';
	}
	elseif ($userid['vehicleRegistration'] == "1" && $userid['email_verified'] == "1" && $userid['phone_verified'] == "0")
	{
		$status = '2';
	}
	elseif ($userid['vehicleRegistration'] == "1" && $userid['email_verified'] == "0" && $userid['phone_verified'] == "1")
	{
		$status = '3';
	}
	elseif ($userid['vehicleRegistration'] == "0" && $userid['email_verified'] == "1" && $userid['phone_verified'] == "1")
	{
		$status = '4';
	}
	elseif ($userid['vehicleRegistration'] == "1" && $userid['email_verified'] == "1" && $userid['phone_verified'] == "0")
	{
		$status = '5';
	}
	elseif ($userid['vehicleRegistration'] == "1" && $userid['email_verified'] == "0" && $userid['phone_verified'] == "0")
	{
		$status = '6';
	}
	elseif ($userid['vehicleRegistration'] == "0" && $userid['email_verified'] == "1" && $userid['phone_verified'] == "0")
	{
		$status = '7';
	}
	elseif ($userid['vehicleRegistration'] == "0" && $userid['email_verified'] == "0" && $userid['phone_verified'] == "1")
	{
		$status = '8';
	}
	elseif ($userid['vehicleRegistration'] == "0" && $userid['email_verified'] == "0" && $userid['phone_verified'] == "0")
	{
		$status = '9';
	}
	else
	{
		$status = '0';
	}
	return $status;
}


?>