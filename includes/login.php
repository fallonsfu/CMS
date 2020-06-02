<?php include "db.php"; ?>
<?php session_start(); ?>

<?php 
if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$query = "SELECT * FROM users WHERE username = '$username' ";
	$select_user_query = mysqli_query($connection, $query);
	if(!$select_user_query) {
		die("Query Failed" . mysqli_error($connection));
	}

	while($row = mysqli_fetch_array($select_user_query)) {
		$user_id = $row['user_id'];
		$db_password = $row['password'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$user_role = $row['user_role'];
	}
	// $password = crypt($password, $db_password);
	
	if(password_verify($password, $db_password)) {
		$_SESSION['username'] = $username;
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['user_role'] = $user_role;
		header("Location: ../admin");
	} else {
		header("Location: ../index.php");
	}
}

 ?>