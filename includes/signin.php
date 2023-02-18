<?php


if (isset($_POST['submit'])) {

    require "../controllers/SignUpController.php"; // This is Here  Because of Inheritance
    require "../controllers/SignInController.php";


    // Declare The Values
    $email = $_POST['email'];
    $password = $_POST['password'];

    $oldUser = new SignInController($email, $password);
    if (empty($oldUser->getErrMsg())) {

        require "../controllers/Connection.php";

        require "../classes/SignIn.php";


        $qurey = new SignIn(Connection::Connect());
        $qurey->checkUser(
            [
                "email" => $oldUser->getEmail(),
                "password" => md5($oldUser->getPassword())
            ]
        );

    } else {
        header("location: ../Views/index.php");
    }
}
