<?php

class SearchController extends BaseController {
    private $searchModel;

    public function onInit(){
        $this->title = "Search";
        $this->searchModel = new SearchModel();
    }

    public function index(){
        if($this->isPost){
            $this->searchDate = $this->searchModel->search($_POST['search']);

        }
        $this->renderView(__FUNCTION__);

    }
}

