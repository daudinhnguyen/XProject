<?php
require_once 'model/EmployeeModel.php';

class EmployeeController
{
  function index()
  {
    $employeeModal = new EmployeeModel();
    $employees = $employeeModal->getAllEmployees();
    require_once 'view/Employee/index.php';
  }

  function insert()
  {
    $error = '';
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $address = $_POST['address'];
      $salary = $_POST['salary'];
      if (empty($name) || empty($address) || empty($salary)) {
        $error = 'Thông tin chưa đầy đủ!';
      } else {
        $employeeModal = new EmployeeModel();
        $emArr = [
          'name' => $name,
          'address' => $address,
          'salary' => $salary,
        ];
        $isAdd = $employeeModal->insert($emArr);
        if ($isAdd) {
          $message = "Thêm mới thành công";
        } else {
          $message = "Thêm mới thất bại";
        }
        header("Location: index.php?controller=employee&action=index&tt=$message");
        exit();
      }
    }
    require_once 'view/Employee/insert.php';
  }

  function view() {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $employeeModal = new EmployeeModel();
      $employee = $employeeModal->getEmployee($id);
      require_once 'view/Employee/view.php';
    }else{
      header("Location: index.php");
    }
  }

  function update()
  {
    $error = '';
    if (isset($_POST['submit']) && isset($_GET['id'])) {
      $id = $_GET['id'];
      $name = $_POST['name'];
      $address = $_POST['address'];
      $salary = $_POST['salary'];
      if (empty($name) || empty($address) || empty($salary)) {
        $error = 'Thông tin chưa đầy đủ!';
      } else {
        $employeeModal = new EmployeeModel();
        $emArr = [
          'id' => $id,
          'name' => $name,
          'address' => $address,
          'salary' => $salary,
        ];
        $isUpdate = $employeeModal->update($emArr);
        if ($isUpdate) {
          $message = "Cập nhật thành công";
        } else {
          $message = "Cập nhật thất bại";
        }
        header("Location: index.php?controller=employee&action=index&tt=$message");
        exit();
      }
    }
    if (isset($_GET['id']) && !isset($_POST['submit'])) {
      $id = $_GET['id'];
      $employeeModal = new EmployeeModel();
      $employee = $employeeModal->getEmployee($id);
    }
    require_once 'view/Employee/update.php';
  }

  function delete()
  {
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $employeeModal = new EmployeeModel();
      $employee = $employeeModal->getEmployee($id);
      if(count($employee) > 0){
        $isDelete = $employeeModal->delete($id);
        if ($isDelete) {
          $message = "Cập nhật thành công";
        } else {
          $message = "Cập nhật thất bại";
        }
        header("Location: index.php?controller=employee&action=index&tt=$message");
      }
    }
  }
}