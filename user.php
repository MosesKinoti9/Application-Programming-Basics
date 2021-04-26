<?php

class User{
    protected $fullname;
    protected $username;
    protected $password;
    protected $confirm;
    protected $gender;
    protected $email;
    protected $country;

    function __construct($user, $pass){
        $this->username=$user;
        $this->password=$pass;
    }
    public function setConfirm($confirm){
        $this->confirm=$confirm;
    }
    public function getConfirm(){
        return $this->confirm;
    }
    public function setGender($gender){
        $this->gender=$gender;
    }
    public function getGender(){
        return $this->gender;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setFullName($fullname){
        $this->fullname=$fullname;
    }
    public function getFullName(){
        return $this->fullname;
    }
    public function setCountry($country){
        $this->country=$country;
    }
    public function getCountry(){
        return $this->country;
    }

    public function register ($pdo){
        $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
        $passHash = password_hash($this->confirm, PASSWORD_DEFAULT);

        try{
            $statement= $pdo->prepare("INSERT INTO user (fullname,username,password,confirm,gender,email,country) VALUES (?,?,?,?,?,?,?)");
            $statement->execute([$this->username,$passwordHash,$this->getConfirm(),$this->getGender(),$this->getEmail(),$this->getFullName(),$this->getCountry()]);
            echo json_encode(array("statusCode" => 200));
        }
        catch(PDOException $e){
            return $e->getMessage();
    
        }

    }
    
    public function login ($pdo)
    {
        try{
            $statement = $pdo->prepare("SELECT username, password FROM user WHERE username=? AND password=?");
            $statement->execute($this->username,$this->password);
            $row = $statement->fetch();
            $num = $statement ->rowCount();

            if($row == null){
                return "No account";
            }
            if($num == 1){
                echo json_encode(array("StatusCode" => 200));
            }else{
                echo json_encode(array("StatusCode" => 201));
            }


        }
        catch (PDOException $e){
            return $e->getMesage();
        }
    }
}

?>
