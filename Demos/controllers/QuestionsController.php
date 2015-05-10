<?php

class QuestionsController extends BaseController {
    private $questionsModel;
    private $homeModel;

    public function onInit(){
        $this->title = "Questions";
        $this->questionsModel = new QuestionsModel();
        $this->homeModel = new HomeModel();
    }

    public function index(){
        $this->questions = $this->questionsModel->getAll();
        $this->renderView(__FUNCTION__);
    }

    public function question($id){
        $this->question = $this->questionsModel->find($id);
        if($this->question == null){
            $this->redirect("demos");
        }
        $this->answers = $this->questionsModel->findAnswers($id);
        $this->renderView(__FUNCTION__);
    }

    public function byCategoryId($id){
        $this->questionsByCategorie = $this->questionsModel->findByCategorieId($id);
        if($this->questionsByCategorie == null){
            $this->redirect("demos");
        }
        $this->categories = $this->homeModel->getAllCategories();

        $this->renderView(__FUNCTION__);
    }

    public function create() {
        if(!$this->isLoggedIn){
            $this->redirect("demos");
        }
        if ($this->isPost()) {
            $userId = $_SESSION['username'];
            $question = $_POST['question'];
            $title = $_POST['title'];
            $dateTime = (new DateTime())->format('Y-m-d H:i:s');

            $category = $_POST['category'];

            if ($this->questionsModel->create($userId, $question, $title, $dateTime, $category)) {
                $this->addInfoMessage("Question created.");
                $this->redirect("demos");
            } else {
                $this->addErrorMessage("Cannot create question.");
            }
        }
        $this->categories = $this->homeModel->getAllCategories();
        $this->renderView(__FUNCTION__);
    }

    public function addAnswer($id) {
        if($this->isPost()){
            $answer = $_POST['inputAnswer'];
            $dateTime = (new DateTime())->format('Y-m-d H:i:s');

            if($this->isLoggedIn){
                $username = $_SESSION['username'];
            }
            else{
                $username = $_POST['inputUserName'];
                $email = $_POST['inputEmail'];
            }


            if($answer == null || strlen($answer) < 10){
                $this->addErrorMessage("Answer must be at least 10 characters long");
                $this->redirect('demos/questions/question/'. $id);
            }

            if($username == null || strlen($username) < 5){
                $this->addErrorMessage("Username must be at least 5 characters long");
                $this->redirect('demos/questions/question/'. $id);
            }

            if($email != null){
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $this->addErrorMessage("This ($email) email address is considered valid.");
                }
            }

            if($this->questionsModel->addAnswer($answer, $id,$dateTime , $username, $email)){
                $this->addInfoMessage("Answer added");
                $this->redirect("demos/questions/question/" . $id );
            }
            else{
                $this->addErrorMessage("The answer is not added");
                $this->redirect("demos/questions/question/" . $id );
            }
        }
    }

}

