<?php

if (isset($_POST['submit'])){
    require "../controllers/SignUpController.php";

    // Declare The Values
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $newUser = new SignUpController($username , $email , $password);
    if ( empty($newUser->getErrMsg()) )
    {

        require "../controllers/Connection.php";

        require "../classes/SignUp.php";

        $qurey = new SignUp(Connection::Connect());
        $qurey->insert(
            [   "username" =>   $newUser->getUsername() ,
                "email"    =>   $newUser->getEmail() ,
                "password" =>   md5($newUser->getPassword())
            ]
        );

    } else{
        header("location:  ../Views/index.php");
    }
}
