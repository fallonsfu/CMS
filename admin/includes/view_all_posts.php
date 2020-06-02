<?php 
include "modal_delete.php";

if(isset($_POST['checkBoxList'])) {
    foreach($_POST['checkBoxList'] as $postId) {
       $option = $_POST['bulk_options'];
       switch ($option) {

           case 'published':
               $query = "UPDATE posts SET post_status='$option' WHERE post_id = $postId ";
               $update_published = mysqli_query($connection, $query);
               confirmQuery($update_published);
               break;  

            case 'draft':
               $query = "UPDATE posts SET post_status='$option' WHERE post_id = $postId ";
               $update_draft = mysqli_query($connection, $query);
               confirmQuery($update_draft);
               break; 

            case 'delete':
               $query = "DELETE FROM posts WHERE post_id = $postId ";
               $delete = mysqli_query($connection, $query);
               confirmQuery($delete);
               break; 

            case 'clone':

                $query = "SELECT * FROM posts WHERE post_id = $postId ";
                $select_posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($select_posts)) {
                    $post_author = $row['post_author'];
                    $post_user = $row['post_user'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                }

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_user, post_date, post_image, post_content, post_tags, post_status) ";
                $query .= "VALUES ($post_category_id, '$post_title', '$post_author', '$post_user', now(), '$post_image', '$post_content', '$post_tags', '$post_status') ";

               $clone_query = mysqli_query($connection, $query);
               confirmQuery($clone_query);
               break;    
           default:             
               break;
       }
    }
}
?>

<form method="post">
<table class="table table-bordered table-hover">
    <div id="bulkOptionContainer" class='col-xs-4'>
        <select class="form-control" name="bulk_options">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="clone">Clone</option>
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class='col-xs-4'>
        <input type="submit" name="submit" class="btn btn-success" value="Apply" >
        <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div>
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>User</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Views</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT posts.post_id, posts.post_author, posts.post_user, posts.post_title, posts.post_category_id, posts.post_status, ";
        $query .= "posts.post_image, posts.post_tags, posts.post_comment_count, posts.post_date, posts.post_views, ";
        $query .= "categories.cat_id, categories.cat_title FROM posts LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.post_id DESC ";

        $select_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_user = $row['post_user'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
            $post_views = $row['post_views'];
            $cat_title = $row['cat_title'];

            echo "<tr>";
            ?>
            <td><input type='checkbox' class='checkbox' name='checkBoxList[]' value='<?php echo $post_id; ?>'></td>
            <?php
            echo "<td>$post_id</td>";

            if(!empty($post_author)) {
                echo "<td>$post_author</td>";
            } elseif (!empty(isset($post_user))) {
                echo "<td>$post_user</td>";
            }

            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

            echo "<td>$cat_title</td>";
            echo "<td>$post_status</td>";
            echo "<td><img width='100' src='../imgs/$post_image' alt='image'></td>";
            echo "<td>$post_tags</td>";

            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
            $comment_query = mysqli_query($connection, $query);
            $comment_count = mysqli_num_rows($comment_query);

            echo "<td><a href='post_comments.php?id=$post_id'>$comment_count</a></td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
            // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href='posts.php?delete=$post_id'>Delete</a></td>";
            echo "<td><a rel='$post_id' href='javascript: void(0)' class='delete_link'>Delete</a></td>";
            echo "<td><a href='posts.php?reset=$post_id'>$post_views</a></td>";
            echo "</tr>";
        }
        
        if(isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = $delete_id ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }

        if(isset($_GET['reset'])) {
            $reset_id = $_GET['reset'];
            $query = "UPDATE posts SET post_views = 0 WHERE post_id = $reset_id ";
            $reset_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
        
        ?>
        <script >
            $(document).ready(function() {
                $(".delete_link").on('click', function() {
                    var id = $(this).attr("rel");
                    var delete_url = "posts.php?delete="+ id +" ";
                    $(".modal_delete").attr("href", delete_url);
                    $("#myModal").modal('show');
                })
            })
        </script>

    </tbody>
</table>
</form>