<?php
//Database connection by using PHP PDO
include "inc/init.php"; // Create Object of PDO class by connecting to Mysql database

if(isset($_POST["action"])) //Check value of $_POST["action"] variable value is set to not
{
 //For Load All Data
 if($_POST["action"] == "Load") 
 {
 $result = $crud->selectAll();
  $output = '';
  $output .= '
   <table class="table table-bordered">
    <tr>
     <th width="40%">First Name</th>
     <th width="40%">Last Name</th>
     <th width="10%">Update</th>
     <th width="10%">Delete</th>
    </tr>
  ';
  if($crud->checkRowCount($result))
  {
   foreach($result as $row)
   {
    $output .= '
    <tr>
     <td>'.$row["first_name"].'</td>
     <td>'.$row["last_name"].'</td>
     <td><button type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button></td>
     <td><button type="button" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button></td>
    </tr>
    ';
   }
  } 
  else
  {
   $output .= '
    <tr>
     <td align="center">Data not Found</td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }


//  This code for Create new Records
 if($_POST["action"] == "Create")
 {
    $result = $crud->createData($_POST['firstName'],$_POST['lastName']);
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }

//This Code is for fetch single customer data for display on Modal
 if($_POST["action"] == "Select")
 {
  $output = array();
  $result = $crud->selectUserById($_POST['id']);
  
  foreach($result as $row)
  {
   $output["first_name"] = $row["first_name"];
   $output["last_name"] = $row["last_name"];
  }
  echo json_encode($output);
 }


  
 if($_POST["action"] == "Update")
 {
  $result = $crud->updateData($_POST['firstName'],$_POST['lastName'],$_POST['id']);
  if(!empty($result))
  {
   echo 'Data Updated';
  }
 }

 if($_POST["action"] == "Delete")
 {
  $result = $crud->deleteData($_POST['id']);
  if(!empty($result))
  {
   echo 'Data Deleted';
  }
 }

}

?>