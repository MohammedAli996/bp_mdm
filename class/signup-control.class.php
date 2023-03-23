<?php

class SignupContr extends dbh
{

    private $fname;
    private $email;
    private $mobile;
    private $password;

    public function __construct($fname, $email, $mobile, $password)
    {
        $this->$fname = $fname;
        $this->$email = $email;
        $this->$mobile = $mobile;
        $this->$password = $password;
    }

    private function emptyInput()
    {
        $result;
        if(empty($this->$fname) || empty($this->$email) || empty($this->$mobile) || empty($this->$password))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invalidEmail()
    {
        $result;
        if(!filter_var($this->$email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    private function invaliduid()
    {
        $result;
        if(!preg_math("/^[a-zA-Z0-9]*$/", $this->$fname))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}

?>