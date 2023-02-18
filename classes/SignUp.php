<?php
session_start();
class SignUp
{

    protected $PDO;
    protected $Msg;

    public function __construct($pdo)
    {
        $this->PDO = $pdo;
    }

    public function select($email)
    {
        $statment = $this->PDO->prepare("SELECT * FROM users WHERE email = ?");
        try {
            $statment->execute($email);
            return $fetched = $statment->fetchAll(PDO::FETCH_OBJ);

        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function insert($data)
    {

        if ( empty( $this->select([$data['email']]) ) ){

            $statment = $this->PDO->prepare("INSERT INTO users (username , email , password) VALUES (:username,:email,:password)");
            try {
                if ($statment->execute($data)):
                    $this->Msg = '<span style="color:green">New User Added Successfuly</span>';
                    $_SESSION['Qmsg'] = $this->Msg;
                    unset($_SESSION["Uerr"]);
                    header("location: ../Views/index.php");

                endif;
            }catch (PDOException $e)
            {
                echo $e->getMessage();
            }

        }else{
            $_SESSION['Qmsg'] = $this->Msg = "This Email Is Already Exist";
            unset($_SESSION["Uerr"]);
            header("location: ../Views/index.php");


        }

    }



}

