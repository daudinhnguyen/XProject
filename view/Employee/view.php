<?php
require 'view/template/header.php'
  ?>
<h1 class="text-primary text-center">INFORMATION OF EMPLOYEE</h1>
<div class="container">
  <div class="row">
    <div class="col-md-10 ms-auto me-auto">
      <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-6">
          <label for="validationCustom01" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name'] ?>" readonly>
          <div class="invalid-feedback">
            Please enter your name.
          </div>
        </div>
        <div class="col-md-6">
          <label for="salary" class="form-label">Salary</label>
          <input type="text" class="form-control" name="salary" id="salary" value="<?php echo $employee['salary'] ?>" readonly>
          <div class="invalid-feedback">
            Please enter your salary.
          </div>
        </div>
        <div class="col-md-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" name="address" id="address" value="<?php echo $employee['address'] ?>" readonly>
          <div class="invalid-feedback">
            Please enter your address.
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
require 'view/template/footer.php'
  ?>