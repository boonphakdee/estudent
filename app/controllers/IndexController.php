<?php

class IndexController extends \Phalcon\Mvc\Controller
{

    public function indexAction() {
    	$user = new Users();
    	$this->view->name = "pongsak";
        $this->view->items = users::find();
        		
  }

}