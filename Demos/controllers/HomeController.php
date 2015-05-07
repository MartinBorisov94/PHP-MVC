<?php

class HomeController extends BaseController {
    private $homeModel;

    protected function onInit() {
        $this->title = 'Welcome';
        $this->homeModel = new HomeModel();

    }

    public function index() {
        $this->questions = $this->homeModel->getAllQuestions();
        $this->categories = $this->homeModel->getAllCategories();
        $this->renderView(__FUNCTION__);
    }

}