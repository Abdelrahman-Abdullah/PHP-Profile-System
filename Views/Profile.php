<?php include "../partial/profile-header.php" ?>

<?php if (isset($_SESSION['id'])) :?>
<div class="container">
    <div class="childs child-1">

        <img src="../public/images/pexels-photo-771742.webp">
        <ul>
            <li>
                <h4>
                    About
                </h4>

            </li>
            <span>
                    <?= $_SESSION['userProfileData']->about ?? "No Description There" ?>
                </span>

        </ul>
    <form action="../includes/logout.php" method="post" >
        <button name="logout" > Logout </button>
    </form>
    </div>
    <div class=" childs child-2">
        <div class="child-2-1">
            <h2>
                <?= $_SESSION['userProfileData']->title ?? "No Title There"?>
            </h2>
            <p>
                <?= $_SESSION['userProfileData']->description ?? "No Description There"?>
            </p>
        </div>
        <div class="child-2-2">
            <h2>Posts</h2>
            <?php if (! empty($_SESSION['userProfilePosts'])):
            foreach ($_SESSION['userProfilePosts'] as $post) :?>
            <div class="posts">
                <h2>
                    <?= $post->title ?>
                </h2>
                <p>
                    <?= $post->body ?>

                </p>
                <p>
                    <?= $post->date ?>
                </p>
            </div>
            <?php endforeach; else: ?>
            <div class="posts">
                <h2>
                    This User Doesn't Have Any Post Yet
                </h2>

            </div>
            <?php endif;?>
        </div>
    </div>
</div>
<?php else: header("location: index.php"); endif;?>

<?php include "../partial/profile-footer.php" ?>
