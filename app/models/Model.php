<?php

require '../../config/database.php';

class Model{

  public static $table = '';
  public static $primary = '';
  public static $column = '';

  static function read(){
    global $conn;
    $query = "select * from ".self::$table;
    $result = mysqli_query($conn, $query);
    $data = array();
    if ($result->num_rows > 0) {
      while($a = $result->fetch_array()) {
        $data[]=$a;
      }
    }
    return $data;
  }

  static function create($param){
    global $conn;
    $query = "insert into ".self::$table." (".self::$column.") values (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }

  static function detail($id){
    global $conn;
    $query = "select * from ".self::$table." WHERE ".self::$primary."=".$id;
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
      $data = mysqli_fetch_object($result);
    }
    else { 
      $data = [];
    }
    return $data;
  }

  static function update($id, $param){
    global $conn;
    $stmt = $conn->prepare("update ".self::$table." set ".self::$column."=? WHERE ".self::$primary."=".$id);
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }

  static function delete($id){
    global $conn;
    $query = "delete from ".self::$table." where ".self::$primary."=".$id;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
  }
}