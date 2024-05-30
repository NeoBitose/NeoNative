<?php 
function loadView($viewName, $data = []) {
  extract($data);
  require_once 'views/' . $viewName . '.php';
}
?>