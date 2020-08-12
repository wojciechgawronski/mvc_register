<?php

namespace app\models;
use app\core\Model;

/**
 * Data to Post View
 */
class PostsModel{

      public static function getAll(){
            $sql = "SELECT * FROM posts";
            $posts = Model::getRows($sql, []);
            return $posts;
      }
}