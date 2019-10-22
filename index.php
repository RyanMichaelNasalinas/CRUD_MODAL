<?php 
    include "inc/header.php";
?>


  <div class="container box">
   <h1 align="center">PHP PDO CRUD with Ajax Jquery and Bootstrap</h1>
   <br />
   <div align="right">
    <button type="button" id="modal_button" class="btn btn-info">Create Records</button>
    <!-- It will show Modal for Create new Records !-->
   </div>
   <br />
   <div id="result" class="table-responsive"> <!-- Data will load under this tag!-->

   </div>
 

<!-- This is Customer Modal. It will be use for Create new Records and Update Existing Records!-->
<div id="customerModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Create New Records</h4>
   </div>
   <div class="modal-body">1
    <label>Enter First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" />
    <br />
    <label>Enter Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" />
    <br />
   </div>
   <div class="modal-footer">
    <input type="hidden" name="customer_id" id="customer_id" />
    <input type="submit" name="action" id="action" class="btn btn-success" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<?php 
  include "inc/footer.php";
?>

   