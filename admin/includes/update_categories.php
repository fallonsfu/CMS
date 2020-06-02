<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label> 
        <?php 
            $cat_id = $_GET['edit'];
            $query = "SELECT cat_title FROM categories WHERE cat_id = '$cat_id' ";
            $edit_categories = mysqli_query($connection, $query);
            $cat_title = mysqli_fetch_assoc($edit_categories)['cat_title'];
            ?>
            <input class="form-control" type="text" value="<?php echo $cat_title; ?>" name="cat_title">
        <?php 
        // Update category query
        if(isset($_POST['update'])) {
            $cat_id_update = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '$cat_id_update' WHERE cat_id = '$cat_id' ";
            $update_query = mysqli_query($connection, $query);
            if(!$update_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update", value="Update Category">
    </div>
</form>