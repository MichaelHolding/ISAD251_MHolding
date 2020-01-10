<?php
class user
{
    private $User_No;
    private $Name;
    private $Email;

    public function __construct($User_No, $Name, $Email)
    {
        $this->User_No = $User_No;
        $this->Name = $Name;
        $this->Email = $Email;
    }

    public function getUser_No()
    {
        return $this->User_No;
    }

    public function setUser_No($User_No)
    {
        $this->User_No = $UserNo;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }
}
