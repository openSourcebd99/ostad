<?php 
include('db.php');
$pageTitle = 'Homepage';
include('includes/header.php');
?>
<!-- banner section starts  -->
<section class="banner" id="banner">
    <div class="content">
        <h3>Assignment 9</h3>
        <p>Personal blog using HTML, CSS, and PHP</p>
    </div>
</section>

<!-- banner section ends -->

<!-- posts section starts  -->

<section class="container" id="posts">
    <div class="posts-container">
        <?php
        $sql = "SELECT post.*,users.name FROM post left join users ON post.user_id = users.id ORDER BY post.id DESC limit 3";
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
            <a href="single-post.php?id=<?php echo $row['id']; ?>" style="background:#ccc; padding:5px;">Read More</a>
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

    <div class="sidebar">
        <div class="box">
            <h3 class="title">categories</h3>
            <div class="category">
            <?php
                $sql = "SELECT category FROM post";
                $output = mysqli_query($linkDB, $sql);
                if (mysqli_num_rows($output) > 0) {
                    while ($data = mysqli_fetch_assoc($output)) {?>
                <a href="#"> <?php echo $data['category']; ?></a>
                <?php } }else{?>
            <h3>No Post Found!</h3>
        <?php }?>
            </div>
        </div>
    </div>
</section>

<!-- posts section ends -->


<?php include('includes/footer.php');?>