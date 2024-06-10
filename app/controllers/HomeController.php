<?php 
require_once "config/function.php";

class HomeController
{
  public function __construct()
  {
    global $url;
    session_start();
    if(!isset($_SESSION['is_auth']))
    {
      echo "<script>window.location.href = '".$url."/login'</script>";
      exit();
    }
  }
  public function index(){
    loadView('home');
  }
}

?>