<?php 

class Database
{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	private $dbh;
	private $error;
	private $stmt;

	public function __construct()
	{
		// Set DSN
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

		// Set Options
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		// PDO Instance
		try
		{

			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);

		}catch (PDOException $e)
		{
			$this->error = $e->getMessage();
		}
	}
	// End Constructor

	public function query($q)
	{
		$this->stmt = $this->dbh->prepare($q);
	}

	// Bind Function
	public function bind($param, $value, $type = NULL)
	{
		if (is_null($type)) 
		{
			switch (true) 
			{
				case is_int($value):
					$type = PDO::PARAM_INT;
				break;

				case is_bool($value):
					$type = PDO::PARAM_BOOL;
				break;

				case is_null($value):
					$type = PDO::PARAM_NULL;
				break;
				
				default:
					$type = PDO::PARAM_STR;
				break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	// Get All Results
	public function getAll()
	{
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	// Get One Result
	public function getSingle()
	{
		$this->stmt->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	// End Get One Result


}