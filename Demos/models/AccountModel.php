<?php
class AccountModel extends BaseModel{
    public function register($username, $password, $confirmPassword, $email){
        $statement = self::$db->prepare("SELECT COUNT(Id) From Users WHERE UserName = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if($result['COUNT(Id)']){
            return false;
        }

        if($password != $confirmPassword){
            return false;
        }

        $hash_pass = password_hash($password, PASSWORD_BCRYPT);

        $registerStatemen = self::$db->prepare("INSERT INTO Users (UserName, Password, Email) VALUES (?,?,?)");
        $registerStatemen->bind_param("sss",$username, $hash_pass, $email);
        $registerStatemen->execute();
        return true;
    }

    public function login($username, $password){
        $statement = self::$db->prepare("SELECT Id, UserName, Password From Users WHERE UserName = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();

        if(password_verify($password, $result['Password'])){
            return true;

        }
        return false;
    }

}