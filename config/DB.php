<?php class DB
{
	//Database Handler class
	private static $_instance = null; //Holds an instance of the PDO class
	
	private $_pdo, $_query, $_error = false, $_results, $_resultsArray, $_lastId,$_count = 0, $_queryCount = 0; 
	public $num_rows = 0;
	
	private function __construct() //Private constructor to prevent direct creation of object
	{
		try
		{
			$this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
			$this->_pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET SESSION sql_mode = ''");
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}
		catch (PDOException $e)
		{
			die($e->getMessage());
		}
	}
	public static function getInstance()
	{//Create database connection only if it does not exist
		if (!isset(self::$_instance))
			self::$_instance = new DB();
		return self::$_instance;
	}
	
	public function query($sql, $params = [])
	{
		$this->_queryCount++;
		$this->_error = false;
		$fa = true;
		$qu = strtolower($sql);
		if (strpos($qu, 'delete', 0) === 0 || strpos($qu, 'update', 0) === 0 || strpos($qu, 'insert', 0) === 0)
			$fa = false;
		if ($this->_query = $this->_pdo->prepare($sql))
		{
			$x = 1;
			if (count($params))
				foreach ($params as $param)
				{
					$this->_query->bindValue($x, $param);
					$x++;
				}
			if ($this->_query->execute())
			{
				$this->num_rows = $this->_query->rowCount();
				$this->_lastId = $this->_pdo->lastInsertId();
			}
			else
			{
				$this->_error = true;
			}
		}
		return $this;
	}
    /*public function sendXML2Server($url,$rrr){
        $xml_data = trim($rrr);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }*/
    
    public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			if($stmt->rowCount() == 1)
			{
				if($userRow['userStatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['userSession'] = $userRow['userID'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}	
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}		
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
    
    
	public function endTransaction()
	{
		return $this->_pdo->commit();
	}
	public function cancelTransaction()
	{
		return $this->_pdo->rollBack();
	}
	public function findAll($table)
	{
		return $this->action('SELECT *', $table);
	}
	public function findById($id, $table)
	{
		return $this->action('SELECT *', $table, array(
			'id',
			'=',
			$id));
	}
	public function action($action, $table, $where = array())
	{
		$sql = "{$action} FROM {$table}";
		$value = '';
		if (count($where) === 3)
		{
			$operators = ['=', '>', '<', '>=', '<='];
			$field = $where[0];
			$operator = $where[1];
			$value = $where[2];
			if (in_array($operator, $operators))
				$sql .= " WHERE {$field} {$operator} ?";
		}
		if (!$this->query($sql, array($value))->error())
			return $this;
		return false;
	}
	public function get($table, $where)
	{
		return $this->action('SELECT *', $table, $where);
	}
	public function delete($table, $where)
	{
		return $this->action('DELETE', $table, $where);
	}
	public function deleteById($table, $id)
	{
		return $this->action('DELETE', $table, ['id', '=', $id]);
	}
	public function insert($table, $fields = array())
	{
		$keys = array_keys($fields);
		$values = str_repeat('?,', count($fields));
		$values = substr($values, 0, -1);
		$sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";
		if (!$this->query($sql, $fields)->error())
			return true;
		return false;
	}
	/*public function update($table, $where = [], $fields)
	{
		$set = '';
		$keys = array_keys($fields);
		foreach ($keys as $key)
			$set .= "{$key} = ?,";
		$set = rtrim($set, ',');
		$sql = "UPDATE {$table} SET {$set} WHERE $where[0] = ?";
		$stmt = $this->query($sql);
		$values = array_values($fields);
		$values[] = $where[1];
		return $stmt->execute($values);
	}*/
	public function update($table, $id, $fields)
	{
		$set = '';
		foreach ($fields as $name => $value)
			$set .= "{$name} = ?,";
		if ($set)
			$set = substr($set, 0, -1);
		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
		if ($this->query($sql, $fields))
			return true;
			else{
		return false;}
	}
	public function is_logged_in()
	{
		if(isset($_SESSION['uid']))
		{
			return true;
		}
	}
	public function is_logged_inadmin()
	{
		if(isset($_SESSION['uid']))
		{
			return true;
		}
	}
	public function redirect($url)
	{
		header("Location: $url");
	}
	public function affectedRows()
	{
	return $this->_count;
	}
	
	/*public function update($table, $id, $fields)
	{
	$set = '';
	foreach ($fields as $name => $value)
	$set .= "{$name} = ?,";
	if ($set)
	$set = substr($set, 0, -1);
	$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
	if (!$this->query($sql, $fields)->error())
	return true;
	return false;
	}*/
	
	public function begin()
	{
		return $this->_pdo->beginTransaction();
	}
	public function commit()
	{
		return $this->_pdo->commit();
	}
	public function rollBack()
	{
		return $this->_pdo->rollBack();
	}
	public function result($assoc = false)
	{
		$this->_results = $this->_query->fetchALL(PDO::FETCH_OBJ);
		$this->_resultsArray = json_decode(json_encode($this->_results), true);
		if ($assoc)
			return $this->_resultsArray;
		return $this->_results;
	}
	public function fetch()
	{
		return $this->_query->fetch();
	}
	public function num_rows()
	{
		return $this->_query->rowCount();
	}
	public function count()
	{
		return $this->num_rows;
	}
	public function error()
	{
		return $this->_error;
	}
	public function lastId()
	{
		return $this->_lastId;
	}
	public function getQueryCount()
	{
		return $this->_queryCount;
	}
}
