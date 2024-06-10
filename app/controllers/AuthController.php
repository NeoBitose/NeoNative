<?php

require_once "app/models/AuthModel.php";
require_once "config/function.php";

class AuthController{
  
  public function __construct()
  {
    global $url;
    session_start();
    if(isset($_SESSION['is_auth']) and $_SESSION['is_auth'] == true)
    {
      echo "<script>window.location.href = '".$url."/home'</script>";
    }
  }

  static function viewlogin(){
    loadView('auth/login');
  }

  static function viewregister(){
    loadView('auth/register');
  }

  static function login(){
    global $url;
    if (empty($_POST["username"])) {
      echo "<script>alert('Username tidak boleh kosong');window.location.href = '".$url."/login'</script>";
      exit(); 
    } 
    else if (empty($_POST["password"])) {
      echo "<script>alert('Password tidak boleh kosong');window.location.href = '".$url."/login'</script>";
      exit();
    }
    if (strlen($_POST["password"]) < 8) {
      echo("<script>alert('Judul minimal input 8 karakter');window.location.href = '".$url."/login'</script>");
      exit();
    }
    $data = AuthModel::getdata($_POST["username"]);
    if ($data == null) {
      echo("<script>alert('User tidak ditemukan');window.location.href = '".$url."/login'</script>");
      exit();
    }
    if ($_POST["username"] != $data[0]['username']) {
      echo("<script>alert('Username salah');window.location.href = '".$url."/login'</script>");
      exit();
    }
    if (md5($_POST["password"]) != $data[0]['password']) {
      echo("<script>alert('Password salah');window.location.href = '".$url."/login'</script>");
      exit();
    }
    session_start();
    $_SESSION["nama_pengguna"] = $data[0]['username'];
    $_SESSION["email"] = $data[0]['email'];
    $_SESSION["id_user"] = $data[0]['id_user'];
    $_SESSION["is_auth"] = true;
    header('Location: '.$url.'/home');
    exit();
  }

  static function register(){
    global $url;
    if (empty($_POST["username"])) {
      echo "<script>alert('Username tidak boleh kosong');window.location.href = '".$url."/register'</script>";
      exit(); 
    } 
    else if (empty($_POST["password"])) {
      echo "<script>alert('Password tidak boleh kosong');window.location.href = '".$url."/register'</script>";
      exit();
    }
    else if (empty($_POST["email"])) {
      echo "<script>alert('Email tidak boleh kosong');window.location.href = '".$url."/register'</script>";
      exit();
    }
    if (strlen($_POST["password"]) < 8) {
      echo("<script>alert('Password minimal input 8 karakter');window.location.href = '".$url."/register'</script>");
      exit();
    }
    $data = AuthModel::validatedata($_POST["username"], $_POST["email"]);
    if ($data[0]['username'] == $_POST['username']) {
      echo("<script>alert('Username sudah dipakai!');window.location.href = '".$url."/register'</script>");
      exit();
    }
    if ($data[0]['email'] == $_POST['email']) {
      echo("<script>alert('Email sudah dipakai!');window.location.href = '".$url."/register'</script>");
      exit();
    }
    $result = AuthModel::register($_POST['email'], $_POST['username'], md5($_POST['password']));
    if($result){
      $data = AuthModel::getdata($_POST["username"]);
      session_start();
      $_SESSION["nama_pengguna"] = $data[0]['username'];
      $_SESSION["email"] = $data[0]['email'];
      $_SESSION["id_user"] = $data[0]['id_user'];
      $_SESSION["is_auth"] = true;
      header('Location: '.$url.'/home');
      exit();
    }
    else {
      echo("<script>alert('gagal register, ulangi kembali');window.location.href = '".$url."/register'</script>");
      exit();
    }
  }

  static function logout(){
    global $url;
    session_start();
    if(!isset($_SESSION['is_auth']))
    {
      echo "<script>window.location.href = '".$url."/login'</script>";
      exit();
    }
    session_unset();
    session_destroy();
    header('Location: '.$url.'/');
  }
}