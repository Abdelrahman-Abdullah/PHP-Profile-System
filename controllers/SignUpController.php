<?php
session_start();
class SignUpController
{
    protected $username;
    protected $email;
    protected $password;
    protected $errMsg;

    public function __construct($username , $email , $password)
    {

        $this->username = $this->validae($username);
        $this->password = $this->validae($password);
        $this->email    = $this->checkEmail($this->validae($email));
    }

    protected function validae($date)
    {

        if (empty($date)):
            $_SESSION['Uerr']= $this->errMsg = 'All Fields Are Required';
            unset($_SESSION["Qmsg"]);

        else:
            $newData = trim($date);
            $newData = htmlspecialchars($newData);
            return $newData;
        endif;
    }

    protected function checkEmail($email)
    {
        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)):
                $_SESSION['Uerr'] = $this->errMsg = 'Field Must Be An Email';
                unset($_SESSION["Qmsg"]);

            else:
                $newData = filter_var($email, FILTER_SANITIZE_EMAIL);
                return $newData;
            endif;
        }

    }


    public function getErrMsg()
    {
        return $this->errMsg;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getPassword()
    {
        return $this->password;
    }


}