<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$firstname</td>";
            echo "<td>$lastname</td>";

            // $query = "SELECT cat_title FROM categories WHERE cat_id = '$post_category_id' ";
            // $category_query = mysqli_query($connection, $query);
            // $cat_title = mysqli_fetch_assoc($category_query)['cat_title'];

            echo "<td>$user_email</td>";
            echo "<td>$user_role</td>";

            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            // $post_query = mysqli_query($connection, $query);
            // while($row = mysqli_fetch_assoc($post_query)) {
            //     $post_title = $row['post_title'];
            //     echo "<td><a href='../post.php?p_id=$comment_post_id'>$post_title</a></td>";
            // }

            echo "<td><a href='users.php?to_admin=$user_id'>Admin</a></td>";
            echo "<td><a href='users.php?to_subscriber=$user_id'>Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }

        if(isset($_GET['to_admin'])) {
            $to_admin_id = $_GET['to_admin'];
            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $to_admin_id ";
            $admin_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }

        if(isset($_GET['to_subscriber'])) {
            $to_subscriber_id = $_GET['to_subscriber'];
            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $to_subscriber_id ";
            $subscriber_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }
        
        if(isset($_GET['delete'])) {
            echo "1 ";
            if(isset($_SESSION['user_role'])) {
                echo "2 ";
                if($_SESSION['user_role'] == "admin") {
                    echo "3 ";
                    $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);
                    $query = "DELETE FROM users WHERE user_id = '$delete_id' ";
                    $delete_query = mysqli_query($connection, $query);
                    header("Location: users.php");
                }
            }
        }
        
        ?>
    </tbody>
</table>