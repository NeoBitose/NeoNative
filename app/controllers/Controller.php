<?php
require "../../app/models/Model.php";

if(isset($_GET['action']) and $_GET['action'] == 'create') {
  Controller::create();
}
else if(isset($_GET['action']) and $_GET['action'] == 'update') {
  Controller::update();
}
else if(isset($_GET['action']) and $_GET['action'] == 'delete') {
  Controller::delete();
} 

class Controller{

  static function index(){
    $data = Model::read();
    return $data;
  }

  static function create(){
    global $url;
    $data = Model::create($_POST[]);
    if ($data) {
      header("Location:".$url."/views");
    } else {
      header('Location: '.$url.'/views/errors/400.php');
    }
  }

  static function detail(){
    $data = Model::detail($_GET["id"]);
    return $data;
  }

  static function update(){
    global $url;
    $data = Model::update($_GET["id"],$_POST[]);
    if ($data) {
      header("Location:".$url."/views");
    } else {
      header('Location: '.$url.'/views/errors/400.php');
    }
  }

  static function delete(){
    global $url;
    $data = Model::delete($_GET["id"]);
    if ($data) {
      header("Location:".$url."/views");
    } else {
      header('Location: '.$url.'/views/errors/400.php');
    }
  }
}