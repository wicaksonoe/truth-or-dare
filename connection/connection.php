<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
	die('Direct Access Not Allowed.');
	exit();
}

class DB
{

	// private $driver = 'mysql';
	// private $host   = 'localhost';
	// private $port   = '3306';
	// private $dbname = 'truth_or_dare';
	// private $user   = 'phpmyadmin';
	// private $pass   = 'kosongin';

	private $driver = 'pgsql';
	private $host   = 'ec2-174-129-227-146.compute-1.amazonaws.com';
	private $port   = '5432';
	private $dbname = 'dckedj6lcch3kr';
	private $user   = 'gyilmwppgedjom';
	private $pass   = '92fcf0a6f61d94c270a0f31bbc948fc3378f89f6c971534c5ffa46faef58156b';

	protected $pdo	= NULL;

	public function __construct()
	{
		$dsn = "$this->driver:host=$this->host;port=$this->port;dbname=$this->dbname";
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];

		try {
			$this->pdo = new PDO($dsn, $this->user, $this->pass, $options);

			return $this->pdo;
		} catch (\PDOException $e) {
			echo 'Connection Error: '.$e->getMessage();
		}
	}

	public function close()
	{
		$this->pdo = NULL;
	}

	public function insert( int $kategori, string $konten )
	{
		$sql = "INSERT INTO permainan(kategori_permainan, konten_permainan) VALUES (:kategori, :konten)";

		$query = $this->pdo->prepare($sql);

		// binding value
		$query->bindValue(':kategori', $kategori);
		$query->bindValue(':konten', $konten);

		// execute SQL
		$query->execute();
	}

	public function getAll()
	{
		$sql = $this->pdo->query("SELECT * FROM permainan ORDER BY kategori_permainan ASC");

		$data_result = [];

		while ( $row = $sql->fetch(\PDO::FETCH_ASSOC) ) {
			$data_result[] = [
				'id' => $row['id'],
				'kategori_permainan' => $row['kategori_permainan'],
				'konten_permainan' => $row['konten_permainan'],
			];
		}

		return $data_result;
	}

	public function getForApi(int $mode)
	{
		$query = $this->pdo->prepare("SELECT kategori_permainan, konten_permainan FROM permainan WHERE kategori_permainan = :mode ORDER BY RAND() LIMIT 1");

		// binding value
		$query->bindValue(':mode', $mode);

		// execute SQL
		$query->execute();

		return $query->fetchObject();
	}

	public function edit(string $id)
	{
		$query = $this->pdo->prepare("SELECT * FROM permainan WHERE id = :id LIMIT 1");

		// binding value
		$query->bindValue(':id', $id);

		// execute SQL
		$query->execute();

		// return fetch result
		if ( $query->rowCount() == 1 ) {
			return $query->fetchObject();
		} else {
			return FALSE;
		}
	}

	public function delete(int $id)
	{
		$query = $this->pdo->prepare("DELETE FROM permainan WHERE id = :id");

		// binding value
		$query->bindValue(':id', $id);

		// execute SQL
		$query->execute();
	}

	public function update( int $id, int $kategori, string $konten )
	{
		$sql = "UPDATE permainan SET kategori_permainan = :kategori, konten_permainan = :konten WHERE id = :id";

		$query = $this->pdo->prepare($sql);

		// binding value
		$query->bindValue(':kategori', $kategori);
		$query->bindValue(':konten', $konten);
		$query->bindValue(':id', $id);

		// execute SQL
		$query->execute();
	}
}