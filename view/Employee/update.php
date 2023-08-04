<?php
require 'view/template/header.php'
  ?>
<h1 class="text-primary text-center">UPDATE EMPLOYEE</h1>
<div class="container">
  <div class="row">
    <div class="col-md-10 ms-auto me-auto">
      <div style="color: red">
        <?php echo $error; ?>
      </div>
      <form class="row g-3 needs-validation" action="" method="POST" novalidate>
        <div class="col-md-6">
          <label for="validationCustom01" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $employee['name'] ?>" required>
          <div class="invalid-feedback">
            Please enter your name.
          </div>
        </div>
        <div class="col-md-6">
          <label for="salary" class="form-label">Salary</label>
          <input type="text" class="form-control" name="salary" id="salary" value="<?php echo isset($_POST['salary']) ? $_POST['salary'] : $employee['salary'] ?>" required>
          <div class="invalid-feedback">
            Please enter your salary.
          </div>
        </div>
        <div class="col-md-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : $employee['address'] ?>" required>
          <div class="invalid-feedback">
            Please enter your address.
          </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
          <button class="btn btn-primary" name="submit" type="submit">Update Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
require 'view/template/footer.php'
  ?>