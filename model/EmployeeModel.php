<?php
require_once 'config/db.php';

class EmployeeModel
{
  private $id, $name, $salary;

  public function connectDb()
  {
    $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$connection) {
      die("Không thể kết nối. Lỗi: " . mysqli_connect_error());
    }
    return $connection;
  }

  public function closeDb($connection = null)
  {
    mysqli_close($connection);
  }

  public function getAllEmployees()
  {
    $conn = $this->connectDb();
    $sql = "SELECT * FROM employees";
    $result = mysqli_query($conn, $sql);
    $arr_bd = [];
    if (mysqli_num_rows($result) > 0) {
      $arr_bd = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    return $arr_bd;
  }

  public function getEmployee($id)
  {
    $conn = $this->connectDb();
    $sql = "SELECT * FROM employees where id = {$id}";
    $result = mysqli_query($conn, $sql);
    $arr_bd = [];
    if (mysqli_num_rows($result) > 0) {
      $arr_bd = mysqli_fetch_all($result, MYSQLI_ASSOC);
      $arr_bd = $arr_bd[0];
    }
    return $arr_bd;
  }

  public function insert($param = []) {
    $connection = $this->connectDb();
    $queryInsert = "INSERT INTO employees (name, address, salary)
    VALUES ('{$param['name']}', '{$param['address']}', '{$param['salary']}')";
    $isInsert = mysqli_query($connection, $queryInsert);
    $this->closeDb($connection);
    return $isInsert;
  }

  public function update($param = []) {
    $connection = $this->connectDb();
    $queryUpdate = "UPDATE employees 
    SET name = '{$param['name']}', address = '{$param['address']}', salary = '{$param['salary']}'  WHERE id = {$param['id']}";
    $isInsert = mysqli_query($connection, $queryUpdate);
    $this->closeDb($connection);
    return $isInsert;
  }

  public function delete($id) {
    $connection = $this->connectDb();
    $queryUpdate = "Delete from employees  WHERE id = {$id}";
    $isInsert = mysqli_query($connection, $queryUpdate);
    $this->closeDb($connection);
    return $isInsert;
  }

}