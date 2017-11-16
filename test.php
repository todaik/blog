<?php
require_once('model/PostManager.php');

function listPosts()
{
  
  $PostManager = new PostManager();

  var_dump($PostManager);
  $post = $postmanager->getPosts(0,10);
  
  require('view/frontend/indexView.php');
}