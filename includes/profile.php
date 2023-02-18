<?php
session_start();
if (isset($_SESSION['id'])) {
    include "../controllers/Connection.php";
    include "../classes/Profile.php";
    include "../classes/Post.php";

    $userPosts = new Post();

    // Make A Composition Relation Here Between Object
    Profile::config(Connection::Connect());
    Profile::getProfileInfo(["id" => $_SESSION['id']])->getUserPosts($userPosts);
    header("location:../Views/Profile.php ");



}
