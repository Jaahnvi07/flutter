<?php 
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo"<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobie.dexignzone.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>View Hospital - Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php 
include 'header.php';
?>
        <!--**********************************
            Content body start
        ***********************************-->
        			<div class="content-body">
                        <div class="card">
                        	<div class="container-fluid">
                            <div class="card-header">
                                <h4 class="card-title">Hospital Detail</h4>
                                <button name="btnadd" type="button" onclick="window.location='addhospital.php';" class="btn btn-rounded btn-primary"><span
                                        class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i></span>Add
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    if(isset($_POST["btndelete"]))
                                    {
                                        $result=mysqli_query($conn,"delete from tbl_hospital where hospital_id='".$_POST["deleteid"]."'");

                                        if($result==true)
                                        {
                                            echo "Deleted";
                                        }
                                        else
                                        {
                                            echo "not";
                                        }
                                    }
                                
                                    if(isset($_GET["id"]))
                                    {
                                        $res=mysqli_query($conn,"update tbl_hospital set is_active='".$_GET["status"]."' where hospital_id='".$_GET["id"]."'");
                                        if($res)
                                            echo "<script>window.location='viewhospital.php';</script>";
                                    }
                                    ?>
                                    <table id="example3" class="display table-responsive-lg">
                                        <thead>
                                            <tr>            
                                                <th>#</th>  
                                                
                                                <th>Cateory Name</th>
                                                <th>Hospital Name</th>
                                               
                                                <th>Address Line 1</th>
                                                
                                                <th>Pincode</th>
                                                
                                                <th>Contact No 1</th>
                                                
                                                <th>IsActive</th>
                                                
                                               
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                          $count=1;
                         // $result=mysqli_query($conn,"select h.*,c.category_name,ct.city_name from tbl_hospital as h left join tbl_category as c on c.category_id=h.category_id left join tbl_city as ct on ct.city_id=h.city_id") or die(mysqli_error($conn));
                         if(isset($_GET["id"]))
                          {
                            $result=mysqli_query($conn,"select h.*,ct.city_name from tbl_hospital as h left join tbl_city as ct on ct.city_id=h.city_id where h.hospital_id='".my_simple_crypt($_GET["id"],"d")."'") or die(mysqli_error($conn));
                          }else{
                          $result=mysqli_query($conn,"select h.*,ct.city_name from tbl_hospital as h left join tbl_city as ct on ct.city_id=h.city_id") or die(mysqli_error($conn));
                         }
                          
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>


                        <tr>
                            <td><?php echo $count; $count++; ?></td>
                            <td><?php  
                                $cat="";
                            $s=mysqli_query($conn,"SELECT category_name FROM tbl_category where category_id IN (".$row["category_id"].")");
                             while($r=mysqli_fetch_assoc($s))
                             {
                                 $cat .=$r["category_name"].",";
                             } 
                             echo rtrim($cat,',');
?>

 </td>
                            <td><?php echo $row["hospital_name"]; ?></td>
                            
                            <td><?php echo $row["address1"]; ?></td>
                            
                            <td><?php echo $row["pincode"]; ?></td>
                            
                            <td><?php echo $row["contact_no1"]; ?></td>
                           
                            <td> <?php if($row["is_active"]=="Yes") {?>
                                       <a href="viewhospital.php?id=<?php echo $row["hospital_id"]; ?>&status=No"><span class="badge badge-success">Yes</span></a>
                                <?php } else { ?>
                                          <a href="viewhospital.php?id=<?php echo $row["hospital_id"]; ?>&status=Yes"> <span class="badge badge-danger">No</span></a>
                                
                                <?php } ?></td>
                            
                            
                            
                                <td>
                                                    <div class="dropdown ml-auto">
                                                        <div class="btn-link" data-toggle="dropdown">
                                                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="updatehospital.php?updateid=<?php echo my_simple_crypt($row["hospital_id"],'e'); ?>">Edit</a>
                                                            <a data-id="<?php echo $row["hospital_id"]; ?>" data-toggle="modal" data-target="#basicModal" class="btn  open-dialog">    Delete</a>
                                                            <a class="dropdown-item" href="viewhospialdetail.php?updateid=<?php echo my_simple_crypt($row["hospital_id"],'e'); ?>">View Details</a>
                                                            <a class="dropdown-item" href="viewdochosp.php?id=<?php echo my_simple_crypt($row["hospital_id"],'e'); ?>">View Doctor</a>
                                                        </div>
                                                    </div>                                              
                                                </td>
                        </tr>

                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                     </div>
                 </div>
                    </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning!</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure ?</div>
                <div class="modal-footer">
                    <form method="post">
                    <input type="hidden" id="deleteid" name="deleteid"/>
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">No</button>
                    <button type="submit" name="btndelete" class="btn btn-primary">Yes</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <script>
        $(document).ready(function(){
            $('.open-dialog').click(function(){
                var id = $(this).attr("data-id");
                $('#deleteid').val(id);
            });
        });

    </script>

</body>

<!-- Mirrored from jobie.dexignzone.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:10 GMT -->
</html>