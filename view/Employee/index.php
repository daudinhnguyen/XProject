<?php
require 'view/template/header.php'
  ?>
<h1 class="text-primary text-center">LIST OF EMPLOYEE</h1>
<div class="container">
  <div class="row">
    <div class="col-md-10 ms-auto me-auto">
      <div class="d-flex justify-content-end">
        <a class="btn btn-success" href="index.php?controller=employee&action=insert">Add New Employee</a>
      </div>
      <div style="color: green">
        <?php
        if(isset($_GET['tt'])){
          echo "<p>{$_GET['tt']}</p>";
        }
        ?>
      </div>
      <table class="table table-bordered table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Salary</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($employees as $employee){
          ?>
          <tr>
            <th scope="row"><?php echo $employee['id'] ?></th>
            <td><?php echo $employee['name'] ?></td>
            <td><?php echo $employee['address'] ?></td>
            <td><?php echo $employee['salary'] ?></td>
            <td>
              <a href="index.php?controller=employee&action=view&id=<?php echo $employee["id"] ?>" class="me-2" ><i class="fa-solid fa-eye"></i></a>
              <a href="index.php?controller=employee&action=update&id=<?php echo $employee["id"] ?>" class="me-2" ><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="index.php?controller=employee&action=delete&id=<?php echo $employee["id"] ?>" class="me-2" ><i class="fa-solid fa-trash"></i></a>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
require 'view/template/footer.php'
  ?>