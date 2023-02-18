<?php include "../partial/header.php" ?>
<?php if (isset($_SESSION['name'])) : ?>


 <div class="main" style="height: 300px;text-align: center; padding: 25px ">
  <div class="innerMain" >
   <h1
       style="color: white"> Welcome
    <span style="color:green;">

                <?php if (isset($_SESSION['name'])):echo $_SESSION['name']; endif;?>

            </span>
    Here We go !
   </h1>
   <form action="../includes/logout.php" method="post" >
    <button name="logut"> Logout </button>
   </form>

   <form action="../includes/profile.php" method="post" >
    <button name="logut"> Profile </button>
   </form>
  </div>
 </div>

<?php else: header("location: index.php"); endif; ?>
<?php include "../partial/footer.php" ?>

