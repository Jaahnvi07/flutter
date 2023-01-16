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
    <?php include 'header.php'; ?>
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
                                        $result=mysqli_query($conn,"delete from tbl_user_case where user_id='".$_POST["deleteid"]."'");

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
                                            
                                                <th>User Id</th>
                                                <th>Doctor Id</th>
                                                <th>Hospital Id</th>
                                                <th>Create Case Date</th>
                                                <th>Create Case Time</th>
                                                <th>Problem</th>
                                                <th>Analysis</th>
                                                <th>Total Bill</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                          $count=1;
                          $result=mysqli_query($conn,"select * from tbl_user_case") or die(mysqli_error($conn));
                          while($row=mysqli_fetch_assoc($result))
                          {
                        ?>


                        <tr>
                            <td><?php echo $count; $count++; ?></td>  
                            <td><?php echo $row["user_id"]; ?></td>
                            <td><?php echo $row["doc_id"]; ?></td>
                            <td><?php echo $row["hospital_id"]; ?></td>
                            <td><?php echo $row["crecasedate"]; ?></td>
                            <td><?php echo $row["crecasetime"]; ?></td>
                            <td><?php echo $row["problem"]; ?></td>
                            <td><?php echo $row["analysis"]; ?></td>
                            <td><?php echo $row["total_bill"]; ?></td>
                            <td><?php echo $row["status"]; ?></td>
                             
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