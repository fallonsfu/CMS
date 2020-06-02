<?php 
if(isset($_GET['edit_user'])) {
	$user_id = $_GET['edit_user'];
	$query = "SELECT * FROM users WHERE user_id = $user_id ";
    $select_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_users)) {
        $username = $row['username'];
        $db_password = $row['password'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
	}
}
if(isset($_POST['edit_user'])) {

    $firstname = $_POST['firstname'];    
    $lastname = $_POST['lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    if(!empty($password)) { 
    	if($password != $db_password) {
    		$hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    	}

		$query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', user_role = '$user_role', username = '$username', user_email = '$user_email', password = '$hash_password' WHERE user_id = $user_id ";
		$edit_user_query = mysqli_query($connection, $query);
		confirmQuery($edit_user_query);

		echo "User Updated " . "<a href='users.php'>View User</a>";
    } else {
    	echo "Password Cannot Be Empty ";
    }
}
 ?>

<form action='', method='post', enctype='multipart/form-data'>
	<div class='form-group'>
		<label for='author'>Firstname</label>
		<input type="text" value="<?php echo $firstname; ?>" class='form-control' name="firstname">
	</div>
	<div class='form-group'>
		<label for='post_status'>Lastname</label>
		<input type="text" value="<?php echo $lastname; ?>" class='form-control' name="lastname">
	</div>
	<div class='form-group'>
		<label for='post_category'>User Role</label>
		<select name='user_role' id=''>
			<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
			<?php 
			if($user_role == 'admin') {
				echo "<option value='subscriber'>subscriber</option>";
			} else {
				echo "<option value='admin'>admin</option>";
			}
			 ?>
		</select>
	</div>
	<div class='form-group'>
		<label for='post_tags'>Username</label>
		<input type="text" value="<?php echo $username; ?>" class='form-control' name="username">
	</div>
	<div class='form-group'>
		<label for='post_content'>Email</label>
		<input type="email" value="<?php echo $user_email; ?>" class='form-control' name="user_email">
	</div>
	<div class='form-group'>
		<label for='post_content'>Password</label>
		<input type="password" value="" class='form-control' name="password", autocomplete="off">
	</div>
	<div class='form-group'>
		<input type="submit" class='btn btn-primary' name="edit_user" value='Edit User'>
	</div>
</form>