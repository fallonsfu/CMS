<!DOCTYPE html>
<html lang="en">

<?php include "includes/admin_header.php"; ?>

<?php 
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username' ";
    $profile_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $password = $row['password'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
    }
}

if(isset($_POST['update_profile'])) {

    $firstname = $_POST['firstname'];    
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $query = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', username = '$username', user_email = '$user_email', password = '$password' WHERE username = '$username' ";
    $update_profile_query = mysqli_query($connection, $query);
    confirmQuery($update_profile_query);
}
 ?>

<body>

    <div id="wrapper">

    <?php include "includes/admin_nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Author</small>
                        </h1>
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
                            <input type="submit" class='btn btn-primary' name="update_profile" value='Update Profile'>
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>
