<?php

use app\core\View;
use app\core\Model;
use app\core\Controller;
use app\models\PostsModel;


/**
 * 
 */
class Posts extends Controller
{

      /**
       * 
       */
      public function __construct()
      {
      }

      /**
       * 
       */
      public function index()
      {
            /**
             * Niewłaściwy, ale możliwy sposób
             */
            // $sql = "SELECT * FROM posts";
            // $posts = Model::getRows($sql);
            
            $posts = PostsModel::getAll();
            $this->before();
            View::renderView('posts/index', $posts);
            $this->after();
      }

      /**
       * 
       */
      public function before($className = __CLASS__, $params = [])
      {
            include_once '../app/models/header.php';

            parent::before($className, $header);
      }
}