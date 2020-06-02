<?php 
if(isset($_POST['create_user'])) {

    $firstname = $_POST['firstname'];    
    $lastname = $_POST['lastname'];
    $user_role = $_POST['user_role'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO users(firstname, lastname, user_role, username, user_email, password) ";
    $query .= "VALUES ('$firstname', '$lastname', '$user_role', '$username', '$user_email', '$password') ";

    $add_user_query = mysqli_query($connection, $query);
    confirmQuery($add_user_query);

    echo "User Created: " . "<a href='users.php'>View Users</a>";
}

 ?>

<form action='', method='post', enctype='multipart/form-data'>
	<div class='form-group'>
		<label for='author'>Firstname</label>
		<input type="text" class='form-control' name="firstname">
	</div>
	<div class='form-group'>
		<label for='post_status'>Lastname</label>
		<input type="text" class='form-control' name="lastname">
	</div>
	<div class='form-group'>
		<label for='post_category'>User Role</label>
		<select name='user_role' id=''>
			<option value="subscriber">Select Options</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		</select>
	</div>
	
<!-- 	<div class='form-group'>
		<label for='post_image'>Post Image</label>
		<input type="file" name="image">
	</div> -->
	<div class='form-group'>
		<label for='post_tags'>Username</label>
		<input type="text" class='form-control' name="username">
	</div>
	<div class='form-group'>
		<label for='post_content'>Email</label>
		<input type="email" class='form-control' name="user_email">
	</div>
	<div class='form-group'>
		<label for='post_content'>Password</label>
		<input type="password" class='form-control' name="password">
	</div>
	<div class='form-group'>
		<input type="submit" class='btn btn-primary' name="create_user" value='Add User'>
	</div>
</form>