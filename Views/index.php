<?php include "../partial/header.php" ?>
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" action="../includes/signup.php" >
					<label for="chk" aria-hidden="true">Sign up</label>
                    <div style="color: red; text-align: center">
                        <?php
                        echo $_SESSION['Uerr'] ?? NULL;
                        echo $_SESSION['Qmsg'] ?? NULL;
                        ?>
                    </div>
					<input type="text" name="username" placeholder="User name" >
					<input type="text" name="email" placeholder="Email"  value="">

					<input type="password" name="password" placeholder="Password" >
					<button name="submit">Sign up</button>
				</form>
			</div>

			<div class="login">
				<form method="post" action="../includes/signin.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" >
					<input type="password" name="password" placeholder="Password" >
					<button name="submit">Login</button>
				</form>
			</div>
</div>

<?php include "../partial/footer.php" ?>
