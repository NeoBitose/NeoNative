<?php
require_once "app/models/Model.php";
require_once "config/function.php";

class Controller{

  public function index(){
    $data = Model::read();
    loadView('example-view/index', $data);
  }

  public function formcreate(){
    loadView('example-view/create');
  }

  public function create(){
    global $url;
    $data = Model::create($_POST[]);
    if ($data) {
      header("Location:".$url."/example");
    } else {
      loadView('errors/400');
    }
  }

  public function detail($id){
    $data = Model::detail($id);
    return $data;
  }

  public function formupdate($id){
    $data = Model::detail($id);
    if ($data) {
      loadView('example-view/create', $data);
    } else {
      loadView('errors/400');
    }
  }

  public function update($id){
    global $url;
    $data = Model::update($id,$_POST[]);
    if ($data) {
      header("Location:".$url."/example");
    } else {
      loadView('errors/400');
    }
  }

  public function delete($id){
    global $url;
    $data = Model::delete($id);
    if ($data) {
      header("Location:".$url."/example");
    } else {
      loadView('errors/400');
    }
  }
}