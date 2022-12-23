

<?php
	session_start();

	$servername = "localhost";
	$username = "a10955pysy";
	$password = "qwertyuiop";
	$dbname = "school_dormitory_db";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
    echo "Connected successfully";

	$account = $_POST["account"];
	$password = password_hash($_POST["password"] ,PASSWORD_DEFAULT);
	$password = $_POST["password"];


	$sql = "SELECT name , type FROM User WHERE account ='" . $account . "' and password='" . $password . "' ";

	$result = $conn->query($sql);

	if ($result->num_rows > 0){
		$user_info =  $result->fetch_assoc();
		echo $user_info["name"];
		$_SESSION['permission'] = $user_info["type"];
		header("Location: ./mainpage.php");	
		die();
	}
	else{
		
		$_SESSION['permission'] = "Error";
		header("Location: ./index.php" , 301);
		die();
	}


	


?>
