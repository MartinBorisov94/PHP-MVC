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

    public function categoryId($id){
        $this->questionsByCategorie = $this->questionsModel->findByCategorieId($id);
        if($this->questionsByCategorie == null){
            $this->redirect("demos");
        }
        $this->renderView(__FUNCTION__);
    }



    public function create() {
        if(!$this->isLoggedIn){
            $this->redirect("demos");
        }
        if ($this->isPost()) {
            $userId = 4;
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

}

