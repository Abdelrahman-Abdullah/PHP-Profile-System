<?php

class SignInController extends SignUpController
{
    public function __construct( $email , $password)
    {

        $this->email    = $this->checkEmail($this->validae($email));
        $this->password = $this->validae($password);
    }

}