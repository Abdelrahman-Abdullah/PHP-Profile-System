<?php

class Profile
{
    protected Post $userObject;
    protected static $pdo;
    public static function config($pdo)
    {
        static::$pdo = $pdo;
    }

    public function getUserPosts($userObject)
    {
        $this->userObject = $userObject;
        $this->userObject->selectAllPosts(["id" => $_SESSION['id']], Profile::$pdo );
    }
    public static function  getProfileInfo($id)
    {

        $statment = static::$pdo->prepare(
            "SELECT users.username , profiles.title , profiles.description , profiles.about
                FROM users INNER JOIN profiles
                    ON users.id = :id AND users.id = profiles.user_id;
                ");

        try {
            $statment->execute($id);

            $_SESSION['userProfileData'] = $statment->fetch(PDO::FETCH_OBJ);
            return new static(); // to make a chain

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}