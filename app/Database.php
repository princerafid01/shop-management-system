<?php 
// namespace App;
// /**
//  * Database class
//  */
// class Database
// {
// 	private $connection;
// 	function __construct($dsn,$user,$pass)
// 	{
// 		$this->connection = new \PDO($dsn,$user,$pass);
// 	}
// 	public function insert(string $table, array $data)
// 	{
// 		$placeholders =[];
// 		foreach ($data as $key ) {
// 			$placeholders[] = ":".$key;
// 		}
// 		$query = "INSERT INTO ".$table." (".implode(',',array_keys($data)).") VALUES (". implode(',',$placeholder).")";
// 		$stmt = $this->connection->prepare($query);

// 		foreach ($data as $key => $value) {
// 			$stmt->bindValue(".".$key, $value);
// 		}
// 		return $stmt->execute();
// 	}

	

// 	public function update()
// 	{
		
// 	}
// 	public function delete()
// 	{
		
// 	}
// 	public function select($table,$columns)
// 	{
// 		return $query = "SELECT ".$columns." FROM ".$table;
// 	}

// 	public function where($data=[])
// 	{
// 		if (is_array($data)) {
// 			$string =[];
// 			foreach ($data as $key => $value) {
// 				$string[] = " `{$key}` = :{$key}";
// 			}
// 			$strings = implode(',',$string);
// 			return $strings;
// 		}
// 	}

// 	public function edit($table,$columns = "*",$data = [])
// 	{
// 		$query  = $this->select($table,$columns);
// 		$query .= ' WHERE '.$this->where($data);
// 		$stmt = $this->connection->prepare($query);
// 		foreach ($data as $key => $value) {
// 			$stmt->bindValue(":".$key, $value);
// 		}
// 		// if ($stmt->execute()) {
// 			return $stmt;
// 		// }
// 	}
// }


// define('DSN', 'mysql:dbname=wellnuss;host:localhost');
// define('USERNAME', 'root');
// define('PASSWORD', '');
// $connection = new Database(DSN,USERNAME,PASSWORD);




// login Query
// session_start();
// require_once '../app/Database.php';
// if (isset($_POST['login'])) {
//     $message = [];
//     $email = trim($_POST['email']);
//     $password = trim($_POST['password']);
//     $user = $connection->edit('users',' id,name,email,password ',['email' => $email]);
//     $user->execute();

//     if ($user->rowCount() > 0) {
//         $data = $user->fetch();
//         if (password_verify($password, $data['password'])) {
//             $_SESSION['failed_email'] = null;
//             $_SESSION['error'] = null;
//             $_SESSION['logged_in'] = true;
//             $_SESSION['id'] = $data['id'];
//             $_SESSION['name'] = $data['name'];
//             header("Location: dashboard.php");

//         } else {
//             $_SESSION['failed_email'] = $email;
//             $_SESSION['error'] = "Password doesn't match.";
//         }
//     } else {
//         $_SESSION['failed_email'] = $email;
//         $_SESSION['error'] = "Email doesn't match.";
//     }
// }
?>