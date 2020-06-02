<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/nav.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php 

                if(isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];
                    $post_author = $_GET['author'];
                }

                $query = "SELECT * FROM posts WHERE post_user = '$post_author' ";
                $select_all = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all)) {

                    $post_title = $row['post_title'];
                    $post_author = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                    ?>

                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="imgs/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>

                    <hr>
                
                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/scripts.js"></script>

</body>

</html>
