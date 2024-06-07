<?php

require_once "config/function.php";

class WelcomeController{

  static function index(){
    loadView('index');
  }
}