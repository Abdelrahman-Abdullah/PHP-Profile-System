<?php
session_start();
class SignIn

{
    protected $PDO;
    protected $Msg;

    public function __construct($pdo)
    {
        $this->PDO = $pdo;
    }
    public function checkUser($data)
    {

        $statment = $this->PDO->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        try {
            $statment->execute($data);
            $fetched = $statment->fetch(PDO::FETCH_OBJ);

            if (! empty($fetched)){


                $_SESSION['name'] = $fetched->username;
                $_SESSION['id']   = $fetched->id;

                header("location: ../Views/HomePage.php");

            } else {

                $_SESSION['Qmsg'] = $this->Msg = " Email Or Password Are Wrong";
                unset($_SESSION['Uerr']);
                header("location: ../Views/index.php");
            }

        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}