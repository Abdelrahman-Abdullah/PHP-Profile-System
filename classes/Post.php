<?php

class Post
{
    public function selectAllPosts($id , $pdo)
    {
        $statment = $pdo->prepare("SELECT * FROM posts WHERE user_id = :id ");
        try {
            $statment->execute($id);
            $_SESSION['userProfilePosts'] = $statment->fetchAll(PDO::FETCH_OBJ);

        }catch (PDOException $e)
        {
            echo "dasdas";
        }
    }
}