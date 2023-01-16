<?php 
session_start();
if(!isset($_SESSION["islogin"]))
{
    echo"<script>window.location='index.php';</script>";
}
?>
<?php include 'connection.php' ?>
<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobie.dexignzone.com/xhtml/table-datatable-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Dec 2020 10:51:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>View User - Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    
        <!--**********************************
            Content body start
        ***********************************-->
        			<div class="content-body">
                        <div class="card">
                        	<div class="container-fluid">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    if(isset($_POST["btndelete"]))
                                    {
                                        $result=mysqli_query($conn,"delete from tbl_userr where user_id='".$_POST["deleteid"]."'");

                                        if($result==true)
                                        {
                                            echo "Deleted";
                                        }
                                        else
                                        {
                                            echo "not";
                                        }
                                    }
                                    ?>
                                    <table id="example3" class="display table-responsive-lg">
                                        <thead>
                                            <tr>            
                                                <th>#</th>  
                                            
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile Number</th>
                                                <th>Email</th>
                                                <th>Birthdate</th>
                                                <th>AadharCard Photo</th>
                                                <th>AadharCard Number</th>
                                                <th>Password</th>
                                                <th>Gender</th>
                                                <th>AddressLine 1</th>
                                                <th>AddressLine 2</th>
                                                <th>Landmark</th>
                                                <th>Pincode</th>
                                                <th>City Id</th>
                                                <th>Lattitude</th>
                                                <th>Longtitude</th>
                                                <th>IsApprove</th>
                                                <th>OTP</th>
                                                <th>IsVerify</th>
                                                <th>Regi_datetime</th>
                                                <th>Blood Group</th>
                                                <th>Height</th>
                                                <th>Weight</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                          $count=1;
                          $result=mysqli_query($conn,"select * from tbl_userr") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>


                        <tr>
                            <td><?php echo $count; $count++; ?></td>  
                            <td><?php echo $row["fname"]; ?></td>
                            <td><?php echo $row["mname"]; ?></td>
                            <td><?php echo $row["lname"]; ?></td>
                            <td><?php echo $row["contact"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["bdate"]; ?></td>
                            <td><?php echo $row["aadharcard_photo"]; ?></td>
                            <td><?php echo $row["aadharcard_num"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
                            <td><?php echo $row["address1"]; ?></td>
                            <td><?php echo $row["address2"]; ?></td>
                            <td><?php echo $row["landmark"]; ?></td>
                            <td><?php echo $row["pincode"]; ?></td>
                            <td><?php echo $row["city_id"]; ?></td>
                            <td><?php echo $row["lattitude"]; ?></td>
                            <td><?php echo $row["longtitude"]; ?></td>
                            <td><?php echo $row["is_approve"]; ?></td>
                            <td><?php echo $row["otp"]; ?></td>
                            <td><?php echo $row["is_verify"]; ?></td>
                            <td><?php echo $row["regi_datetime"]; ?></td>
                            <td><?php echo $row["bloodgroup"]; ?></td>
                            <td><?php echo $row["height"]; ?></td>
                            <td><?php echo $row["weight"]; ?></td>
                            <td>
                                                    <div class="d-flex">
                                                        <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                        <a data-id="<?php echo $row["user_id"]; ?>" data-toggle="modal" data-target="#basicModal"  class="btn btn-danger shadow btn-xs sharp open-dialog"><i class="fa fa-trash"></i></a>
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