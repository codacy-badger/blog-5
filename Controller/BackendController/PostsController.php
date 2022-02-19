<?php

require_once 'Controller/BaseController.php';
require_once 'model/PostManager.php';

class PostsController extends BaseController{

    public function indexpost(){

        if(isset($_SESSION['auth_role']) && $_SESSION['auth_role'] == 1) {

            $postManager = new PostManager();
            $indexposts = $postManager->indexPost1();
            
            } else {

            $postManager = new PostManager();
            $indexposts = $postManager->indexPost2();
        
            }
        
        echo $this->twig->render("backend/posts/indexpost.html.twig",[
            'activemenu' => 'postmenu',
            'indexposts' => $indexposts
        ]);
    }

    public function addpost(){
        echo $this->twig->render("backend/posts/addpost.html.twig");
    }

    public function editpost(){
        echo $this->twig->render("backend/posts/editpost.html.twig");
    }
}