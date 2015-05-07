<?php
class AccountController extends BaseController{
    private $db;

    public function onInit() {
        $this->db = new AccountModel();
    }

    public function register() {
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $email = $_POST['inputEmail'];

            // ADD validation
           if($username == null || strlen($username) < 3){
               $this->addErrorMessage("Username is invalid");
               $this->renderView(__FUNCTION__);

           }

            $isRegisterd = $this->db->register($username, $password, $confirmPassword, $email);

           if($isRegisterd){
               $_SESSION['username'] = $username;
               $this->redirect("demos");

           }
           else{
               var_dump("ne se regna"); // kara6 se 4e ne raboti
               $this->renderView(__FUNCTION__);
           }

        }
        $this->renderView(__FUNCTION__);
    }

    public function login(){
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);
            if($isLoggedIn){
                $_SESSION['username'] = $username; // ADD redirekct
                $this->redirect("demos");
                echo("loged true");
            }
            else{
                echo("opaaa");
                $this->renderView(__FUNCTION__);
            }
        }
        $this->renderView(__FUNCTION__);
    }

    public function logout() {
        unset($_SESSION['username']);
        $this->redirect("demos");
    }
}