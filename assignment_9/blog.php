<?php 
include('db.php');
$pageTitle = 'Blog';
include('includes/header.php');
?>
<!-- contact section starts  -->

<section class="container" id="posts" style="margin-top:70px">
    <div class="posts-container">
    <?php
        $sql = "SELECT post.*,users.name FROM post left join users ON post.user_id = users.id ORDER BY post.id DESC";
        $result = mysqli_query($linkDB, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {?>
        <div class="post">
            <img src="assets/post-img/<?php echo $row['photo']; ?>" alt="" class="image">
            <div class="date">
                <i class="far fa-clock"></i>
                <span><?php echo date('Y-m-d',strtotime($row['create_at'])) ?></span>
            </div>
            <h3 class="title"><?php echo $row['title']; ?></h3>
            <p class="text"><?php echo $row['description']; ?></p>
            <div class="links">
                <a href="#" class="user">
                    <i class="far fa-user"></i>
                    <span>by <?php echo $row['name']; ?></span>
                </a>
            </div>
        </div>
        <?php } }else{?>
            <h3>No Post Found!</h3>
        <?php }?>
    </div>
</section>
<!-- contact section ends -->

<?php include('includes/footer.php');?>