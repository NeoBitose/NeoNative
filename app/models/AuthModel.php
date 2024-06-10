<?php 

require_once 'config/database.php';

class AuthModel{

  static function getdata($username)
  {
    global $conn;
    $query = "select * from user where username='".$username."'";
    $result = mysqli_query($conn, $query);
    $data = array();
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    return $data;
  }

  static function validatedata($username, $email)
  {
    global $conn;
    $query = "select * from user where username='".$username."' or email='".$email."'";
    $result = mysqli_query($conn, $query);
    $data = array();
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    return $data;
  }

  static function register($email, $username, $password)
  {
    global $conn;
    $query = "insert into user (email, username, password) values (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", htmlspecialchars($email), htmlspecialchars($username), htmlspecialchars($password));
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
}