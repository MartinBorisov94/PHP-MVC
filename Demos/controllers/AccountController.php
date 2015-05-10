<?php
class AccountController extends BaseController{
    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {
        if($this->isLoggedIn){
            $this->redirect(demos);
        }
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $email = $_POST['inputEmail'];

           if($username == null || strlen($username) < 5){
               $this->addErrorMessage("Username must be at least 5 characters long");
               $this->redirect('demos/account/register');
               $this->renderView(__FUNCTION__);
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $this->addErrorMessage("This ($email) email address is considered valid.");
               $this->redirect('demos/account/register');
               $this->renderView(__FUNCTION__);
           }

           if(strlen($password) < 6){
               $this->addErrorMessage("The password must be at least 6 characters long");
               $this->redirect('demos/account/register');
               $this->renderView(__FUNCTION__);
           }

           if($password != $confirmPassword){
               $this->addErrorMessage("The passwords don't match");
               $this->redirect('demos/account/register');
               $this->renderView(__FUNCTION__);
           }


            $isRegisterd = $this->db->register($username, $password, $email);

           if($isRegisterd){
               $_SESSION['username'] = $username;
               $this->redirect("demos");
           }
           else{
               $this->addErrorMessage("Username is already taken");
               $this->renderView(__FUNCTION__);
           }

        }
        $this->renderView(__FUNCTION__);
    }

    public function login(){
        if($this->isLoggedIn){
            $this->redirect('demos');
        }
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);
            if($isLoggedIn){
                $_SESSION['username'] = $username;
                $this->addInfoMessage("Login success");
                $this->redirect("demos");

            }
            else{
                $this->addInfoMessage("Login failed. Username or password are invalid");
                $this->renderView(__FUNCTION__);
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout() {
        unset($_SESSION['username']);
        $this->redirect("demos");
    }

    public function user(){
        if(!$this->isLoggedIn){
            $this->redirect('demos');
        }
        $username = $_SESSION['username'];
        if($this->isPost()){
            $oldPassword = $_POST['oldPassword'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            if(strlen($newPassword) < 6){
                $this->addErrorMessage("The password must be at least 6 characters long");
                $this->redirect('demos/account/user');
                $this->renderView(__FUNCTION__);
            }

            if($newPassword != $confirmPassword){
                $this->addErrorMessage("The passwords don't match");
                $this->redirect('demos/account/user');
                $this->renderView(__FUNCTION__);
            }

            if($this->db->changePassword($username,$oldPassword, $newPassword)){
                $this->addInfoMessage("Password changed");
                $this->redirect('demos/account/user');
            }
            else{
                $this->addErrorMessage("Password does not changed");
            }
        }

        $this->renderView(__FUNCTION__);
    }
}